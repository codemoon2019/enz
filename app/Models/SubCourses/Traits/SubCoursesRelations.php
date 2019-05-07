<?php

namespace App\Models\SubCourses\Traits;
use App\Models\Course\Course;

/**
 * Trait SubCoursesRelations
 * @package App\Models\SubCourses\Traits
 */
trait SubCoursesRelations
{

	public function parent()
	{
		return $this->belongsTo(Course::class, 'id');
	}

}
