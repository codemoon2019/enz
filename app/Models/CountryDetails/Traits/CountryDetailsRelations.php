<?php

namespace App\Models\CountryDetails\Traits;

use App\Models\Country\Country;

/**
 * Trait CountryDetailsRelations
 * @package App\Models\CountryDetails\Traits
 */
trait CountryDetailsRelations
{

	public function country()
	{
		return $this->belongsTo(Country::class);
	}
	
}
