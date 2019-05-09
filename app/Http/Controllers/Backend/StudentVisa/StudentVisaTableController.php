<?php

namespace App\Http\Controllers\Backend\StudentVisa;

use DataTables;
use App\Repositories\StudentVisa\StudentVisaRepository;
use HalcyonLaravel\Base\Controllers\BaseController;
use HalcyonLaravel\Base\Repository\BaseRepository;
use Illuminate\Http\Request;

/**
 * Class StudentVisaTableController
 *
 * @package App\Http\Controllers\Backend\StudentVisa
 */
class StudentVisaTableController extends BaseController
{
    /**
     * @var \App\Repositories\StudentVisa\StudentVisaRepository
     */
    protected $studentVisaRepository;

    /**
     * StudentVisaTableController constructor.
     *
     * @param \App\Repositories\StudentVisa\StudentVisaRepository $studentVisaRepository
     *
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function __construct(StudentVisaRepository $studentVisaRepository)
    {
        $this->studentVisaRepository = $studentVisaRepository;
        $model = $studentVisaRepository->makeModel();

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
        return $this->studentVisaRepository;
    }
}
