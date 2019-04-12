<?php

namespace App\Repositories\Auth\User;

use App\Criterion\Eloquent\WithTrashCriteria;
use App\Events\Backend\Auth\User\UserCreated;
use App\Events\Backend\Auth\User\UserDeactivated;
use App\Events\Backend\Auth\User\UserPasswordChanged;
use App\Events\Backend\Auth\User\UserPermanentlyDeleted;
use App\Events\Backend\Auth\User\UserReactivated;
use App\Events\Backend\Auth\User\UserRestored;
use App\Events\Backend\Auth\User\UserUnconfirmed;
use App\Events\Backend\Auth\User\UserUpdated;
use App\Events\Frontend\Auth\UserConfirmed;
use App\Exceptions\GeneralException;
use App\Models\Auth\User;
use App\Notifications\Backend\Auth\UserAccountActive;
use App\Notifications\Frontend\Auth\UserNeedsConfirmation;
use DB;
use HalcyonLaravel\Base\Repository\BaseRepository;
use Hash;
use Prettus\Repository\Events\RepositoryEntityCreated;
use Prettus\Repository\Events\RepositoryEntityUpdated;

/**
 * Class UserRepositoryEloquent
 *
 * @package App\Repositories\Auth\User
 */
class UserRepositoryEloquent extends BaseRepository implements UserRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return User::class;
    }

    /**
     * @return mixed
     */
    public function getUnconfirmedCount(): int
    {
        return count($this->findWhere([
            'confirmed' => false,
        ])->all());
    }

    /**
     * @param array $data
     *
     * @return mixed
     * @throws \Throwable
     */
    public function create(array $data)
    {
        return DB::transaction(function () use ($data) {
            $user = parent::create([
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'email' => $data['email'],
                'timezone' => $data['timezone'],
                'password' => Hash::make($data['password']),
                'active' => isset($data['active']) && $data['active'] == '1' ? 1 : 0,
                'confirmation_code' => md5(uniqid(mt_rand(), true)),
                'confirmed' => isset($data['confirmed']) && $data['confirmed'] == '1' ? 1 : 0,
            ]);

            // See if adding any additional permissions
            if (!isset($data['permissions']) || !count($data['permissions'])) {
                $data['permissions'] = [];
            }

            if ($user) {
                // User must have at least one role
                if (!count($data['roles'])) {
                    throw new GeneralException(__('exceptions.backend.access.users.role_needed_create'));
                }

                if (!auth()->user()->isHasSystemRole()) {
                    if (in_array(config('access.users.system_role'), $data['roles'])) {
                        throw new GeneralException('Request Not allowed.');
                    }
                }

                // Add selected roles/permissions
                $user->syncRoles($data['roles']);
                $user->syncPermissions($data['permissions']);

                //Send confirmation email if requested and account approval is off
                if (isset($data['confirmation_email']) && $user->confirmed == 0 && !config('access.users.requires_approval')) {
                    $user->notify(new UserNeedsConfirmation($user->confirmation_code));
                }

                event(new UserCreated($user));
                event(new RepositoryEntityCreated($this, $user));

                return $user;
            }

            throw new GeneralException(__('exceptions.backend.access.users.create_error'));
        });
    }

    /**
     * @param array $attributes
     * @param       $id
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function update(array $attributes, $id)
    {
        $user = $this->find($id);
        $this->checkUserByEmail($user, $attributes['email']);

        // See if adding any additional permissions
        if (!isset($attributes['permissions']) || !count($attributes['permissions'])) {
            $attributes['permissions'] = [];
        }

        return DB::transaction(function () use ($user, $attributes) {
            if (parent::update([
                'first_name' => $attributes['first_name'],
                'last_name' => $attributes['last_name'],
                'email' => $attributes['email'],
                'timezone' => $attributes['timezone'],
            ], $user->id)) {
                if (!auth()->user()->isHasSystemRole()) {
                    if (in_array(config('access.users.system_role'), $attributes['roles'])) {
                        throw new GeneralException('Request Not allowed.');
                    }
                }
                if ($user->roles->pluck('name')->all() !== $attributes['roles'] &&
                    auth()->user()->id == $user->id) {
                    throw new GeneralException('Cannot update roles within your own account.');
                } elseif ($user->permissions->pluck('name')->all() !== $attributes['permissions'] &&
                    auth()->user()->id == $user->id) {
                    throw new GeneralException('Cannot update permissions within your own account.');
                }

                // Add selected roles/permissions
                $user->syncRoles($attributes['roles']);
                $user->syncPermissions($attributes['permissions']);

                event(new UserUpdated($user));
                event(new RepositoryEntityUpdated($this, $user));

                return $user;
            }

            throw new GeneralException(__('exceptions.backend.access.users.update_error'));
        });
    }

    /**
     * @param User $user
     * @param      $email
     *
     * @throws GeneralException
     */
    protected function checkUserByEmail(User $user, $email)
    {
        //Figure out if email is not the same
        if ($user->email != $email) {
            //Check to see if email exists
            if ($this->model->where('email', '=', $email)->first()) {
                throw new GeneralException(trans('exceptions.backend.access.users.email_error'));
            }
        }
    }

    /**
     * @param \App\Models\Auth\User $user
     * @param                       $input
     *
     * @return \App\Models\Auth\User
     * @throws \App\Exceptions\GeneralException
     */
    public function updatePassword(User $user, $input)
    {
        $user->password = Hash::make($input['password']);

        if ($user->save()) {
            event(new UserPasswordChanged($user));
            event(new RepositoryEntityUpdated($this, $user));

            return $user;
        }

        throw new GeneralException(__('exceptions.backend.access.users.update_password_error'));
    }

    /**
     * @param \App\Models\Auth\User $user
     * @param                       $status
     *
     * @return \App\Models\Auth\User
     * @throws \App\Exceptions\GeneralException
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     * @throws \Throwable
     */
    public function mark(User $user, $status): User
    {
        if (auth()->id() == $user->id && $status == 0) {
            throw new GeneralException(__('exceptions.backend.access.users.cant_deactivate_self'));
        }


        switch ($status) {
            case 0:
                event(new UserDeactivated($user));
                break;

            case 1:
                event(new UserReactivated($user));
                break;
        }

        if (parent::update([
            'active' => $status,
        ], $user->id)) {
            event(new RepositoryEntityUpdated($this, $user));
            return $user;
        }

        throw new GeneralException(__('exceptions.backend.access.users.mark_error'));
    }

    /**
     * @param \App\Models\Auth\User $user
     *
     * @return \App\Models\Auth\User
     * @throws \App\Exceptions\GeneralException
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     * @throws \Throwable
     */
    public function confirm(User $user): User
    {
        if ($user->confirmed == 1) {
            throw new GeneralException(__('exceptions.backend.access.users.already_confirmed'));
        }


        if (parent::update([
            'confirmed' => true,
        ], $user->id)) {
            event(new UserConfirmed($user));

            // Let user know their account was approved
            if (config('access.users.requires_approval')) {
                $user->notify(new UserAccountActive);
            }
            event(new RepositoryEntityUpdated($this, $user));

            return $user;
        }

        throw new GeneralException(__('exceptions.backend.access.users.cant_confirm'));
    }

    /**\
     * @param \App\Models\Auth\User $user
     *
     * @return \App\Models\Auth\User
     * @throws \App\Exceptions\GeneralException
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     * @throws \Throwable
     */
    public function unconfirm(User $user): User
    {
        if ($user->confirmed == 0) {
            throw new GeneralException(__('exceptions.backend.access.users.not_confirmed'));
        }

        if ($user->id == 1) {
            // Cant un-confirm admin
            throw new GeneralException(__('exceptions.backend.access.users.cant_unconfirm_admin'));
        }

        if ($user->id == auth()->id()) {
            // Cant un-confirm self
            throw new GeneralException(__('exceptions.backend.access.users.cant_unconfirm_self'));
        }


        if (parent::update([
            'confirmed' => false,
        ], $user->id)) {
            event(new UserUnconfirmed($user));
            event(new RepositoryEntityUpdated($this, $user));

            return $user;
        }

        throw new GeneralException(__('exceptions.backend.access.users.cant_unconfirm'));
    }

    /**
     * @param $id
     *
     * @return \App\Models\Auth\User
     * @throws \App\Exceptions\GeneralException
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     * @throws \Throwable
     */
    public function purge($id): User
    {
        $this->pushCriteria(new WithTrashCriteria);
        $user = $this->find($id);

        if (is_null($user->deleted_at)) {
            throw new GeneralException(__('exceptions.backend.access.users.delete_first'));
        }

        return DB::transaction(function () use ($user) {
            // Delete associated relationships
            $user->providers()->delete();


            if (parent::purge($user->id)) {
                event(new UserPermanentlyDeleted($user));
                event(new RepositoryEntityUpdated($this, $user));

                return $user;
            }

            throw new GeneralException(__('exceptions.backend.access.users.delete_error'));
        });
    }

    /**
     * @param $id
     *
     * @return \App\Models\Auth\User
     * @throws \App\Exceptions\GeneralException
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     * @throws \Throwable
     */
    public function restore($id): User
    {
        $this->pushCriteria(new WithTrashCriteria);
        $user = $this->find($id);

        if (is_null($user->deleted_at)) {
            throw new GeneralException(__('exceptions.backend.access.users.cant_restore'));
        }

        if (parent::restore($user->id)) {
            event(new UserRestored($user));
            event(new RepositoryEntityUpdated($this, $user));

            return $user;
        }

        throw new GeneralException(__('exceptions.backend.access.users.restore_error'));
    }
}
