<?php

namespace App\Repositories\Core\Slide;

use App\Criterion\Eloquent\ThisEqualThatCriteria;
use App\Models\Core\Slide\Slide;
use HalcyonLaravel\Base\Repository\BaseRepository;

/**
 * Class SlideRepositoryEloquent
 *
 * @package App\Repositories\Core\Slide
 */
class SlideRepositoryEloquent extends BaseRepository implements SlideRepository
{
    /**
     * @param array|null $request
     * @param array      $fields
     * @param bool       $isAllFillable
     *
     * @return mixed
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function table(array $request = null, array $fields = [], bool $isAllFillable = true)
    {
        $statusKey = $this->model->statusKeyName();
        if (array_key_exists($statusKey, $request)) {
            $this->pushCriteria(new ThisEqualThatCriteria($statusKey, $request[$statusKey]));
        }

        $this->applyCriteria();
        $this->applyScope();

        $builder = $this->model->select(['id', 'title', 'machine_name', 'slug', 'updated_at', 'status']);

        $this->resetModel();
        $this->resetScope();

        return $builder;
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Slide::class;
    }
}
