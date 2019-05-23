<?php

namespace App\Models\BecomeOurClientInquiry\Traits;
use App\Models\BecomeOurClientInquiry\ClientOtherDetails;

/**
 * Trait BecomeOurClientInquiryRelations
 * @package App\Models\BecomeOurClientInquiry\Traits
 */
trait BecomeOurClientInquiryRelations
{

	public function otherDetails()
	{
		return $this->hasOne(ClientOtherDetails::class);
	}

}
