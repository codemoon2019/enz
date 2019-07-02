<?php

namespace App\Repositories\SuccessPercentage;

use App\Models\SuccessPercentage\SuccessPercentage;
use HalcyonLaravel\Base\Repository\BaseRepository;

/**
 * Class SuccessPercentageRepositoryEloquent
 *
 * @package App\Repositories\SuccessPercentage
 */
class SuccessPercentageRepositoryEloquent extends BaseRepository implements SuccessPercentageRepository
{
    /**
     * SuccessPercentageRepository constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->setObserver(new SuccessPercentageObserver);
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return SuccessPercentage::class;
    }
}
