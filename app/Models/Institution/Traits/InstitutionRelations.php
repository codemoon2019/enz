<?php

namespace App\Models\Institution\Traits;

use App\Models\Course\Course;

use App\Models\Country\Country;

/**
 * Trait InstitutionRelations
 * @package App\Models\Institution\Traits
 */
trait InstitutionRelations
{

	public function courses()
	{
		return $this->hasMany(Course::class)->orderBy('order');
	}

	public function activeCourses()
	{
		return $this->hasMany(Course::class)->whereStatus('enable')->orderBy('order');
	}

	public function country()
	{
		return $this->belongsTo(Country::class);
	}

}
