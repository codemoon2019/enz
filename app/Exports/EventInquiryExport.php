<?php

namespace App\Exports;

use App\Models\Application\Application;

use Maatwebsite\Excel\Concerns\FromCollection;

use App\Models\Event\Event;

use DB;

use Session;


class EventInquiryExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {

    	$event = Event::find(Session::get('event_id'));


    	$data = [];

    	$data[0]['first_name'] = 'Firstname';
    	$data[0]['last_name'] = 'Lastname';
    	$data[0]['contact_number'] = 'Contact Number';
    	$data[0]['email_address'] = 'Email';
    	$data[0]['address'] = 'Address';
    	$data[0]['profession'] = 'Profession';

    	foreach ($event->inquiries as $key => $inquiry) {
    	
		    $data[$key+1]['first_name'] = $inquiry->first_name ;
	    	$data[$key+1]['last_name'] = $inquiry->last_name ;
	    	$data[$key+1]['contact_number'] = $inquiry->contact_number  ;
	    	$data[$key+1]['email_address'] = $inquiry->email_address ;
	    	$data[$key+1]['address'] = $inquiry->address ;
	    	$data[$key+1]['profession'] = $inquiry->profession ;

    	}

    	return collect($data);

    }
}


