<?php

namespace App\Exports;

use App\Models\BecomeOurClientInquiry\BecomeOurClientInquiry;

use Maatwebsite\Excel\Concerns\FromCollection;

class BecomeOurClientInquiryExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return BecomeOurClientInquiry::all();
    }
}
