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
		$institution = $this->institution;

		if ($institution) {

			return $institution->getFirstMediaUrl('featured', 'main');
		}

	}

	public function getCountryAttribute()
	{
		$institution = $this->institution;

		if ($institution) {

			return $institution->country->title;
		}
		
	}

}
