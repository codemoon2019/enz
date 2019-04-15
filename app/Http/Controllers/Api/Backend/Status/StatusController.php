<?php

namespace App\Http\Controllers\Api\Backend\Status;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Models\SampleModule\SampleModule;

use App\Models\Course\Course;

use App\Models\Event\Event;

use App\Models\News\News;

use App\Models\Service\Service;

use App\Models\OurTeam\OurTeam;

class StatusController extends Controller
{
    public function status(Request $request, $model, $id)
    {
        switch ($model) {

            case 'SampleModule': $model = new SampleModule; break;

            case 'Course': $model = new Course; break;

            case 'Event': $model = new Event; break;
            
            case 'News': $model = new News; break;
            
            case 'Service': $model = new Service; break;
            
            case 'OurTeam': $model = new OurTeam; break;

            default: break;
        }

        $model::find($id)->update(['status' => $request['status']]);
    }

    public function featured(Request $request, $model, $id)
    {
        switch ($model) {

            case 'SampleModule': $model = new SampleModule; break;

            default: break;
        }

        $model::find($id)->update(['featured' => $request['status']]);
    }
}
