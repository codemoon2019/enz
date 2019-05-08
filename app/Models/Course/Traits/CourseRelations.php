<?php

namespace App\Models\Course\Traits;

use App\Models\SubCourses\SubCourses;

/**
 * Trait CourseRelations
 * @package App\Models\Course\Traits
 */
trait CourseRelations
{

	public function subCourses()
	{
		return $this->hasMany(SubCourses::class);
	}

}
