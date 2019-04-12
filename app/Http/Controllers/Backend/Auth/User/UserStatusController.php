<?php

namespace App\Http\Controllers\Backend\Auth\User;

use App\Criterion\Eloquent\OnlyTrashedCriteria;
use App\Criterion\Eloquent\ThisEqualThatCriteria;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Auth\User\ManageUserRequest;
use App\Models\Auth\User;
use App\Repositories\Auth\User\UserRepository;
use HalcyonLaravel\Base\Criterion\Eloquent\LatestCriteria;

/**
 * Class UserStatusController
 *
 * @package App\Http\Controllers\Backend\Auth\User
 */
class UserStatusController extends Controller
{
    /**
     * @var \App\Repositories\Auth\User\UserRepository
     */
    protected $userRepository;

    /**
     * UserStatusController constructor.
     *
     * @param \App\Repositories\Auth\User\UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param \App\Http\Requests\Backend\Auth\User\ManageUserRequest $request
     *
     * @return mixed
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function getDeactivated(ManageUserRequest $request)
    {
        $this->userRepository->pushCriteria(new LatestCriteria);
        $this->userRepository->pushCriteria(new ThisEqualThatCriteria('active', false));
        $users = $this->userRepository->with(['roles', 'permissions', 'providers'])->paginate();

        return view('backend.auth.user.deactivated')
            ->withUsers($users);
    }

    /**
     * @param \App\Http\Requests\Backend\Auth\User\ManageUserRequest $request
     *
     * @return mixed
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function getDeleted(ManageUserRequest $request)
    {
        $this->userRepository->pushCriteria(new LatestCriteria);
        $this->userRepository->pushCriteria(new OnlyTrashedCriteria());
        $users = $this->userRepository->with(['roles', 'permissions', 'providers'])->paginate();

        return view('backend.auth.user.deleted')
            ->withUsers($users);
    }

    /**
     * @param \App\Models\Auth\User                                  $user
     * @param                                                        $status
     * @param \App\Http\Requests\Backend\Auth\User\ManageUserRequest $request
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     * @throws \Throwable
     */
    public function mark(User $user, $status, ManageUserRequest $request)
    {
        $this->userRepository->mark($user, $status);

        return redirect()->route(
            $status == 1 ?
                'admin.auth.users.index' :
                'admin.auth.users.deactivated'
        )->withFlashSuccess(__('alerts.backend.users.updated'));
    }

    /**
     * @param \App\Models\Auth\User                                  $deletedUser
     * @param \App\Http\Requests\Backend\Auth\User\ManageUserRequest $request
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     * @throws \Throwable
     */
    public function delete(User $deletedUser, ManageUserRequest $request)
    {
        $this->userRepository->purge($deletedUser->id);

        return redirect()->route('admin.auth.users.deleted')->withFlashSuccess(__('alerts.backend.users.deleted_permanently'));
    }

    /**
     * @param \App\Models\Auth\User                                  $deletedUser
     * @param \App\Http\Requests\Backend\Auth\User\ManageUserRequest $request
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     * @throws \Throwable
     */
    public function restore(User $deletedUser, ManageUserRequest $request)
    {
        $this->userRepository->restore($deletedUser->id);

        return redirect()->route('admin.auth.users.index')->withFlashSuccess(__('alerts.backend.users.restored'));
    }
}
