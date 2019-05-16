<?php

namespace App\Models\Course\Traits;

use App\Models\SubCourses\SubCourses;
use App\Models\Institution\Institution;

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

	public function institution()
	{
		return $this->belongsTo(Institution::class);
	}

}
