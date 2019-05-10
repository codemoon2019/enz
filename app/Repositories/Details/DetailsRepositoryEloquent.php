<?php

namespace App\Repositories\Details;

use App\Models\Details\Details;
use HalcyonLaravel\Base\Repository\BaseRepository;

/**
 * Class DetailsRepositoryEloquent
 *
 * @package App\Repositories\Details
 */
class DetailsRepositoryEloquent extends BaseRepository implements DetailsRepository
{
    /**
     * DetailsRepository constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->setObserver(new DetailsObserver);
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Details::class;
    }
}
