<?php

namespace App\Repositories\Why;

use App\Models\Why\Why;
use HalcyonLaravel\Base\Repository\BaseRepository;

/**
 * Class WhyRepositoryEloquent
 *
 * @package App\Repositories\Why
 */
class WhyRepositoryEloquent extends BaseRepository implements WhyRepository
{
    /**
     * WhyRepository constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->setObserver(new WhyObserver);
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Why::class;
    }
}
