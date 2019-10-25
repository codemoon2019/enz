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


        $details = BecomeOurClientInquiry::with('otherDetails')->get();

        $data = [];
        
        $data[0]['first_name'] = 'Firstname';
        $data[0]['last_name'] = 'Lastname';
        $data[0]['middle_name'] = 'Middlename';
        $data[0]['date_of_birth'] = 'Date of Birth';
        $data[0]['country_birth'] = 'Contry Birth';
        $data[0]['passport_number'] = 'Passport Number';
        $data[0]['citizenship'] = 'Citizenship';
        $data[0]['civil_status'] = 'Civil Status';
        $data[0]['gender'] = 'Gender';
        $data[0]['expiry_date'] = 'Expiry Date';
        $data[0]['street_number'] = 'Street Number';
        $data[0]['street_name'] = 'Street Name';
        $data[0]['town'] = 'Town';
        $data[0]['province'] = 'Province';
        $data[0]['zip_code'] = 'Zip Code';
        $data[0]['email'] = 'Email';
        $data[0]['mobile_number'] = 'Mobile Number';
        $data[0]['telephone_number'] = 'Telepnone Number';
        $data[0]['country'] = 'Country';
        $data[0]['elementary_school'] = 'Elementary School';
        $data[0]['elementary_from'] = 'Elementary From';
        $data[0]['elementary_to'] = 'Elementary To';
        $data[0]['high_school_school'] = 'High School';
        $data[0]['high_school_from'] = 'High School From';
        $data[0]['high_school_to'] = 'High School To';
        $data[0]['tertiary_school'] = 'Tertiary School';
        $data[0]['tertiary_from'] = 'Tertiary From';
        $data[0]['tertiary_to'] = 'Tertiary To';
        $data[0]['interview'] = 'Interview';
        $data[0]['employment_status'] = 'Employment Status';
        $data[0]['employment_status_name'] = 'Employment Status Name';
        $data[0]['employment_status_from'] = 'Employment Status From';
        $data[0]['employment_status_to'] = 'Employment Status To';
        $data[0]['english_test_result'] = 'English Test Result';
        $data[0]['score'] = 'Score';
        $data[0]['updated_at'] = 'Updated At';



        foreach ($details as $key => $detail) {

          $data[$key+1]['first_name'] = $detail->first_name;
          $data[$key+1]['last_name'] = $detail->last_name;
          $data[$key+1]['middle_name'] = $detail->middle_name;
          $data[$key+1]['date_of_birth'] = $detail->date_of_birth;
          $data[$key+1]['country_birth'] = $detail->country_birth;
          $data[$key+1]['passport_number'] = $detail->passport_number;
          $data[$key+1]['citizenship'] = $detail->citizenship;
          $data[$key+1]['civil_status'] = $detail->civil_status;
          $data[$key+1]['gender'] = $detail->gender;
          $data[$key+1]['expiry_date'] = $detail->expiry_date;
          $data[$key+1]['street_number'] = $detail->street_number;
          $data[$key+1]['street_name'] = $detail->street_name;
          $data[$key+1]['town'] = $detail->town;
          $data[$key+1]['province'] = $detail->province;
          $data[$key+1]['zip_code'] = $detail->zip_code;
          $data[$key+1]['email'] = $detail->email;
          $data[$key+1]['mobile_number'] = $detail->mobile_number;
          $data[$key+1]['telephone_number'] = $detail->telephone_number;
          $data[$key+1]['country'] = $detail->country;
          $data[$key+1]['elementary_school'] = $detail->otherDetails->elementary_school;
          $data[$key+1]['elementary_from'] = $detail->otherDetails->elementary_from;
          $data[$key+1]['elementary_to'] = $detail->otherDetails->elementary_to;
          $data[$key+1]['high_school_school'] = $detail->otherDetails->high_school_school;
          $data[$key+1]['high_school_from'] = $detail->otherDetails->high_school_from;
          $data[$key+1]['high_school_to'] = $detail->otherDetails->high_school_to;
          $data[$key+1]['tertiary_school'] = $detail->otherDetails->tertiary_school;
          $data[$key+1]['tertiary_from'] = $detail->otherDetails->tertiary_from;
          $data[$key+1]['tertiary_to'] = $detail->otherDetails->tertiary_to;
          $data[$key+1]['interview'] = $detail->otherDetails->interview;
          $data[$key+1]['employment_status'] = $detail->otherDetails->employment_status;
          $data[$key+1]['employment_status_name'] = $detail->otherDetails->employment_status_name;
          $data[$key+1]['employment_status_from'] = $detail->otherDetails->employment_status_from;
          $data[$key+1]['employment_status_to'] = $detail->otherDetails->employment_status_to;
          $data[$key+1]['english_test_result'] = $detail->otherDetails->english_test_result;
          $data[$key+1]['score'] = $detail->otherDetails->score;
          $data[$key+1]['updated_at'] = $detail->otherDetails->updated_at;
        }

        return collect($data);


        // dd($data);


       	// $data = DB::table('become_our_client_inquiries')
       	// 			->join('client_other_details', 'client_other_details.become_our_client_inquiry_id', '=', 'become_our_client_inquiries.id')
       	// 			->select(
       	// 				'first_name',
       	// 				'last_name',
       	// 				'middle_name',
       	// 				'date_of_birth',
       	// 				'country_birth',
       	// 				'passport_number',
       	// 				'citizenship',
       	// 				'civil_status',
       	// 				'gender',
       	// 				'expiry_date',
       	// 				'street_number',
       	// 				'street_name',
       	// 				'town',
       	// 				'province',
       	// 				'zip_code',
       	// 				'email',
       	// 				'mobile_number',
       	// 				'telephone_number',
       	// 				'country',
       	// 				'elementary_school',
       	// 				'elementary_from',
       	// 				'elementary_to',
       	// 				'high_school_school',
       	// 				'high_school_from',
       	// 				'high_school_to',
       	// 				'tertiary_school',
       	// 				'tertiary_from',
       	// 				'tertiary_to',
       	// 				'interview',
       	// 				'employment_status',
       	// 				'employment_status_name',
       	// 				'employment_status_from',
       	// 				'employment_status_to',
       	// 				'english_test_result',
       	// 				'score',
       	// 				'avail',
       	// 				'become_our_client_inquiries.updated_at'
       	// 			)
       	// 			->get();

       	return $data;

       	// dd($data);



    }
}

