<?php

namespace App\Http\Controllers\Backend\Event;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;
use App\Models\Event\EventInquiry;

class EventInquiriesTableController extends Controller
{

	public function __invoke(Request $request)
	{

		$model = EventInquiry::all();

        return DataTables::of($model)
        ->addColumn('event_name', function($model){
        	return $model->event->title;
        })
        ->editColumn('created_at', function($model){
        	return $model->created_at->format('F d, Y h:i a');
        })
        ->make(true);

	}

}
