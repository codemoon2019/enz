<?php

namespace App\Http\Controllers\Backend\MigrationVisa;

use DataTables;
use App\Repositories\MigrationVisa\MigrationVisaRepository;
use HalcyonLaravel\Base\Controllers\BaseController;
use HalcyonLaravel\Base\Repository\BaseRepository;
use Illuminate\Http\Request;

/**
 * Class MigrationVisaTableController
 *
 * @package App\Http\Controllers\Backend\MigrationVisa
 */
class MigrationVisaTableController extends BaseController
{
    /**
     * @var \App\Repositories\MigrationVisa\MigrationVisaRepository
     */
    protected $migrationVisaRepository;

    /**
     * MigrationVisaTableController constructor.
     *
     * @param \App\Repositories\MigrationVisa\MigrationVisaRepository $migrationVisaRepository
     *
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function __construct(MigrationVisaRepository $migrationVisaRepository)
    {
        $this->migrationVisaRepository = $migrationVisaRepository;
        $model = $migrationVisaRepository->makeModel();

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
            ->escapeColumns(['id'])
            ->addColumn('actions', function ($model) {

                return $model->action_buttons;

            })
            ->editColumn('updated_at', function ($model) {
                return $model->updated_at->format('F d, Y h:i A');
            })
            ->make(true);
    }

    /**
     * @return BaseRepository
     */
    public function repository(): BaseRepository
    {
        return $this->migrationVisaRepository;
    }
}
