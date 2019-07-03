<?php

namespace App\Exports;

use App\Models\Subscription\Subscription;

use Maatwebsite\Excel\Concerns\FromCollection;

class CourseInquiryExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Subscription::select('full_name', 'profession', 'email_address', 'mobile_number', 'location', 'message', 'school', 'course', 'created_at')->get();
    }
}
