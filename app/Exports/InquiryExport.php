<?php

namespace App\Exports;

use App\Models\Core\Inquiry;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class InquiryExport implements FromView
{
    /**
    * @return \Illuminate\Support\FromView
    */
    public function view() : View
    {
        $inquiries = Inquiry::select('full_name', 'profession', 'email_address', 'mobile_number', 'location', 'consultation', 'inquiry', 'country', 'created_at')->get();
        return view('backend.exports.inquiries',['inquiries'=>$inquiries]);
    }
}


