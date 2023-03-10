<?php

namespace App\Http\Controllers\Backend\Details;

use DataTables;
use App\Repositories\Details\DetailsRepository;
use HalcyonLaravel\Base\Controllers\BaseController;
use HalcyonLaravel\Base\Repository\BaseRepository;
use Illuminate\Http\Request;

/**
 * Class DetailsTableController
 *
 * @package App\Http\Controllers\Backend\Details
 */
class DetailsTableController extends BaseController
{
    /**
     * @var \App\Repositories\Details\DetailsRepository
     */
    protected $detailsRepository;

    /**
     * DetailsTableController constructor.
     *
     * @param \App\Repositories\Details\DetailsRepository $detailsRepository
     *
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function __construct(DetailsRepository $detailsRepository)
    {
        $this->detailsRepository = $detailsRepository;
        $model = $detailsRepository->makeModel();

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
        return $this->detailsRepository;
    }
}
