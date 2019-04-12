<?php

namespace App\Repositories\Auth;

use App\Criterion\Eloquent\ThisEqualThatCriteria;
use App\Events\Backend\Auth\Role\RoleCreated;
use App\Events\Backend\Auth\Role\RoleUpdated;
use App\Exceptions\GeneralException;
use App\Models\Auth\Role;
use DB;
use HalcyonLaravel\Base\Repository\BaseRepository;

/**
 * Class RoleRepositoryEloquent
 *
 * @package App\Repositories\Auth
 */
class RoleRepositoryEloquent extends BaseRepository implements RoleRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return config('permission.models.role');
    }

    /**
     * @return mixed
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function forSelect()
    {
        if (!auth()->user()->isHasSystemRole()) {
//            $model = self::allRolesExceptSystem();
            $this->pushCriteria(new ThisEqualThatCriteria('name', config('access.users.system_role'), '!='));
        }

        return $this->with('permissions')->all(['id', 'name']);
    }

    /**
     * @param array $data
     *
     * @return \App\Models\Auth\Role
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function create(array $data): Role
    {
        // Make sure it doesn't already exist
        if ($this->roleExists($data['name'])) {
            throw new GeneralException('A role already exists with the name ' . $data['name']);
        }

        if (!isset($data['permissions']) || !count($data['permissions'])) {
            $data['permissions'] = [];
        }

        //See if the role must contain a permission as per config
        if (config('access.roles.role_must_contain_permission') && count($data['permissions']) == 0) {
            throw new GeneralException(__('exceptions.backend.access.roles.needs_permission'));
        }

        return DB::transaction(function () use ($data) {
            $role = parent::create(['name' => $data['name']]);

            if ($role) {
                $role->givePermissionTo($data['permissions']);

                event(new RoleCreated($role));

                return $role;
            }

            throw new GeneralException(trans('exceptions.backend.access.roles.create_error'));
        });
    }

    /**
     * @param $name
     *
     * @return bool
     */
    protected function roleExists($name): bool
    {
        return count($this->findWhere([
                'name' => $name,
            ])->all()) > 0;
    }

    /**
     * @param array $attributes
     * @param       $id
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function update(array $attributes, $id)
    {
        $role = $this->find($id);
        if ($role->isSystem()) {
            throw new GeneralException('You can not edit the system role.');
        }

        // If the name is changing make sure it doesn't already exist
        if ($role->name != $attributes['name']) {
            if ($this->roleExists($attributes['name'])) {
                throw new GeneralException('A role already exists with the name ' . $attributes['name']);
            }
        }

        if (!isset($attributes['permissions']) || !count($attributes['permissions'])) {
            $attributes['permissions'] = [];
        }

        //See if the role must contain a permission as per config
        if (config('access.roles.role_must_contain_permission') && count($attributes['permissions']) == 0) {
            throw new GeneralException(__('exceptions.backend.access.roles.needs_permission'));
        }

        return DB::transaction(function () use ($role, $attributes) {
            if (parent::update([
                'name' => $attributes['name'],
            ], $role->id)) {
                $role->syncPermissions($attributes['permissions']);

                event(new RoleUpdated($role));

                return $role;
            }

            throw new GeneralException(trans('exceptions.backend.access.roles.update_error'));
        });
    }
}
