<?php

namespace App\Repositories\City;

use App\Models\City\City;
use HalcyonLaravel\Base\Repository\BaseRepository;

/**
 * Class CityRepositoryEloquent
 *
 * @package App\Repositories\City
 */
class CityRepositoryEloquent extends BaseRepository implements CityRepository
{
    /**
     * CityRepository constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->setObserver(new CityObserver);
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return City::class;
    }
}
