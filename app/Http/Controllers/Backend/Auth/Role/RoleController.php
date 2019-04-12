<?php

namespace App\Http\Controllers\Backend\Auth\Role;

use App\Criterion\Eloquent\ThisEqualThatCriteria;
use App\Events\Backend\Auth\Role\RoleDeleted;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Auth\Role\ManageRoleRequest;
use App\Http\Requests\Backend\Auth\Role\StoreRoleRequest;
use App\Http\Requests\Backend\Auth\Role\UpdateRoleRequest;
use App\Models\Auth\Role;
use App\Repositories\Auth\PermissionRepository;
use App\Repositories\Auth\RoleRepository;

/**
 * Class RoleController.
 */
class RoleController extends Controller
{
    /**
     * @var RoleRepository
     */
    protected $roleRepository;

    /**
     * @var PermissionRepository
     */
    protected $permissionRepository;

    /**
     * @param RoleRepository       $roleRepository
     * @param PermissionRepository $permissionRepository
     */
    public function __construct(RoleRepository $roleRepository, PermissionRepository $permissionRepository)
    {
        $this->roleRepository = $roleRepository;
        $this->permissionRepository = $permissionRepository;
    }

    /**
     * @param \App\Http\Requests\Backend\Auth\Role\ManageRoleRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function index(ManageRoleRequest $request)
    {
        if (!auth()->user()->isHasSystemRole()) {
            $this->roleRepository->pushCriteria(
                new ThisEqualThatCriteria('name', config('access.users.system_role'), '!='));
        }
        return view('backend.auth.role.index')
            ->with([
                'roles' => $this->roleRepository->with(['users', 'permissions'])->paginate(),
            ]);
    }

    /**
     * @param ManageRoleRequest $request
     *
     * @return mixed
     */
    public function create(ManageRoleRequest $request)
    {
        return view('backend.auth.role.create')
            ->withPermissions($this->permissionRepository->get());
    }

    /**
     * @param \App\Http\Requests\Backend\Auth\Role\StoreRoleRequest $request
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function store(StoreRoleRequest $request)
    {
        $this->roleRepository->create($request->only('name', 'associated-permissions', 'permissions', 'sort'));

        return redirect()->route('admin.auth.roles.index')->withFlashSuccess(__('alerts.backend.roles.created'));
    }

    /**
     * @param Role              $role
     * @param ManageRoleRequest $request
     *
     * @return mixed
     */
    public function edit(Role $role, ManageRoleRequest $request)
    {
        if ($role->isSystem()) {
            return redirect()->route('admin.auth.roles.index')->withFlashDanger('You can not edit the administrator role.');
        }

        return view('backend.auth.role.edit')
            ->withRole($role)
            ->withRolePermissions($role->permissions->pluck('name')->all())
            ->withPermissions($this->permissionRepository->get());
    }

    /**
     * @param \App\Models\Auth\Role                                  $role
     * @param \App\Http\Requests\Backend\Auth\Role\UpdateRoleRequest $request
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function update(Role $role, UpdateRoleRequest $request)
    {
        $this->roleRepository->update($request->only('name', 'permissions'), $role->id);

        return redirect()->route('admin.auth.roles.index')->withFlashSuccess(__('alerts.backend.roles.updated'));
    }

    /**
     * @param \App\Models\Auth\Role                                  $role
     * @param \App\Http\Requests\Backend\Auth\Role\ManageRoleRequest $request
     *
     * @return mixed
     * @throws \Throwable
     */
    public function destroy(Role $role, ManageRoleRequest $request)
    {
        if ($role->isSystem()) {
            return redirect()->route('admin.auth.roles.index')->withFlashDanger(__('exceptions.backend.access.roles.cant_delete_admin'));
        }

        $this->roleRepository->delete($role->id);

        event(new RoleDeleted($role));

        return redirect()->route('admin.auth.roles.index')->withFlashSuccess(__('alerts.backend.roles.deleted'));
    }
}
