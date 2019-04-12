<?php

namespace App\Http\Controllers\Backend\Core\Menu;

use App\Http\Controllers\Controller;
use App\Repositories\Core\Menu\MenuRepository;
use DataTables;
use Illuminate\Http\Request;

/**
 * Class MenuTableController.
 */
class MenuTableController extends Controller
{
    /**
     * @var \App\Repositories\Core\Menu\MenuRepository
     */
    protected $menuRepository;

    /**
     * MenuTableController constructor.
     *
     * @param \App\Repositories\Core\Menu\MenuRepository $menuRepository
     *
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function __construct(MenuRepository $menuRepository)
    {
        $this->menuRepository = $menuRepository;
        $this->middleware('permission:' .
            implode(',', $menuRepository->makeModel()->permission(['index', 'change-status'])));
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return mixed
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function index(Request $request)
    {
        $user = auth()->user();
        $MODEL = $this->menuRepository->makeModel();
        $can = $user->can($MODEL::permission('change-status'));

//        $this->menuRepository->pushCriteria(new ThisEqualThatCriteria('id', 1));
        return DataTables::of($this->menuRepository->table($request->except(['_token', '_method'])))
            ->escapeColumns(['id'])
            ->editColumn('updated_at', function ($model) {
                return $model->updated_at->format(config('core.setting.formats.datetime_12'));
            })
            ->editColumn('status', function ($model) use ($user, $can, $MODEL) {
                return [
                    'value' => $model->status,
                    'statuses' => $model->statuses(),
                    'link' => route($MODEL::ROUTE_ADMIN_PATH . ".status.update", $model),
                    'can' => $can
                ];
            })
            ->addColumn('actions', function ($model) {
                return $model->actions('backend');
            })
            ->make(true);
    }
}
