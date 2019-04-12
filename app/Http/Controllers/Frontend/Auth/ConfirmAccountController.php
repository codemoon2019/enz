<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use App\Notifications\Frontend\Auth\UserNeedsConfirmation;
use App\Repositories\Auth\User\UserFrontendRepository;

/**
 * Class ConfirmAccountController
 *
 * @package App\Http\Controllers\Frontend\Auth
 */
class ConfirmAccountController extends Controller
{
    /**
     * @var \App\Repositories\Auth\User\UserFrontendRepository
     */
    protected $userFrontendRepository;

    /**
     * ConfirmAccountController constructor.
     *
     * @param \App\Repositories\Auth\User\UserFrontendRepository $userFrontendRepository
     */
    public function __construct(UserFrontendRepository $userFrontendRepository)
    {
        $this->userFrontendRepository = $userFrontendRepository;
    }

    /**
     * @param $token
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function confirm($token)
    {
        $this->userFrontendRepository->confirmFront($token);

        return redirect()->route('frontend.auth.login')->withFlashSuccess(__('exceptions.frontend.auth.confirmation.success'));
    }

    /**
     * @param $uuid
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function sendConfirmationEmail($uuid)
    {
        $user = $this->userFrontendRepository->findByUuid($uuid);

        if ($user->isConfirmed()) {
            return redirect()->route('frontend.auth.login')->withFlashSuccess(__('exceptions.frontend.auth.confirmation.already_confirmed'));
        }

        $user->notify(new UserNeedsConfirmation($user->confirmation_code));

        return redirect()->route('frontend.auth.login')->withFlashSuccess(__('exceptions.frontend.auth.confirmation.resent'));
    }
}
