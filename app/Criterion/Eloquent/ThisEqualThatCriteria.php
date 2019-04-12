<?php
/**
 *
 * Created by PhpStorm.
 * User: Lloric Mayuga Garcia <lloricode@gmail.com>
 * Date: 10/30/18
 * Time: 2:17 PM
 */

namespace App\Criterion\Eloquent;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class ThisEqualThatCriteria
 *
 * @package App\Criterion\Eloquent
 * @author  Lloric Mayuga Garcia <lloricode@gmail.com>
 */
class ThisEqualThatCriteria implements CriteriaInterface
{
    /**
     * @var
     */
    private $field;

    /**
     * @var
     */
    private $value;
    /**
     * @var
     */
    private $comparison;

    /**
     * ThisEqualThatCriteria constructor.
     *
     * @param string $field
     * @param null   $value
     * @param string $comparison
     */
    public function __construct(string $field, $value = null, string $comparison = '=')
    {
        $this->field = $field;
        $this->value = $value;
        $this->comparison = $comparison;
    }

    /**
     * @param                                                   $model
     * @param \Prettus\Repository\Contracts\RepositoryInterface $repository
     *
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository)
    {
        return $model->where($this->field, $this->comparison, $this->value);
    }
}