<?php

namespace App\Models\Event;

use Illuminate\Database\Eloquent\Model;

class EventInquiry extends Model
{
	protected $table = 'event_inquiries';

	protected $fillable = ['first_name', 'last_name', 'event_id', 'contact_number'];
}
