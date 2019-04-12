<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\User\UpdatePasswordRequest;
use App\Repositories\Auth\User\UserFrontendRepository;

/**
 * Class UpdatePasswordController
 *
 * @package App\Http\Controllers\Frontend\Auth
 */
class UpdatePasswordController extends Controller
{
    /**
     * @var \App\Repositories\Auth\User\UserFrontendRepository
     */
    protected $userRepository;

    /**
     * UpdatePasswordController constructor.
     *
     * @param \App\Repositories\Auth\User\UserFrontendRepository $userRepository
     */
    public function __construct(UserFrontendRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param \App\Http\Requests\Frontend\User\UpdatePasswordRequest $request
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     * @throws \Throwable
     */
    public function update(UpdatePasswordRequest $request)
    {
        $this->userRepository->updatePasswordFront($request->only('old_password', 'password'));

        return redirect()->route('frontend.user.account')->withFlashSuccess(__('strings.frontend.user.password_updated'));
    }
}
