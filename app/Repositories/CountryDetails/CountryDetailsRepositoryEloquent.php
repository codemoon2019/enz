<?php

namespace App\Repositories\CountryDetails;

use App\Models\CountryDetails\CountryDetails;
use HalcyonLaravel\Base\Repository\BaseRepository;

/**
 * Class CountryDetailsRepositoryEloquent
 *
 * @package App\Repositories\CountryDetails
 */
class CountryDetailsRepositoryEloquent extends BaseRepository implements CountryDetailsRepository
{
    /**
     * CountryDetailsRepository constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->setObserver(new CountryDetailsObserver);
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return CountryDetails::class;
    }
}
