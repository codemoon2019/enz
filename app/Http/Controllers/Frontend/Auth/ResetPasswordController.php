<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use App\Repositories\Auth\User\UserFrontendRepository;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;

/**
 * Class ResetPasswordController.
 */
class ResetPasswordController extends Controller
{
    use ResetsPasswords;

    /**
     * @var \App\Repositories\Auth\User\UserFrontendRepository
     */
    protected $userRepository;

    /**
     * ResetPasswordController constructor.
     *
     * @param \App\Repositories\Auth\User\UserFrontendRepository $userRepository
     */
    public function __construct(UserFrontendRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Display the password reset view for the given token.
     *
     * If no token is present, display the link request form.
     *
     * @param null $token
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function showResetForm($token = null)
    {
        if (!$token) {
            return redirect()->route('frontend.auth.password.email');
        }

        $user = $this->userRepository->findByPasswordResetToken($token);

        if ($user && app()->make('auth.password.broker')->tokenExists($user, $token)) {
            return view('frontend.auth.passwords.reset')
                ->withToken($token)
                ->withEmail($user->email);
        }

        return redirect()->route('frontend.auth.password.email')
            ->withFlashDanger(__('exceptions.frontend.auth.password.reset_problem'));
    }

    /**
     * Get the response for a successful password reset.
     *
     * @param \Illuminate\Http\Request $request
     * @param                          $response
     *
     * @return mixed
     */
    protected function sendResetResponse(Request $request, $response)
    {
        return redirect()->route(home_route())->withFlashSuccess(trans($response));
    }
}
