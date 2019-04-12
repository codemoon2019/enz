<?php

namespace App\Http\Controllers\Backend\Auth\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Auth\User\ManageUserRequest;
use App\Models\Auth\User;
use App\Repositories\Auth\SessionRepository;

/**
 * Class UserSessionController
 *
 * @package App\Http\Controllers\Backend\Auth\User
 */
class UserSessionController extends Controller
{
    /**
     * @param \App\Models\Auth\User                                  $user
     * @param \App\Http\Requests\Backend\Auth\User\ManageUserRequest $request
     * @param \App\Repositories\Auth\SessionRepository               $sessionRepository
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function clearSession(User $user, ManageUserRequest $request, SessionRepository $sessionRepository)
    {
        $sessionRepository->clearSession($user);

        return redirect()->back()->withFlashSuccess(__('alerts.backend.users.session_cleared'));
    }
}
