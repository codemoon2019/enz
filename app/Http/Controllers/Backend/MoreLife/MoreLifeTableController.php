<?php

namespace App\Http\Controllers\Backend\MoreLife;

use DataTables;
use App\Repositories\MoreLife\MoreLifeRepository;
use HalcyonLaravel\Base\Controllers\BaseController;
use HalcyonLaravel\Base\Repository\BaseRepository;
use Illuminate\Http\Request;

/**
 * Class MoreLifeTableController
 *
 * @package App\Http\Controllers\Backend\MoreLife
 */
class MoreLifeTableController extends BaseController
{
    /**
     * @var \App\Repositories\MoreLife\MoreLifeRepository
     */
    protected $moreLifeRepository;

    /**
     * MoreLifeTableController constructor.
     *
     * @param \App\Repositories\MoreLife\MoreLifeRepository $moreLifeRepository
     *
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function __construct(MoreLifeRepository $moreLifeRepository)
    {
        $this->moreLifeRepository = $moreLifeRepository;
        $model = $moreLifeRepository->makeModel();

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
                return $model->updated_at->format(config('core.setting.formats.datetime_12'));
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
        return $this->moreLifeRepository;
    }
}
