<?php

namespace App\Repositories\Country;

use App\Models\Country\Country;
use HalcyonLaravel\Base\Repository\BaseRepository;

/**
 * Class CountryRepositoryEloquent
 *
 * @package App\Repositories\Country
 */
class CountryRepositoryEloquent extends BaseRepository implements CountryRepository
{
    /**
     * CountryRepository constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->setObserver(new CountryObserver);
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Country::class;
    }
}
