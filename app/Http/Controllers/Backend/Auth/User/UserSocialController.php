<?php

namespace App\Http\Controllers\Backend\Auth\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Auth\User\ManageUserRequest;
use App\Models\Auth\SocialAccount;
use App\Models\Auth\User;
use App\Repositories\Auth\SocialRepository;

/**
 * Class UserSocialController
 *
 * @package App\Http\Controllers\Backend\Auth\User
 */
class UserSocialController extends Controller
{
    /**
     * @param \App\Models\Auth\User                                  $user
     * @param \App\Models\Auth\SocialAccount                         $social
     * @param \App\Http\Requests\Backend\Auth\User\ManageUserRequest $request
     * @param \App\Repositories\Auth\SocialRepository                $socialRepository
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function unlink(
        User $user,
        SocialAccount $social,
        ManageUserRequest $request,
        SocialRepository $socialRepository
    ) {
        $socialRepository->delete($user, $social);

        return redirect()->back()->withFlashSuccess(__('alerts.backend.users.social_deleted'));
    }
}
