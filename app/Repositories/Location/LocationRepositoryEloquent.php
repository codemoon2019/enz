<?php

namespace App\Repositories\Location;

use App\Models\Location\Location;
use HalcyonLaravel\Base\Repository\BaseRepository;

/**
 * Class LocationRepositoryEloquent
 *
 * @package App\Repositories\Location
 */
class LocationRepositoryEloquent extends BaseRepository implements LocationRepository
{
    /**
     * LocationRepository constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->setObserver(new LocationObserver);
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Location::class;
    }
}
