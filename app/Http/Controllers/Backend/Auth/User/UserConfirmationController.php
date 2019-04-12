<?php

namespace App\Http\Controllers\Backend\Auth\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Auth\User\ManageUserRequest;
use App\Models\Auth\User;
use App\Notifications\Frontend\Auth\UserNeedsConfirmation;
use App\Repositories\Auth\User\UserRepository;

/**
 * Class UserConfirmationController
 *
 * @package App\Http\Controllers\Backend\Auth\User
 */
class UserConfirmationController extends Controller
{
    /**
     * @var \App\Repositories\Auth\User\UserRepository
     */
    protected $userRepository;

    /**
     * UserConfirmationController constructor.
     *
     * @param \App\Repositories\Auth\User\UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param User              $user
     * @param ManageUserRequest $request
     *
     * @return mixed
     */
    public function sendConfirmationEmail(User $user, ManageUserRequest $request)
    {
        // Shouldn't allow users to confirm their own accounts when the application is set to manual confirmation
        if (config('access.users.requires_approval')) {
            return redirect()->back()->withFlashDanger(__('alerts.backend.users.cant_resend_confirmation'));
        }

        if ($user->isConfirmed()) {
            return redirect()->back()->withFlashSuccess(__('exceptions.backend.access.users.already_confirmed'));
        }

        $user->notify(new UserNeedsConfirmation($user->confirmation_code));

        return redirect()->back()->withFlashSuccess(__('alerts.backend.users.confirmation_email'));
    }

    /**
     * @param User              $user
     * @param ManageUserRequest $request
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function confirm(User $user, ManageUserRequest $request)
    {
        $this->userRepository->confirm($user);

        return redirect()->route('admin.auth.users.index')->withFlashSuccess(__('alerts.backend.users.confirmed'));
    }

    /**
     * @param User              $user
     * @param ManageUserRequest $request
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function unconfirm(User $user, ManageUserRequest $request)
    {
        $this->userRepository->unconfirm($user);

        return redirect()->route('admin.auth.users.index')->withFlashSuccess(__('alerts.backend.users.unconfirmed'));
    }
}
