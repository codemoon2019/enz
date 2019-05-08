<?php

namespace App\Models\Linkages\Traits;

use App\Models\Country\Country;

/**
 * Trait LinkagesRelations
 * @package App\Models\Linkages\Traits
 */
trait LinkagesRelations
{

	public function country()
	{
		return $this->belongsTo(Country::class);
	}


}
