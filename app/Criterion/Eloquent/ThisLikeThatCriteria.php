<?php
/**
 *
 * Created by PhpStorm.
 * User: Lloric Mayuga Garcia <lloricode@gmail.com>
 * Date: 10/30/18
 * Time: 2:10 PM
 */

namespace App\Criterion\Eloquent;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class ThisLikeThatCriteria
 *
 * @package App\Criterion\Eloquent
 * @author  Lloric Mayuga Garcia <lloricode@gmail.com>
 */
class ThisLikeThatCriteria implements CriteriaInterface
{
    /**
     * @var
     */
    private $field;

    /**
     * @var
     */
    private $valueString;

    /**
     * @var string
     */
    private $separator;

    /**
     * @var string
     */
    private $wildcard;

    /**
     * LikeCriteria constructor.
     *
     * @param        $field
     * @param        $valueString
     * @param string $separator
     * @param string $wildcard
     */
    public function __construct($field, $valueString, $separator = ',', $wildcard = '*')
    {
        $this->field = $field;
        $this->valueString = $valueString;
        $this->separator = $separator;
        $this->wildcard = $wildcard;
    }

    /**
     * @param                                                   $model
     * @param \Prettus\Repository\Contracts\RepositoryInterface $repository
     *
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository)
    {
        return $model->where(function ($query) {
            $values = explode($this->separator, $this->valueString);
            $query->where($this->field, 'LIKE', str_replace($this->wildcard, '%', array_shift($values)));
            foreach ($values as $value) {
                $query->orWhere($this->field, 'LIKE', str_replace($this->wildcard, '%', $value));
            }
        });
    }
}