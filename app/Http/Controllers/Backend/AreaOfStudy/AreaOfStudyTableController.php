<?php

namespace App\Http\Controllers\Backend\AreaOfStudy;

use DataTables;
use App\Repositories\AreaOfStudy\AreaOfStudyRepository;
use HalcyonLaravel\Base\Controllers\BaseController;
use HalcyonLaravel\Base\Repository\BaseRepository;
use Illuminate\Http\Request;

/**
 * Class AreaOfStudyTableController
 *
 * @package App\Http\Controllers\Backend\AreaOfStudy
 */
class AreaOfStudyTableController extends BaseController
{
    /**
     * @var \App\Repositories\AreaOfStudy\AreaOfStudyRepository
     */
    protected $areaOfStudyRepository;

    /**
     * AreaOfStudyTableController constructor.
     *
     * @param \App\Repositories\AreaOfStudy\AreaOfStudyRepository $areaOfStudyRepository
     *
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function __construct(AreaOfStudyRepository $areaOfStudyRepository)
    {
        $this->areaOfStudyRepository = $areaOfStudyRepository;
        $model = $areaOfStudyRepository->makeModel();

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
        return $this->areaOfStudyRepository;
    }
}
