<?php

namespace App\Models\BecomeOurClientInquiry;

use Illuminate\Database\Eloquent\Model;

class ClientOtherDetails extends Model
{
    
	protected $table = 'client_other_details';

	protected $fillable = [
		'elementary_school',
		'elementary_from',
		'elementary_to',
		'high_school_school',
		'high_school_from',
		'high_school_to',
		'tertiary_school',
		'tertiary_from',
		'tertiary_to',
		'employment_status',
		'employment_status_name',
		'employment_status_from',
		'employment_status_to',
		'interview',
		'english_test_result',
		'score',
		'avail',
	];
}
