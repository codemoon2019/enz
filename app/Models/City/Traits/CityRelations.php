<?php

namespace App\Models\City\Traits;
use App\Models\Country\Country;

/**
 * Trait CityRelations
 * @package App\Models\City\Traits
 */
trait CityRelations
{

	public function country()
	{
		return $this->belongsTo(Country::class);
	}

}
