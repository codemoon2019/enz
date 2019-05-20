<?php

namespace App\Repositories\TouristVisaInquiry;

use App\Models\TouristVisaInquiry\TouristVisaInquiry;
use HalcyonLaravel\Base\Repository\BaseRepository;

/**
 * Class TouristVisaInquiryRepositoryEloquent
 *
 * @package App\Repositories\TouristVisaInquiry
 */
class TouristVisaInquiryRepositoryEloquent extends BaseRepository implements TouristVisaInquiryRepository
{
    /**
     * TouristVisaInquiryRepository constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->setObserver(new TouristVisaInquiryObserver);
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return TouristVisaInquiry::class;
    }
}
