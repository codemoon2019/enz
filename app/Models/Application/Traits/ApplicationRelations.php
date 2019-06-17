<?php

namespace App\Models\Application\Traits;

use App\Models\Career\Career;
/**
 * Trait ApplicationRelations
 * @package App\Models\Application\Traits
 */
trait ApplicationRelations
{

	public function career()
	{
		return $this->belongsTo(Career::class);
	}

}
