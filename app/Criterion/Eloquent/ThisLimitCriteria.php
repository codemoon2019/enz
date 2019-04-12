<?php
/**
 * Created by PhpStorm.
 * User: lloric
 * Date: 2/7/19
 * Time: 10:57 AM
 */

namespace App\Criterion\Eloquent;


use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

class ThisLimitCriteria implements CriteriaInterface
{
    private $limit;

    public function __construct(int $limit = 10)
    {
        $this->limit = $limit;
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
        return $model->limit($this->limit);
    }
}