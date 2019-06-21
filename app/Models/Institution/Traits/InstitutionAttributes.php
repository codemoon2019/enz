<?php

namespace App\Models\Institution\Traits;

/**
 * Trait InstitutionAttributes
 * @package App\Models\Institution\Traits
 */
trait InstitutionAttributes
{

	public function getLogoAttribute()
	{
		return $this->getFirstMediaUrl('featured');
	}

}
