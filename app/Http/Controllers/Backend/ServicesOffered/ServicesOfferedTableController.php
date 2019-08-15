<?php

namespace App\Http\Controllers\Backend\ServicesOffered;

use DataTables;
use App\Repositories\ServicesOffered\ServicesOfferedRepository;
use HalcyonLaravel\Base\Controllers\BaseController;
use HalcyonLaravel\Base\Repository\BaseRepository;
use Illuminate\Http\Request;

/**
 * Class ServicesOfferedTableController
 *
 * @package App\Http\Controllers\Backend\ServicesOffered
 */
class ServicesOfferedTableController extends BaseController
{
    /**
     * @var \App\Repositories\ServicesOffered\ServicesOfferedRepository
     */
    protected $servicesOfferedRepository;

    /**
     * ServicesOfferedTableController constructor.
     *
     * @param \App\Repositories\ServicesOffered\ServicesOfferedRepository $servicesOfferedRepository
     *
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function __construct(ServicesOfferedRepository $servicesOfferedRepository)
    {
        $this->servicesOfferedRepository = $servicesOfferedRepository;
        $model = $servicesOfferedRepository->makeModel();

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
        return $this->servicesOfferedRepository;
    }
}
