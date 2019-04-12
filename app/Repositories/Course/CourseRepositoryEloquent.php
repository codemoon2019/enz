<?php

namespace App\Repositories\Course;

use App\Models\Course\Course;
use HalcyonLaravel\Base\Repository\BaseRepository;

/**
 * Class CourseRepositoryEloquent
 *
 * @package App\Repositories\Course
 */
class CourseRepositoryEloquent extends BaseRepository implements CourseRepository
{
    /**
     * CourseRepository constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->setObserver(new CourseObserver);
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Course::class;
    }
}
