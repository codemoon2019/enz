<?php

namespace App\Repositories\AreaOfStudy;

use App\Models\AreaOfStudy\AreaOfStudy;
use HalcyonLaravel\Base\Repository\BaseRepository;

/**
 * Class AreaOfStudyRepositoryEloquent
 *
 * @package App\Repositories\AreaOfStudy
 */
class AreaOfStudyRepositoryEloquent extends BaseRepository implements AreaOfStudyRepository
{
    /**
     * AreaOfStudyRepository constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->setObserver(new AreaOfStudyObserver);
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return AreaOfStudy::class;
    }
}
