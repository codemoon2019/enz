<?php

namespace App\Exports;

use App\Models\Core\Inquiry;

use Maatwebsite\Excel\Concerns\FromCollection;

class InquiryExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Inquiry::select('full_name', 'profession', 'email_address', 'mobile_number', 'location', 'consultation', 'inquiry', 'country', 'created_at')->get();
    }
}


