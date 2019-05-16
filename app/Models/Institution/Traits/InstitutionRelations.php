<?php

namespace App\Models\Institution\Traits;
use App\Models\Course\Course;

/**
 * Trait InstitutionRelations
 * @package App\Models\Institution\Traits
 */
trait InstitutionRelations
{

	public function courses()
	{
		return $this->hasMany(Course::class);
	}

}
