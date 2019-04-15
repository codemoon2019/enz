<?php

namespace App\Http\Controllers\Backend\Why;

use DataTables;
use App\Repositories\Why\WhyRepository;
use HalcyonLaravel\Base\Controllers\BaseController;
use HalcyonLaravel\Base\Repository\BaseRepository;
use Illuminate\Http\Request;

/**
 * Class WhyTableController
 *
 * @package App\Http\Controllers\Backend\Why
 */
class WhyTableController extends BaseController
{
    /**
     * @var \App\Repositories\Why\WhyRepository
     */
    protected $whyRepository;

    /**
     * WhyTableController constructor.
     *
     * @param \App\Repositories\Why\WhyRepository $whyRepository
     *
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function __construct(WhyRepository $whyRepository)
    {
        $this->whyRepository = $whyRepository;
        $model = $whyRepository->makeModel();

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
        return $this->whyRepository;
    }
}
