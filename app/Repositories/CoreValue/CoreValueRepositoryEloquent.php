<?php

namespace App\Repositories\CoreValue;

use App\Models\CoreValue\CoreValue;
use HalcyonLaravel\Base\Repository\BaseRepository;

/**
 * Class CoreValueRepositoryEloquent
 *
 * @package App\Repositories\CoreValue
 */
class CoreValueRepositoryEloquent extends BaseRepository implements CoreValueRepository
{
    /**
     * CoreValueRepository constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->setObserver(new CoreValueObserver);
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return CoreValue::class;
    }
}
