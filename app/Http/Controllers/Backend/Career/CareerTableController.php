<?php

namespace App\Http\Controllers\Backend\Career;

use DataTables;
use App\Repositories\Career\CareerRepository;
use HalcyonLaravel\Base\Controllers\BaseController;
use HalcyonLaravel\Base\Repository\BaseRepository;
use Illuminate\Http\Request;

/**
 * Class CareerTableController
 *
 * @package App\Http\Controllers\Backend\Career
 */
class CareerTableController extends BaseController
{
    /**
     * @var \App\Repositories\Career\CareerRepository
     */
    protected $careerRepository;

    /**
     * CareerTableController constructor.
     *
     * @param \App\Repositories\Career\CareerRepository $careerRepository
     *
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function __construct(CareerRepository $careerRepository)
    {
        $this->careerRepository = $careerRepository;
        $model = $careerRepository->makeModel();

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
        return $this->careerRepository;
    }
}
