<?php

namespace App\Http\Controllers\Backend\Institution;

use DataTables;
use App\Repositories\Institution\InstitutionRepository;
use HalcyonLaravel\Base\Controllers\BaseController;
use HalcyonLaravel\Base\Repository\BaseRepository;
use Illuminate\Http\Request;

/**
 * Class InstitutionTableController
 *
 * @package App\Http\Controllers\Backend\Institution
 */
class InstitutionTableController extends BaseController
{
    /**
     * @var \App\Repositories\Institution\InstitutionRepository
     */
    protected $institutionRepository;

    /**
     * InstitutionTableController constructor.
     *
     * @param \App\Repositories\Institution\InstitutionRepository $institutionRepository
     *
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function __construct(InstitutionRepository $institutionRepository)
    {
        $this->institutionRepository = $institutionRepository;
        $model = $institutionRepository->makeModel();

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
        return $this->institutionRepository;
    }
}
