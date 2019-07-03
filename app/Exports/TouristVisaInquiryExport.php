<?php

namespace App\Exports;

use App\Models\TouristVisaInquiry\TouristVisaInquiry;

use Maatwebsite\Excel\Concerns\FromCollection;

class TouristVisaInquiryExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return TouristVisaInquiry::select('first_name', 'last_name', 'email_address', 'mobile_number', 'country_to_visit', 'inquiry', 'created_at')->get();
    }
}
