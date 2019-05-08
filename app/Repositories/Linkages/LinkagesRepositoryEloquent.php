<?php

namespace App\Repositories\Linkages;

use App\Models\Linkages\Linkages;
use HalcyonLaravel\Base\Repository\BaseRepository;

/**
 * Class LinkagesRepositoryEloquent
 *
 * @package App\Repositories\Linkages
 */
class LinkagesRepositoryEloquent extends BaseRepository implements LinkagesRepository
{
    /**
     * LinkagesRepository constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->setObserver(new LinkagesObserver);
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Linkages::class;
    }
}
