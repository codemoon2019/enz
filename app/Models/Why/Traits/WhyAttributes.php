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
				
				case 'Linkages': return file_get_contents(asset('img/why/linkages.svg')); break;
				
				case 'Awards': return file_get_contents(asset('img/why/awards.svg')); break;
				
				case 'Expertise': return file_get_contents(asset('img/why/expertise.svg')); break;
				
				case 'Customer Service': return file_get_contents(asset('img/why/customer-service.svg')); break;
				
				case 'Payment Scheme': return file_get_contents(asset('img/why/payment-scheme.svg')); break;
				
				default:

			}

		}

		return file_get_contents(asset('uploads/why/' . $this->file));

	}
}
