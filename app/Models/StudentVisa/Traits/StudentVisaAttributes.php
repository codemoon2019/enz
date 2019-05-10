<?php

namespace App\Models\StudentVisa\Traits;

/**
 * Trait StudentVisaAttributes
 * @package App\Models\StudentVisa\Traits
 */
trait StudentVisaAttributes
{
	public function getFeaturedIconAttribute()
	{
		if ($this->file == null) {

			switch ($this->title) {
				
				case 'Orientation': return asset('img/student_visa/Orientation.svg'); break;
				
				case 'Consultation': return asset('img/student_visa/Consultation.svg'); break;
				
				case 'Assesment': return asset('img/student_visa/Assesment.svg'); break;
				
				case 'Admissions': return asset('img/student_visa/Admissions.svg'); break;
				
				case 'Enrollment': return asset('img/student_visa/Enrollment.svg'); break;

				case 'Visa Application': return asset('img/student_visa/Visa-Application.svg'); break;
				
				default:

			}

		}

		return asset('uploads/student_visa/' . $this->file);

	}
}
