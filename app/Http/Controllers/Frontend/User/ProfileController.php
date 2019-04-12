<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\User\UpdateProfileRequest;
use App\Repositories\Auth\User\UserFrontendRepository;

/**
 * Class ProfileController
 *
 * @package App\Http\Controllers\Frontend\User
 */
class ProfileController extends Controller
{
    /**
     * @var \App\Repositories\Auth\User\UserFrontendRepository
     */
    protected $userFrontendRepository;

    /**
     * ProfileController constructor.
     *
     * @param \App\Repositories\Auth\User\UserFrontendRepository $userFrontendRepository
     */
    public function __construct(UserFrontendRepository $userFrontendRepository)
    {
        $this->userFrontendRepository = $userFrontendRepository;
    }

    /**
     * @param \App\Http\Requests\Frontend\User\UpdateProfileRequest $request
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     * @throws \Throwable
     */
    public function update(UpdateProfileRequest $request)
    {
        $output = $this->userFrontendRepository->updateFront(
            $request->user()->id,
            $request->only('first_name', 'last_name', 'email', 'avatar_type', 'avatar_location', 'timezone'),
            $request->has('avatar_location') ? $request->file('avatar_location') : false
        );

        // E-mail address was updated, user has to reconfirm
        if (is_array($output) && $output['email_changed']) {
            auth()->logout();

            return redirect()->route('frontend.auth.login')->withFlashInfo(__('strings.frontend.user.email_changed_notice'));
        }

        return redirect()->route('frontend.user.account')->withFlashSuccess(__('strings.frontend.user.profile_updated'));
    }
}
