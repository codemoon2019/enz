<?php

namespace App\Repositories\Auth;

use HalcyonLaravel\Base\Repository\BaseRepository;

/**
 * Class PermissionRepositoryEloquent
 *
 * @package App\Repositories\Auth
 */
class PermissionRepositoryEloquent extends BaseRepository implements PermissionRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return config('permission.models.permission');
    }
}
