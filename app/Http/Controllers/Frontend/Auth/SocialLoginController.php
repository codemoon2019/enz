<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Exceptions\GeneralException;
use App\Helpers\Frontend\Auth\Socialite as SocialiteHelper;
use App\Http\Controllers\Controller;
use App\Repositories\Auth\User\UserFrontendRepository;
use Illuminate\Http\Request;
use Socialite;

/**
 * Class SocialLoginController.
 */
class SocialLoginController extends Controller
{
    /**
     * @var \App\Repositories\Auth\User\UserFrontendRepository
     */
    protected $userFrontendRepository;

    /**
     * @var \App\Helpers\Frontend\Auth\Socialite
     */
    protected $socialiteHelper;

    /**
     * SocialLoginController constructor.
     *
     * @param \App\Repositories\Auth\User\UserFrontendRepository $userFrontendRepository
     * @param \App\Helpers\Frontend\Auth\Socialite               $socialiteHelper
     */
    public function __construct(UserFrontendRepository $userFrontendRepository, SocialiteHelper $socialiteHelper)
    {
        $this->userFrontendRepository = $userFrontendRepository;
        $this->socialiteHelper = $socialiteHelper;
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param                          $provider
     *
     * @return \Illuminate\Http\RedirectResponse|mixed
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function login(Request $request, $provider)
    {
        // There's a high probability something will go wrong
        $user = null;

        // If the provider is not an acceptable third party than kick back
        if (!in_array($provider, $this->socialiteHelper->getAcceptedProviders())) {
            return redirect()->route(home_route())->withFlashDanger(__('auth.socialite.unacceptable',
                ['provider' => $provider]));
        }

        /*
         * The first time this is hit, request is empty
         * It's redirected to the provider and then back here, where request is populated
         * So it then continues creating the user
         */
        if (!$request->all()) {
            return $this->getAuthorizationFirst($provider);
        }

        // Create the user if this is a new social account or find the one that is already there.
        try {
            $user = $this->userFrontendRepository->findOrCreateProvider($this->getProviderUser($provider), $provider);
        } catch (GeneralException $e) {
            return redirect()->route(home_route())->withFlashDanger($e->getMessage());
        }

        if (is_null($user)) {
            return redirect()->route(home_route())->withFlashDanger(__('exceptions.frontend.auth.unknown'));
        }

        // Check to see if they are active.
        if (!$user->isActive()) {
            throw new GeneralException(__('exceptions.frontend.auth.deactivated'));
        }

        // Account approval is on
        if ($user->isPending()) {
            throw new GeneralException(__('exceptions.frontend.auth.confirmation.pending'));
        }

        // User has been successfully created or already exists
        auth()->login($user, true);

        // Set session variable so we know which provider user is logged in as, if ever needed
        session([config('access.socialite_session_name') => $provider]);

        // Return to the intended url or default to the class property
        return redirect()->intended(route(home_route()));
    }

    /**
     * @param $provider
     *
     * @return mixed
     */
    protected function getAuthorizationFirst($provider)
    {
        $socialite = Socialite::driver($provider);
        $scopes = empty(config("services.{$provider}.scopes")) ? false : config("services.{$provider}.scopes");
        $with = empty(config("services.{$provider}.with")) ? false : config("services.{$provider}.with");
        $fields = empty(config("services.{$provider}.fields")) ? false : config("services.{$provider}.fields");

        if ($scopes) {
            $socialite->scopes($scopes);
        }

        if ($with) {
            $socialite->with($with);
        }

        if ($fields) {
            $socialite->fields($fields);
        }

        return $socialite->redirect();
    }

    /**
     * @param $provider
     *
     * @return mixed
     */
    protected function getProviderUser($provider)
    {
        return Socialite::driver($provider)->user();
    }
}
