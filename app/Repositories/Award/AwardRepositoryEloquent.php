<?php

namespace App\Repositories\Award;

use App\Models\Award\Award;
use HalcyonLaravel\Base\Repository\BaseRepository;

/**
 * Class AwardRepositoryEloquent
 *
 * @package App\Repositories\Award
 */
class AwardRepositoryEloquent extends BaseRepository implements AwardRepository
{
    /**
     * AwardRepository constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->setObserver(new AwardObserver);
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Award::class;
    }
}
