<?php

namespace App\Models\Event;

use Illuminate\Database\Eloquent\Model;

use App\Models\Event\Event;

class EventInquiry extends Model
{
	protected $table = 'event_inquiries';

	protected $fillable = ['first_name', 'last_name', 'event_id', 'contact_number', 'email_address', 'address', 'profession'];

	protected $appends = ['event_name', 'date', 'time', 'location'];

	public function event()
	{
		return $this->belongsTo(Event::class);
	}

	public function getEventNameAttribute()
	{
		return $this->event->title;
	}

	public function getDateAttribute()
	{
		return $this->event->event_date->format('F d, Y');
	}

	public function getTimeAttribute()
	{
		return $this->event->event_time;
	}

	public function getLocationAttribute()
	{
		return $this->event->event_location;
	}



}
