<?php

namespace App\Repositories\Gallery;

use App\Models\Gallery\Gallery;
use HalcyonLaravel\Base\Repository\BaseRepository;

/**
 * Class GalleryRepositoryEloquent
 *
 * @package App\Repositories\Gallery
 */
class GalleryRepositoryEloquent extends BaseRepository implements GalleryRepository
{
    /**
     * GalleryRepository constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->setObserver(new GalleryObserver);
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Gallery::class;
    }
}
