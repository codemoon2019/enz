<?php

namespace App\Models\Why\Traits;

/**
 * Trait WhyAttributes
 * @package App\Models\Why\Traits
 */
trait WhyAttributes
{

	public function getFeaturedIconAttribute()
	{
		if ($this->file == null) {

			switch ($this->title) {
				
				case 'Linkages': return asset('img/why/linkages.svg'); break;
				
				case 'Awards': return asset('img/why/awards.svg'); break;
				
				case 'Expertise': return asset('img/why/expertise.svg'); break;
				
				case 'Customer Service': return asset('img/why/customer-service.svg'); break;
				
				case 'Payment Scheme': return asset('img/why/payment-scheme.svg'); break;
				
				default:

			}

		}

		return asset('uploads/why/' . $this->file);

	}
}
