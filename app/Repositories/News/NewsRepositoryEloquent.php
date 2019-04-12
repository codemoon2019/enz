<?php

namespace App\Repositories\News;

use App\Models\News\News;
use HalcyonLaravel\Base\Repository\BaseRepository;

/**
 * Class NewsRepositoryEloquent
 *
 * @package App\Repositories\News
 */
class NewsRepositoryEloquent extends BaseRepository implements NewsRepository
{
    /**
     * NewsRepository constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->setObserver(new NewsObserver);
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return News::class;
    }
}
