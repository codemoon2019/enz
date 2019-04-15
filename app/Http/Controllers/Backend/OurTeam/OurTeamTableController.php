<?php

namespace App\Http\Controllers\Backend\OurTeam;

use DataTables;
use App\Repositories\OurTeam\OurTeamRepository;
use HalcyonLaravel\Base\Controllers\BaseController;
use HalcyonLaravel\Base\Repository\BaseRepository;
use Illuminate\Http\Request;

/**
 * Class OurTeamTableController
 *
 * @package App\Http\Controllers\Backend\OurTeam
 */
class OurTeamTableController extends BaseController
{
    /**
     * @var \App\Repositories\OurTeam\OurTeamRepository
     */
    protected $ourTeamRepository;

    /**
     * OurTeamTableController constructor.
     *
     * @param \App\Repositories\OurTeam\OurTeamRepository $ourTeamRepository
     *
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function __construct(OurTeamRepository $ourTeamRepository)
    {
        $this->ourTeamRepository = $ourTeamRepository;
        $model = $ourTeamRepository->makeModel();

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
        return $this->ourTeamRepository;
    }
}
