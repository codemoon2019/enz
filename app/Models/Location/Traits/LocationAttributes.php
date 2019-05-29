<?php

namespace App\Models\Location\Traits;

/**
 * Trait LocationAttributes
 * @package App\Models\Location\Traits
 */
trait LocationAttributes
{

	public function getContactsAttribute()
	{

		$contact = explode('</p>', $this->contact);

		$contact = str_replace('<p>', '', $contact);

		// dd($contact, array_pop($contact));

		return $contact;

	}

}
