<?php
/**
 * Created by PhpStorm.
 * User: lloric
 * Date: 3/4/19
 * Time: 6:43 AM
 */

namespace App\Repositories\Auth;

use App\Repositories\BaseRepositoryInterface;

/**
 * Interface RoleRepository
 *
 * @package App\Repositories\Auth
 */
interface RoleRepository extends BaseRepositoryInterface
{
    /**
     * @return mixed
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function forSelect();
}