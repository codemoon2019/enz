<?php

namespace App\Http\Controllers\Backend\Auth\User;

use App\Criterion\Eloquent\ThisEqualThatCriteria;
use App\Events\Backend\Auth\User\UserDeleted;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Auth\User\ManageUserRequest;
use App\Http\Requests\Backend\Auth\User\StoreUserRequest;
use App\Http\Requests\Backend\Auth\User\UpdateUserRequest;
use App\Models\Auth\User;
use App\Repositories\Auth\PermissionRepository;
use App\Repositories\Auth\RoleRepository;
use App\Repositories\Auth\User\UserRepository;
use HalcyonLaravel\Base\Criterion\Eloquent\LatestCriteria;

/**
 * Class UserController
 *
 * @package App\Http\Controllers\Backend\Auth\User
 */
class UserController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $userRepository;

    /**
     * UserController constructor.
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
    public function index(ManageUserRequest $request)
    {
        $this->userRepository->pushCriteria(new LatestCriteria);
        $this->userRepository->pushCriteria(new ThisEqualThatCriteria('active', true));
        $users = $this->userRepository->with(['roles', 'permissions', 'providers'])->paginate();

        $userDatas = $users;
        if (!auth()->user()->isHasSystemRole()) {
            $userDatas = $userDatas->reject(function ($userData) {
                return $userData->isHasSystemRole() == true;
            });
        }

        return view('backend.auth.user.index')
            ->withUsersDatas($userDatas)
            ->withUsers($users);
    }

    /**
     * @param \App\Http\Requests\Backend\Auth\User\ManageUserRequest $request
     * @param \App\Repositories\Auth\RoleRepository                  $roleRepository
     * @param \App\Repositories\Auth\PermissionRepository            $permissionRepository
     *
     * @return mixed
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function create(
        ManageUserRequest $request,
        RoleRepository $roleRepository,
        PermissionRepository $permissionRepository
    ) {
        return view('backend.auth.user.create')
            ->withRoles($roleRepository->forSelect())
            ->withPermissions($permissionRepository->get(['id', 'name']));
    }

    /**
     * @param \App\Http\Requests\Backend\Auth\User\StoreUserRequest $request
     *
     * @return mixed
     * @throws \Throwable
     */
    public function store(StoreUserRequest $request)
    {
        $this->userRepository->create($request->only(
            'first_name',
            'last_name',
            'email',
            'password',
            'timezone',
            'active',
            'confirmed',
            'confirmation_email',
            'roles',
            'permissions'
        ));

        return redirect()->route('admin.auth.users.index')->withFlashSuccess(__('alerts.backend.users.created'));
    }

    /**
     * @param \App\Models\Auth\User                                  $user
     * @param \App\Http\Requests\Backend\Auth\User\ManageUserRequest $request
     *
     * @return mixed
     */
    public function show(User $user, ManageUserRequest $request)
    {
        if (!auth()->user()->isHasSystemRole()) {
            if ($user->isHasSystemRole()) {
                abort(404);
            }
        }
        return view('backend.auth.user.show')
            ->withUser($user);
    }

    /**
     * @param \App\Models\Auth\User                                  $user
     * @param \App\Http\Requests\Backend\Auth\User\ManageUserRequest $request
     * @param \App\Repositories\Auth\RoleRepository                  $roleRepository
     * @param \App\Repositories\Auth\PermissionRepository            $permissionRepository
     *
     * @return mixed
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function edit(
        User $user,
        ManageUserRequest $request,
        RoleRepository $roleRepository,
        PermissionRepository $permissionRepository
    ) {
        return view('backend.auth.user.edit')
            ->withUser($user)
            ->withRoles($roleRepository->forSelect())
            ->withUserRoles($user->roles->pluck('name')->all())
            ->withPermissions($permissionRepository->get(['id', 'name']))
            ->withUserPermissions($user->permissions->pluck('name')->all());
    }

    /**
     * @param \App\Models\Auth\User                                  $user
     * @param \App\Http\Requests\Backend\Auth\User\UpdateUserRequest $request
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function update(User $user, UpdateUserRequest $request)
    {
        $this->userRepository->update($request->only(
            'first_name',
            'last_name',
            'email',
            'timezone',
            'roles',
            'permissions'
        ), $user->id);

        return redirect()->route('admin.auth.users.index')->withFlashSuccess(__('alerts.backend.users.updated'));
    }

    /**
     * @param \App\Models\Auth\User                                  $user
     * @param \App\Http\Requests\Backend\Auth\User\ManageUserRequest $request
     *
     * @return mixed
     * @throws \Throwable
     */
    public function destroy(User $user, ManageUserRequest $request)
    {
        $this->userRepository->delete($user->id);

        event(new UserDeleted($user));

        return redirect()->route('admin.auth.users.deleted')->withFlashSuccess(__('alerts.backend.users.deleted'));
    }
}
