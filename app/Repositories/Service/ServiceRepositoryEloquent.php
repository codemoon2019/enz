<?php

namespace App\Repositories\Service;

use App\Models\Service\Service;
use HalcyonLaravel\Base\Repository\BaseRepository;

/**
 * Class ServiceRepositoryEloquent
 *
 * @package App\Repositories\Service
 */
class ServiceRepositoryEloquent extends BaseRepository implements ServiceRepository
{
    /**
     * ServiceRepository constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->setObserver(new ServiceObserver);
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Service::class;
    }
}
