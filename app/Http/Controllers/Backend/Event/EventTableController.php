<?php

namespace App\Http\Controllers\Backend\Event;

use DataTables;
use App\Repositories\Event\EventRepository;
use HalcyonLaravel\Base\Controllers\BaseController;
use HalcyonLaravel\Base\Repository\BaseRepository;
use Illuminate\Http\Request;

/**
 * Class EventTableController
 *
 * @package App\Http\Controllers\Backend\Event
 */
class EventTableController extends BaseController
{
    /**
     * @var \App\Repositories\Event\EventRepository
     */
    protected $eventRepository;

    /**
     * EventTableController constructor.
     *
     * @param \App\Repositories\Event\EventRepository $eventRepository
     *
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function __construct(EventRepository $eventRepository)
    {
        $this->eventRepository = $eventRepository;
        $model = $eventRepository->makeModel();

        $this->middleware('permission:' . $model::permission('index'), ['only' => ['__invoke']]);
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return mixed
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function __invoke(Request $request)
    {
        return DataTables::of($this->repository()->table())
            ->rawColumns(['status'])
            ->editColumn('status', function ($model) {
                return $model->status_action;
            })
            ->editColumn('event_date', function ($model) {
                return $model->event_date->format('F d, Y') . ' - ' . $model->event_time;
            })
            ->addColumn('actions', function ($model) {
                return $model->actions('backend', ['show', 'edit', 'destroy']);
            })
            ->make(true);
    }

    /**
     * @return BaseRepository
     */
    public function repository(): BaseRepository
    {
        return $this->eventRepository;
    }
}
