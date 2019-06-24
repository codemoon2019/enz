<?php

namespace App\Http\Controllers\Backend\Application;

use DataTables;
use App\Repositories\Application\ApplicationRepository;
use HalcyonLaravel\Base\Controllers\BaseController;
use HalcyonLaravel\Base\Repository\BaseRepository;
use Illuminate\Http\Request;

/**
 * Class ApplicationTableController
 *
 * @package App\Http\Controllers\Backend\Application
 */
class ApplicationTableController extends BaseController
{
    /**
     * @var \App\Repositories\Application\ApplicationRepository
     */
    protected $applicationRepository;

    /**
     * ApplicationTableController constructor.
     *
     * @param \App\Repositories\Application\ApplicationRepository $applicationRepository
     *
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function __construct(ApplicationRepository $applicationRepository)
    {
        $this->applicationRepository = $applicationRepository;
        $model = $applicationRepository->makeModel();

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
            ->escapeColumns(['id'])
            ->addColumn('position', function ($model) {
                return $model->career->title;
            })
            ->editColumn('updated_at', function ($model) {
                return $model->updated_at->timezone(get_user_timezone())->format(config('core.setting.formats.datetime_12'));
            })
            ->addColumn('actions', function ($model) {
                return $model->action_buttons;
            })
            ->make(true);
    }

    /**
     * @return BaseRepository
     */
    public function repository(): BaseRepository
    {
        return $this->applicationRepository;
    }
}
