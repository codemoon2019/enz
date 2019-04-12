<?php
/**
 * Created by PhpStorm.
 * User: Lloric Mayuga Garcia <lloricode@gmail.com>
 * Date: 3/3/19
 * Time: 5:45 PM
 */

namespace App\Repositories\Core\Domain;

use App\Models\Core\Domain\Domain;
use App\Repositories\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

/**
 * Interface DomainRepository
 *
 * @package App\Repositories\Core\Domain
 */
interface DomainRepository extends BaseRepositoryInterface
{
    /**
     * @param string $column
     * @param string $key
     *
     * @return array|\Illuminate\Support\Collection
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function pluckForSubSites($column = 'title', $key = 'machine_name');

    /**
     * @param \Illuminate\Database\Eloquent\Model $model
     * @param bool                                $throw404ExceptionOnFalse
     * @param string|null                         $domainMachineName
     *
     * @return bool
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function hasCurrentBaseUrl(
        Model $model,
        bool $throw404ExceptionOnFalse = true,
        string $domainMachineName = null
    ): bool;

    /**
     * @param string|null $machineName
     *
     * @return \App\Models\Core\Domain\Domain
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function getInstanceByBaseUrl(string $machineName = null): Domain;
}