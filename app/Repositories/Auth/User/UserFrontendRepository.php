<?php

namespace App\Repositories\Auth\User;

use App\Events\Frontend\Auth\UserConfirmed;
use App\Events\Frontend\Auth\UserProviderRegistered;
use App\Exceptions\GeneralException;
use App\Models\Auth\SocialAccount;
use App\Notifications\Frontend\Auth\UserNeedsConfirmation;
use Carbon\Carbon;
use DB;
use HalcyonLaravel\Base\Repository\BaseRepository;
use Hash;
use Storage;

/**
 * Class UserFrontendRepository
 *
 * @package App\Repositories\Auth\User
 */
class UserFrontendRepository extends UserRepositoryEloquent
{

    /**
     * @param $token
     *
     * @return bool
     */
    public function findByPasswordResetToken($token)
    {
        foreach (DB::table(config('auth.passwords.users.table'))->get() as $row) {
            if (password_verify($token, $row->token)) {
                return $this->findWhere(['email' => $row->email,])->first();
            }
        }

        return false;
    }

    /**
     * @param $uuid
     *
     * @return mixed
     * @throws GeneralException
     */
    public function findByUuid($uuid)
    {
        $user = $this->model
            ->uuid($uuid)
            ->first();

        if ($user instanceof $this->model) {
            return $user;
        }

        throw new GeneralException(__('exceptions.backend.access.users.not_found'));
    }

    /**
     * @param array $data
     *
     * @return \Illuminate\Database\Eloquent\Model|mixed
     * @throws \Exception
     * @throws \Throwable
     */
    public function create(array $data)
    {
        return DB::transaction(function () use ($data) {
            $user = BaseRepository::create([
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'email' => $data['email'],
                'confirmation_code' => md5(uniqid(mt_rand(), true)),
                'active' => 1,
                'password' => Hash::make($data['password']),
                // If users require approval or needs to confirm email
                'confirmed' => config('access.users.requires_approval') || config('access.users.confirm_email') ? 0 : 1,
            ]);

            if ($user) {
                /*
                 * Add the default site role to the new user
                 */
                $user->assignRole(config('access.users.default_role'));
            }

            /*
             * If users have to confirm their email and this is not a social account,
             * and the account does not require admin approval
             * send the confirmation email
             *
             * If this is a social account they are confirmed through the social provider by default
             */
            if (config('access.users.confirm_email')) {
                // Pretty much only if account approval is off, confirm email is on, and this isn't a social account.
                $user->notify(new UserNeedsConfirmation($user->confirmation_code));
            }

            /*
             * Return the user object
             */
            return $user;
        });
    }

    /**
     * @param       $id
     * @param array $input
     * @param bool  $image
     *
     * @return array|mixed
     * @throws \App\Exceptions\GeneralException
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     * @throws \Throwable
     */
    public function updateFront($id, array $input, $image = false)
    {
        $user = $this->find($id);
        $attributes = [
            'first_name' => $input['first_name'],
            'last_name' => $input['last_name'],
            'timezone' => $input['timezone'],
            'avatar_type' => $input['avatar_type'],
        ];

        // Upload profile image if necessary
        if ($image) {
            // $user->avatar_location = $image->store('/avatars', 'public');
            $user->addMedia($image)->toMediaCollection('images');
        } else {
            // No image being passed
            if ($input['avatar_type'] == 'storage') {
                // If there is no existing image
                if (!strlen(auth()->user()->avatar_location)) {
                    throw new GeneralException('You must supply a profile image.');
                }
            } else {
                // If there is a current image, and they are not using it anymore, get rid of it
                if (strlen(auth()->user()->avatar_location)) {
                    Storage::disk('public')->delete(auth()->user()->avatar_location);
                }

                $attributes['avatar_location'] = null;
            }
        }

        if ($user->canChangeEmail()) {
            //Address is not current address so they need to reconfirm
            if ($user->email != $input['email']) {
                //Emails have to be unique
                if (count($this->findWhere(['email' => $input['email']])->all()) > 0) {
                    throw new GeneralException(__('exceptions.frontend.auth.email_taken'));
                }

                // Force the user to re-verify his email address if config is set
                if (config('access.users.confirm_email')) {
                    $attributes['confirmation_code'] = md5(uniqid(mt_rand(), true));
                    $attributes['confirmed'] = 0;
                    $user->notify(new UserNeedsConfirmation($user->confirmation_code));
                }
                $attributes['email'] = $input['email'];

                // Send the new confirmation e-mail
                return [
                    'success' => BaseRepository::update($attributes, $id),
                    'email_changed' => true,
                ];
            }
        }

        return BaseRepository::update($attributes, $id);
    }

    /**
     * @param array $input
     * @param bool  $expired
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     * @throws \Throwable
     */
    public function updatePasswordFront(array $input, $expired = false)
    {
        $user = $this->find(auth()->id());

        if (Hash::check($input['old_password'], $user->password)) {
            $attributes = [
                'password' => Hash::make($input['password']),
            ];

            if ($expired) {
                $attributes['password_changed_at'] = Carbon::now()->toDateTimeString();
            }

            return BaseRepository::update($attributes, $user->id);
        }

        throw new GeneralException(__('exceptions.frontend.auth.password.change_mismatch'));
    }

    /**
     * @param $code
     *
     * @return bool
     * @throws GeneralException
     */
    public function confirmFront($code)
    {
        $user = $this->findByConfirmationCode($code);

        if ($user->confirmed == 1) {
            throw new GeneralException(__('exceptions.frontend.auth.confirmation.already_confirmed'));
        }

        if ($user->confirmation_code == $code) {
            $user->confirmed = 1;

            event(new UserConfirmed($user));

            return $user->save();
        }

        throw new GeneralException(__('exceptions.frontend.auth.confirmation.mismatch'));
    }

    /**
     * @param $code
     *
     * @return mixed
     * @throws GeneralException
     */
    public function findByConfirmationCode($code)
    {
        $user = $this->model
            ->where('confirmation_code', $code)
            ->first();

        if ($user instanceof $this->model) {
            return $user;
        }

        throw new GeneralException(__('exceptions.backend.access.users.not_found'));
    }

    /**
     * @param $data
     * @param $provider
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function findOrCreateProvider($data, $provider)
    {
        // User email may not provided.
        $user_email = $data->email ?: "{$data->id}@{$provider}.com";

        // Check to see if there is a user with this email first.
        $user = $this->findWhere(['email' => $user_email])->first();

        /*
         * If the user does not exist create them
         * The true flag indicate that it is a social account
         * Which triggers the script to use some default values in the create method
         */
        if (!$user) {
            // Registration is not enabled
            if (!config('access.registration')) {
                throw new GeneralException(__('exceptions.frontend.auth.registration_disabled'));
            }

            // Get users first name and last name from their full name
            $nameParts = $this->getNameParts($data->getName());

            $user = BaseRepository::create([
                'first_name' => $nameParts['first_name'],
                'last_name' => $nameParts['last_name'],
                'email' => $user_email,
                'active' => 1,
                'confirmed' => 1,
                'password' => null,
                'avatar_type' => $provider,
            ]);

            event(new UserProviderRegistered($user));
        }

        // See if the user has logged in with this social account before
        if (!$user->hasProvider($provider)) {
            // Gather the provider data for saving and associate it with the user
            $user->providers()->save(new SocialAccount([
                'provider' => $provider,
                'provider_id' => $data->id,
                'token' => $data->token,
                'avatar' => $data->avatar,
            ]));
        } else {
            // Update the users information, token and avatar can be updated.
            $user->providers()->update([
                'token' => $data->token,
                'avatar' => $data->avatar,
            ]);


            BaseRepository::update([
                'avatar_type' => $provider
            ], $user->id);
        }

        // Return the user object
        return $user;
    }

    /**
     * @param $fullName
     *
     * @return array
     */
    protected function getNameParts($fullName)
    {
        $parts = array_values(array_filter(explode(' ', $fullName)));
        $size = count($parts);
        $result = [];

        if (empty($parts)) {
            $result['first_name'] = null;
            $result['last_name'] = null;
        }

        if (!empty($parts) && $size == 1) {
            $result['first_name'] = $parts[0];
            $result['last_name'] = null;
        }

        if (!empty($parts) && $size >= 2) {
            $result['first_name'] = $parts[0];
            $result['last_name'] = $parts[1];
        }

        return $result;
    }
}
