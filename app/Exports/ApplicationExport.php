<?php

namespace App\Exports;

use App\Models\Application\Application;

use Maatwebsite\Excel\Concerns\FromCollection;

use DB;

class ApplicationExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {

    	$data = DB::table('applications')->join('careers', 'careers.id', '=', 'applications.career_id')->select('applications.full_name', 'careers.title', 'applications.mobile_number', 'applications.address', 'applications.email_address', 'applications.employment_status', 'applications.message', 'applications.updated_at')->get();

    	return $data;

    }
}
