<?php

namespace App\Models\Event;

use Illuminate\Database\Eloquent\Model;

use App\Models\Event\Event;

class EventInquiry extends Model
{
	protected $table = 'event_inquiries';

	protected $fillable = ['first_name', 'last_name', 'event_id', 'contact_number', 'email_address', 'address', 'profession'];

	protected $appends = ['event_name'];

	public function event()
	{
		return $this->belongsTo(Event::class);
	}

	public function getEventNameAttribute()
	{
		return $this->event->title;
	}



}
