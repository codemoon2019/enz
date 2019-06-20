<?php

namespace App\Models\Course\Traits;

/**
 * Trait CourseAttributes
 * @package App\Models\Course\Traits
 */
trait CourseAttributes
{

	public function getInstitutionLogoAttribute()
	{
		return $this->institution->getFirstMediaUrl('featured');
	}

	public function getCountryAttribute()
	{
		return $this->institution->country->title;
	}

}
