<?php

namespace App\Models\Country\Traits;

use App\Models\Linkages\Linkages;
use App\Models\CountryDetails\CountryDetails;
use App\Models\Institution\Institution;

/**
 * Trait CountryRelations
 * @package App\Models\Country\Traits
 */
trait CountryRelations
{

	public function linkages()
	{
		return  $this->hasMany(Linkages::class)->orderBy('order');
	}

	public function details()
	{
		return  $this->hasMany(CountryDetails::class)->orderBy('order');
	}

	public function institutions()
	{
		return  $this->hasMany(Institution::class)->orderBy('order');
	}

}
