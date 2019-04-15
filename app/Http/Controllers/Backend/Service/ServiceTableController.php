<?php

namespace App\Http\Controllers\Backend\Service;

use DataTables;
use App\Repositories\Service\ServiceRepository;
use HalcyonLaravel\Base\Controllers\BaseController;
use HalcyonLaravel\Base\Repository\BaseRepository;
use Illuminate\Http\Request;

/**
 * Class ServiceTableController
 *
 * @package App\Http\Controllers\Backend\Service
 */
class ServiceTableController extends BaseController
{
    /**
     * @var \App\Repositories\Service\ServiceRepository
     */
    protected $serviceRepository;

    /**
     * ServiceTableController constructor.
     *
     * @param \App\Repositories\Service\ServiceRepository $serviceRepository
     *
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function __construct(ServiceRepository $serviceRepository)
    {
        $this->serviceRepository = $serviceRepository;
        $model = $serviceRepository->makeModel();

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
        return $this->serviceRepository;
    }
}
