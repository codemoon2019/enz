<?php

namespace App\Repositories\ServicesOffered;

use App\Models\ServicesOffered\ServicesOffered;
use HalcyonLaravel\Base\Repository\BaseRepository;

/**
 * Class ServicesOfferedRepositoryEloquent
 *
 * @package App\Repositories\ServicesOffered
 */
class ServicesOfferedRepositoryEloquent extends BaseRepository implements ServicesOfferedRepository
{
    /**
     * ServicesOfferedRepository constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->setObserver(new ServicesOfferedObserver);
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ServicesOffered::class;
    }
}
