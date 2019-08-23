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

use App\Models\Testimonial\Testimonial;

use App\Models\Why\Why;

use App\Models\Institution\Institution;

use App\Models\Career\Career;

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
            
            case 'Testimonial': $model = new Testimonial; break;
            
            case 'Why': $model = new Why; break;

            case 'Career': $model = new Career; break;

            case 'Institution': $model = new Institution; 
                $institution = $model::find($id);
                foreach($institution->courses as $course){
                    $course->update(['status'=> $request['status']]);
                }
            break;

            default: break;
        }

        $model::find($id)->update(['status' => $request['status']]);
    }

    public function featured(Request $request, $model, $id)
    {
        switch ($model) {

            case 'SampleModule': $model = new SampleModule; break;

            case 'News': $model = new News; break;

            default: break;
        }

        $model::find($id)->update(['featured' => $request['status']]);
    }

    public function migration(Request $request, $model, $id)
    {
        switch ($model) {

            case 'SampleModule': $model = new SampleModule; break;

            case 'News': $model = new News; break;

            default: break;
        }

        $model::find($id)->update(['migration' => $request['status']]);
    }

}
