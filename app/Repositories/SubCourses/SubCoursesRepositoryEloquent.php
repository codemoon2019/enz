<?php

namespace App\Repositories\SubCourses;

use App\Models\SubCourses\SubCourses;
use HalcyonLaravel\Base\Repository\BaseRepository;

/**
 * Class SubCoursesRepositoryEloquent
 *
 * @package App\Repositories\SubCourses
 */
class SubCoursesRepositoryEloquent extends BaseRepository implements SubCoursesRepository
{
    /**
     * SubCoursesRepository constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->setObserver(new SubCoursesObserver);
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return SubCourses::class;
    }
}
