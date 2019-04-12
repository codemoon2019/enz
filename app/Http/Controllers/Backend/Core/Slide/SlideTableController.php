<?php

namespace App\Http\Controllers\Backend\Core\Slide;

use App\Http\Controllers\Controller;
use App\Repositories\Core\Slide\SlideRepository;
use DataTables;
use Illuminate\Http\Request;

/**
 * Class SlideTableController.
 */
class SlideTableController extends Controller
{
    /**
     * @var
     */
    protected $slideRepository;

    /**
     * SlideTableController constructor.
     *
     * @param \App\Repositories\Core\Slide\SlideRepository $slideRepository
     *
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function __construct(SlideRepository $slideRepository)
    {
        $this->slideRepository = $slideRepository;
        $this->middleware('permission:' . implode(',',
                $slideRepository->makeModel()::permission(['index', 'change-status'])));
    }

    /**
     * @param Request $request
     *
     * @return mixed
     * @throws \Exception
     */
    public function __invoke(Request $request)
    {
        $user = auth()->user();
        $m = $this->slideRepository->model();
        $model = new $m;
        $can = $user->can($model::permission('change-status'));
        return DataTables::of($this->slideRepository->table($request->except(['_token', '_method'])))
            ->escapeColumns(['id'])
            ->editColumn('updated_at', function ($model) {
                return $model->updated_at->format(config('core.setting.formats.datetime_12'));
            })

            ->addColumn('actions', function ($model) {
                if ($model->type) {
                    return $model->actions('backend', ['show', 'edit']);
                }
                return $model->actions('backend');
            })
            ->make(true);
    }
}
