<?php

namespace App\Models\Country\Traits;

/**
 * Trait CountryAttributes
 * @package App\Models\Country\Traits
 */
trait CountryAttributes
{

	public function getCapitalIconAttribute()
	{
		if ($this->capital_file == null) {

			switch ($this->title) {
				
				case 'Australia': return asset('/svg/destination/australia/map.svg'); break;
				
				case 'Canada': return asset('/svg/destination/canada/map.svg'); break;
				
				case 'New Zealand': return asset('/svg/destination/new-zealand/map.svg'); break;
				
				default:

			}

		}

		return asset('uploads/country/' . $this->capital_file);

	}

	public function getFoundedIconAttribute()
	{
		if ($this->founded_file == null) {

			switch ($this->title) {
				
				case 'Australia': return asset('/svg/destination/australia/flag.svg'); break;
				
				case 'Canada': return asset('/svg/destination/canada/flag.svg'); break;
				
				case 'New Zealand': return asset('/svg/destination/new-zealand/flag.svg'); break;
				
				default:

			}

		}

		return asset('uploads/country/' . $this->founded_file);

	}

	public function getAreaIconAttribute()
	{
		if ($this->area_file == null) {

			switch ($this->title) {
				
				case 'Australia': return asset('/svg/destination/australia/australia.svg'); break;
				
				case 'Canada': return asset('/svg/destination/canada/canada.svg'); break;
				
				case 'New Zealand': return asset('/svg/destination/new-zealand/new-zealand.svg'); break;
				
				default:

			}

		}

		return asset('uploads/country/' . $this->area_file);

	}

	public function getPopulationIconAttribute()
	{
		if ($this->population_file == null) {

			switch ($this->title) {
				
				case 'Australia': return asset('/svg/destination/australia/population.svg'); break;
				
				case 'Canada': return asset('/svg/destination/canada/population.svg'); break;
				
				case 'New Zealand': return asset('/svg/destination/new-zealand/population.svg'); break;
				
				default:

			}

		}

		return asset('uploads/country/' . $this->population_file);

	}

}
