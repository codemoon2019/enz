<?php

namespace App\Http\Controllers\Backend\Auth\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Auth\User\ManageUserRequest;
use App\Http\Requests\Backend\Auth\User\UpdateUserPasswordRequest;
use App\Models\Auth\User;
use App\Repositories\Auth\User\UserRepository;

/**
 * Class UserPasswordController
 *
 * @package App\Http\Controllers\Backend\Auth\User
 */
class UserPasswordController extends Controller
{
    /**
     * @var \App\Repositories\Auth\User\UserRepository
     */
    protected $userRepository;

    /**
     * UserPasswordController constructor.
     *
     * @param \App\Repositories\Auth\User\UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param \App\Models\Auth\User                                  $user
     * @param \App\Http\Requests\Backend\Auth\User\ManageUserRequest $request
     *
     * @return mixed
     */
    public function edit(User $user, ManageUserRequest $request)
    {
        return view('backend.auth.user.change-password')
            ->withUser($user);
    }

    /**
     * @param \App\Models\Auth\User                                          $user
     * @param \App\Http\Requests\Backend\Auth\User\UpdateUserPasswordRequest $request
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function update(User $user, UpdateUserPasswordRequest $request)
    {
        $this->userRepository->updatePassword($user, $request->only('password'));

        return redirect()->route('admin.auth.users.index')->withFlashSuccess(__('alerts.backend.users.updated_password'));
    }
}
