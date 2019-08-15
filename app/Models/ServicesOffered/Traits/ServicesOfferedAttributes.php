<?php

namespace App\Models\ServicesOffered\Traits;

/**
 * Trait ServicesOfferedAttributes
 * @package App\Models\ServicesOffered\Traits
 */
trait ServicesOfferedAttributes
{
	public function getFeaturedIconAttribute()
	{
		return asset('uploads/services/' . $this->file);
	}
}
