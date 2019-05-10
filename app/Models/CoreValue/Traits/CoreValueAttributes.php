<?php

namespace App\Models\CoreValue\Traits;

/**
 * Trait CoreValueAttributes
 * @package App\Models\CoreValue\Traits
 */
trait CoreValueAttributes
{
	public function getFeaturedIconAttribute()
	{
		if ($this->file == null) {

			switch ($this->title) {
				
				case 'Integrity': return asset('img/core_values/linkages.svg'); break;
				
				case 'Teamwork': return asset('img/core_values/awards.svg'); break;
				
				case 'Honesty': return asset('img/core_values/expertise.svg'); break;
				
				default:

			}

		}

		return asset('uploads/core_values/' . $this->file);

	}
}
