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
        return Inquiry::all();
    }
}
