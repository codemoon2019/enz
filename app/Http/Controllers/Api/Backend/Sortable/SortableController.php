<?php

namespace App\Http\Controllers\Api\Backend\Sortable;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Models\Core\Menu\MenuNode;

use App\Models\MoreLife\MoreLife;

use App\Models\Course\Course;

class SortableController extends Controller
{
    public function __invoke(Request $request, $model)
    {
        $data = json_decode($request['serialize']);

        switch ($model) {

            case 'MenuNode': $model = new MenuNode; break;

            case 'MoreLife': $model   = new MoreLife; break;

            case 'Course': $model   = new Course; break;

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
