<?php

namespace App\Http\Controllers\Backend\Award;

use DataTables;
use App\Repositories\Award\AwardRepository;
use HalcyonLaravel\Base\Controllers\BaseController;
use HalcyonLaravel\Base\Repository\BaseRepository;
use Illuminate\Http\Request;

/**
 * Class AwardTableController
 *
 * @package App\Http\Controllers\Backend\Award
 */
class AwardTableController extends BaseController
{
    /**
     * @var \App\Repositories\Award\AwardRepository
     */
    protected $awardRepository;

    /**
     * AwardTableController constructor.
     *
     * @param \App\Repositories\Award\AwardRepository $awardRepository
     *
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function __construct(AwardRepository $awardRepository)
    {
        $this->awardRepository = $awardRepository;
        $model = $awardRepository->makeModel();

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
        return $this->awardRepository;
    }
}
