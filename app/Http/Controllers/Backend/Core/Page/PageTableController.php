<?php

namespace App\Http\Controllers\Backend\Core\Page;

use App\Http\Controllers\Controller;
use App\Models\Core\Page\Page as Model;
use App\Repositories\Core\Page\PageRepository as Repository;
use DataTables;
use Illuminate\Http\Request;

/**
 * Class PageTableController.
 */
class PageTableController extends Controller
{
    /**
     * @var Repository
     */
    protected $repo;

    /**
     * PageTableController constructor.
     *
     * @param Repository $repo
     * @param Model      $model
     */
    public function __construct(Repository $repo, Model $model)
    {
        $this->repo = $repo;
        $this->model = $model;
//        $this->middleware('permission:' . implode(',', Model::permission(['index', 'change-status'])));
    }

    /**
     * @param Request $request
     *
     * @return mixed
     * @throws \Exception
     */
    public function __invoke(Request $request)
    {

        return DataTables::of($this->repo->table($request->except(['_token', '_method']))->whereNotIn('slug', [
                'country-details',
                'service',
                'details',
                'city',
                'career',
                'sub-courses',
                'subscription',
                'tourist-visa-inquiry',
                'core-value',
                'application',
                'sample-module',
                'more-life',
                'institution',
                'country',
                'location',
                'why',
                'area-of-study',
            ]))
            ->escapeColumns(['id'])
            ->addColumn('domains', function ($model) {
                return $model->getDomainTitles();
            })
            ->addColumn('url', function ($model) {
                return $model->getUrl();
            })
            ->editColumn('updated_at', function ($model) {
                return $model->updated_at->format(config('core.setting.formats.datetime_12'));
            })
//            ->editColumn('status', function ($model) use ($user) {
//                return [
//                    'value' => $model->status,
//                    'statuses' => $model->statuses(),
//                    'link' => route(Model::ROUTE_ADMIN_PATH . ".status.update", $model),
////                    'can' => $can
//                ];
//            })
            ->addColumn('title', function ($model) {
                return $model->gettrans('title');
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
