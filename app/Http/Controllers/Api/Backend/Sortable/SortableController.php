<?php

namespace App\Http\Controllers\Api\Backend\Sortable;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Models\Core\Menu\MenuNode;

use App\Models\MoreLife\MoreLife;

use App\Models\Course\Course;

use App\Models\Why\Why;

use App\Models\Service\Service;

use App\Models\OurTeam\OurTeam;

use App\Models\Testimonial\Testimonial;

use App\Models\Linkages\Linkages;

use App\Models\CountryDetails\CountryDetails;

use App\Models\StudentVisa\StudentVisa;

use App\Models\CoreValue\CoreValue;

use App\Models\Career\Career;

use App\Models\Institution\Institution;

use App\Models\AreaOfStudy\AreaOfStudy;

use App\Models\Location\Location;

class SortableController extends Controller
{
    public function __invoke(Request $request, $model)
    {
        $data = json_decode($request['serialize']);

        switch ($model) {

            case 'MenuNode': $model       = new MenuNode; break;
            
            case 'MoreLife': $model       = new MoreLife; break;
            
            case 'Course': $model         = new Course; break;
            
            case 'Why': $model            = new Why; break;
            
            case 'Service': $model        = new Service; break;
            
            case 'OurTeam': $model        = new OurTeam; break;
            
            case 'Testimonial': $model    = new Testimonial; break;
            
            case 'Linkages': $model       = new Linkages; break;
            
            case 'CountryDetails': $model = new CountryDetails; break;
            
            case 'StudentVisa': $model = new StudentVisa; break;
            
            case 'CoreValue': $model = new CoreValue; break;
            
            case 'Career': $model = new Career; break;
            
            case 'Institution': $model = new Institution; break;
            
            case 'AreaOfStudy': $model = new AreaOfStudy; break;
            
            case 'Location': $model = new Location; break;

            default: break;
        }
        
        foreach ($data as $key => $value) {

            $this->childrenExist($value, $model);
            
	        $model->whereId($value->id)->first()->update(['parent_id' => null, 'order' => $key]);
          
        }
    }

    public function childrenExist($value, $model)
    {
        if (isset($value->children)) {

            foreach ($value->children as $key1 => $value1) {

                $this->childrenExist($value1, $model);

                $model->whereId($value1->id)->first()->update(['parent_id' => $value->id, 'order' => $key1]);
            
            }

        }
    }

}
