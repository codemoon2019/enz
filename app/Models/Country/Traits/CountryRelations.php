<?php

namespace App\Models\Country\Traits;

use App\Models\Linkages\Linkages;

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

}
