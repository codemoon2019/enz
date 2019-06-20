<?php

namespace App\Models\AreaOfStudy\Traits;
use App\Models\Course\Course;
/**
 * Trait AreaOfStudyRelations
 * @package App\Models\AreaOfStudy\Traits
 */
trait AreaOfStudyRelations
{

	public function courses()
	{
		return $this->hasMany(Course::class);
	}

	public function activeCourses()
	{
		return $this->hasMany(Course::class)->whereStatus('enable')->orderBy('order');
	}

}
