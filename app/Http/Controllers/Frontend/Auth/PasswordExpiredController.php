<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\User\UpdatePasswordRequest;
use App\Repositories\Auth\User\UserFrontendRepository;

/**
 * Class PasswordExpiredController.
 */
class PasswordExpiredController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function expired()
    {
        return view('frontend.auth.passwords.expired');
    }

    /**
     * @param \App\Http\Requests\Frontend\User\UpdatePasswordRequest $request
     * @param \App\Repositories\Auth\User\UserFrontendRepository     $userRepository
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     * @throws \Throwable
     */
    public function update(UpdatePasswordRequest $request, UserFrontendRepository $userRepository)
    {
        $userRepository->updatePasswordFront($request->only('old_password', 'password'), true);

        return redirect()->route('frontend.user.account')->withFlashSuccess(__('strings.frontend.user.password_updated'));
    }
}
