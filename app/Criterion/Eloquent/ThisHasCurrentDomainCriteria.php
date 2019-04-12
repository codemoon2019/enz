<?php
/**
 * Created by PhpStorm.
 * User: lloric
 * Date: 2/11/19
 * Time: 12:36 PM
 */

namespace App\Criterion\Eloquent;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

class ThisHasCurrentDomainCriteria implements CriteriaInterface
{
    protected $machineName;

    public function __construct(string $machineName = null)
    {
        $this->machineName = $machineName;
    }

    /**
     * Apply criteria in query repository
     *
     * @param                     $model
     * @param RepositoryInterface $repository
     *
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository)
    {
        return $model->hasCurrentDomain($this->machineName);
    }
}