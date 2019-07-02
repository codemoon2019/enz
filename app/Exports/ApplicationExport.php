<?php

namespace App\Exports;

use App\Models\Application\Application;

use Maatwebsite\Excel\Concerns\FromCollection;

class ApplicationExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Application::all();
    }
}
