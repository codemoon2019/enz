<?php

namespace App\Repositories\Career;

use App\Models\Career\Career;
use HalcyonLaravel\Base\Repository\BaseRepository;

/**
 * Class CareerRepositoryEloquent
 *
 * @package App\Repositories\Career
 */
class CareerRepositoryEloquent extends BaseRepository implements CareerRepository
{
    /**
     * CareerRepository constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->setObserver(new CareerObserver);
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Career::class;
    }
}
