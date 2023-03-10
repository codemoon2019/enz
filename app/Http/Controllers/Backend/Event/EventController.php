<?php

namespace App\Http\Controllers\Backend\Event;

use App\Repositories\Event\EventRepository;
use HalcyonLaravel\Base\BaseableOptions;
use HalcyonLaravel\Base\Controllers\Backend\CRUDController;
use HalcyonLaravel\Base\Repository\BaseRepository;
use Illuminate\Database\Eloquent\Model as IlluminateModel;
use Illuminate\Http\Request;
use Carbon\Carbon;
use MetaTag;


use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

use App\Models\Event\Event;
use App\Exports\EventInquiryExport;
use Session;

/**
 * Class EventController
 *
 * @package App\Http\Controllers\Backend\Event
 */
class EventController extends CRUDController
{
    /**
     * @var \App\Repositories\Event\EventRepository
     */
    protected $eventRepository;

    /**
     * EventController constructor.
     *
     * @param \App\Repositories\Event\EventRepository $eventRepository
     *
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function __construct(EventRepository $eventRepository)
    {
        $this->eventRepository = $eventRepository;
        parent::__construct();

        $model = $eventRepository->makeModel();

        $this->middleware('permission:' . $model::permission('index'), ['only' => ['index']]);
        $this->middleware('permission:' . $model::permission('show'), ['only' => ['show']]);
        $this->middleware('permission:' . $model::permission('create'), ['only' => ['create', 'store']]);
        $this->middleware('permission:' . $model::permission('edit'), ['only' => ['update', 'edit']]);
        $this->middleware('permission:' . $model::permission('destroy'), ['only' => ['destroy']]);
    }

    /**
     * @param \Illuminate\Http\Request                 $request
     * @param \Illuminate\Database\Eloquent\Model|null $model
     *
     * @return array
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function generateStub(Request $request, IlluminateModel $model = null): array
    {

        $data = $request->all();

        if ($data['event_date']) {

            $data['event_date'] = Carbon::create($data['event_date']);

        }

        $data['status'] = $request->status ? 'enable' : 'disabled';

        return $data;

        // $data = [
        //     'meta' => $request->meta,
        // ];

        // $model = $this->repository()->makeModel();

        // $request = $request->only($model->getFillable());

        // if ($request['event_date']) {

        //     $request['event_date'] = Carbon::create($request['event_date']);

        // }

        // return array_merge($request, $data);
    }

    /**
     * @return \HalcyonLaravel\Base\Repository\BaseRepository
     */
    public function repository(): BaseRepository
    {
        return $this->eventRepository;
    }

    /**
     * Validate input on store/update
     *
     * @param \Illuminate\Http\Request                 $request
     * @param \Illuminate\Database\Eloquent\Model|null $model
     *
     * @return \HalcyonLaravel\Base\BaseableOptions
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function crudRules(Request $request, IlluminateModel $model = null): BaseableOptions
    {
        $table = $this->repository()->makeModel()->getTable();

        return BaseableOptions::create()
            ->storeRules([
                'title' => "required|max:255|unique:$table",
                'event_date' => "required",
                'event_time' => "required",
                'event_location' => "required",
                'image' => "required"
            ])
            ->storeRuleMessages([
                'title.required' => 'The title field is required.',
                'image.required' => 'The featured image is required'
            ])
            ->updateRules([
                'title' => "required|max:255|unique:$table,title," . optional($model)->id,
                'event_date' => "required",
                'event_time' => "required",
                'event_location' => "required",
            ])
            ->updateRuleMessages([
                'title.required' => 'The title field is required.',
            ]);
    }

    public function inquiries()
    {
        MetaTag::setTags([
            'title' => $this->getModelName() . ' Management',
        ]);

        $viewPath = $this->viewPath;
        $routePath = $this->routePath;

        return view("backend.event.inquiries", compact('viewPath', 'routePath'));
    }


    public function export($id)
    {

        $event = Event::find($id);

        Session::put('event_id', $id);


        // return $event->title;

        // dd(new EventInquiryExport());

        // dd(collect($event->inquiries->toArray()));

        // return Excel::download(collect($event->inquiries->toArray()),  $event->slug. '.xlsx');

        return Excel::download(new EventInquiryExport(), $event->title.'.xlsx');



    }

}


