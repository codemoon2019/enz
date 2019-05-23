<?php

namespace App\Repositories\BecomeOurClientInquiry;

use App\Models\BecomeOurClientInquiry\BecomeOurClientInquiry;
use HalcyonLaravel\Base\Repository\BaseRepository;

/**
 * Class BecomeOurClientInquiryRepositoryEloquent
 *
 * @package App\Repositories\BecomeOurClientInquiry
 */
class BecomeOurClientInquiryRepositoryEloquent extends BaseRepository implements BecomeOurClientInquiryRepository
{
    /**
     * BecomeOurClientInquiryRepository constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->setObserver(new BecomeOurClientInquiryObserver);
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return BecomeOurClientInquiry::class;
    }
}
