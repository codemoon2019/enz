<?php

namespace App\Http\Controllers\Backend\SuccessPercentage;

use DataTables;
use App\Repositories\SuccessPercentage\SuccessPercentageRepository;
use HalcyonLaravel\Base\Controllers\BaseController;
use HalcyonLaravel\Base\Repository\BaseRepository;
use Illuminate\Http\Request;

/**
 * Class SuccessPercentageTableController
 *
 * @package App\Http\Controllers\Backend\SuccessPercentage
 */
class SuccessPercentageTableController extends BaseController
{
    /**
     * @var \App\Repositories\SuccessPercentage\SuccessPercentageRepository
     */
    protected $successPercentageRepository;

    /**
     * SuccessPercentageTableController constructor.
     *
     * @param \App\Repositories\SuccessPercentage\SuccessPercentageRepository $successPercentageRepository
     *
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function __construct(SuccessPercentageRepository $successPercentageRepository)
    {
        $this->successPercentageRepository = $successPercentageRepository;
        $model = $successPercentageRepository->makeModel();

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
        return $this->successPercentageRepository;
    }
}
