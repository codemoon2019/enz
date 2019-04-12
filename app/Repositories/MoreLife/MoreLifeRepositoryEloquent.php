<?php

namespace App\Repositories\MoreLife;

use App\Models\MoreLife\MoreLife;
use HalcyonLaravel\Base\Repository\BaseRepository;

/**
 * Class MoreLifeRepositoryEloquent
 *
 * @package App\Repositories\MoreLife
 */
class MoreLifeRepositoryEloquent extends BaseRepository implements MoreLifeRepository
{
    /**
     * MoreLifeRepository constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->setObserver(new MoreLifeObserver);
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return MoreLife::class;
    }
}
