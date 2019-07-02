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
        return TouristVisaInquiry::all();
    }
}
