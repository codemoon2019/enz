<?php

namespace App\Http\Controllers\Backend\News;

use DataTables;
use App\Repositories\News\NewsRepository;
use HalcyonLaravel\Base\Controllers\BaseController;
use HalcyonLaravel\Base\Repository\BaseRepository;
use Illuminate\Http\Request;

/**
 * Class NewsTableController
 *
 * @package App\Http\Controllers\Backend\News
 */
class NewsTableController extends BaseController
{
    /**
     * @var \App\Repositories\News\NewsRepository
     */
    protected $newsRepository;

    /**
     * NewsTableController constructor.
     *
     * @param \App\Repositories\News\NewsRepository $newsRepository
     *
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function __construct(NewsRepository $newsRepository)
    {
        $this->newsRepository = $newsRepository;
        $model = $newsRepository->makeModel();

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
            ->editColumn('updated_at', function ($model) {
                return $model->updated_at->timezone(get_user_timezone())->format(config('core.setting.formats.datetime_12'));
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
        return $this->newsRepository;
    }
}
