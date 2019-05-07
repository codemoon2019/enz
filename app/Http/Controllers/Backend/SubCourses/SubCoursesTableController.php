<?php

namespace App\Http\Controllers\Backend\SubCourses;

use DataTables;
use App\Repositories\SubCourses\SubCoursesRepository;
use HalcyonLaravel\Base\Controllers\BaseController;
use HalcyonLaravel\Base\Repository\BaseRepository;
use Illuminate\Http\Request;

/**
 * Class SubCoursesTableController
 *
 * @package App\Http\Controllers\Backend\SubCourses
 */
class SubCoursesTableController extends BaseController
{
    /**
     * @var \App\Repositories\SubCourses\SubCoursesRepository
     */
    protected $subCoursesRepository;

    /**
     * SubCoursesTableController constructor.
     *
     * @param \App\Repositories\SubCourses\SubCoursesRepository $subCoursesRepository
     *
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function __construct(SubCoursesRepository $subCoursesRepository)
    {
        $this->subCoursesRepository = $subCoursesRepository;
        $model = $subCoursesRepository->makeModel();

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
        return $this->subCoursesRepository;
    }
}
