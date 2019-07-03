<?php

namespace App\Exports;

use App\Models\BecomeOurClientInquiry\BecomeOurClientInquiry;

use Maatwebsite\Excel\Concerns\FromCollection;

use DB;

class BecomeOurClientInquiryExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {

       	$data = DB::table('become_our_client_inquiries')
       				->join('client_other_details', 'client_other_details.become_our_client_inquiry_id', '=', 'become_our_client_inquiries.id')
       				->select(
       					'first_name',
       					'last_name',
       					'middle_name',
       					'date_of_birth',
       					'country_birth',
       					'passport_number',
       					'citizenship',
       					'civil_status',
       					'gender',
       					'expiry_date',
       					'street_number',
       					'street_name',
       					'town',
       					'province',
       					'zip_code',
       					'email',
       					'mobile_number',
       					'telephone_number',
       					'country',
       					'elementary_school',
       					'elementary_from',
       					'elementary_to',
       					'high_school_school',
       					'high_school_from',
       					'high_school_to',
       					'tertiary_school',
       					'tertiary_from',
       					'tertiary_to',
       					'interview',
       					'employment_status',
       					'employment_status_name',
       					'employment_status_from',
       					'employment_status_to',
       					'english_test_result',
       					'score',
       					'avail',
       					'become_our_client_inquiries.updated_at'
       				)
       				->get();

       	return $data;

       	// dd($data);



    }
}

