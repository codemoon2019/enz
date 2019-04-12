<?php

namespace App\Repositories\Core\Block;

use App\Criterion\Eloquent\ThisEqualThatCriteria;
use App\Models\Core\Block\Block;
use HalcyonLaravel\Base\Repository\BaseRepository;

/**
 * Class BlockRepositoryEloquent
 *
 * @package App\Repositories\Core\Block
 */
class BlockRepositoryEloquent extends BaseRepository implements BlockRepository
{
    public function __construct()
    {
        parent::__construct();
        $this->setObserver(new BlockObserver);
    }

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
        $whereStatus = array_keys($this->model->statuses())[0];
        if (array_key_exists($statusKey, $request)) {
            $whereStatus = $request[$statusKey];
        }

        $this->pushCriteria(new ThisEqualThatCriteria($statusKey, $whereStatus));

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
        return Block::class;
    }
}
