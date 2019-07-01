<?php

namespace App\Http\Controllers\Backend\Course;

use App\Repositories\Course\CourseRepository;
use HalcyonLaravel\Base\BaseableOptions;
use HalcyonLaravel\Base\Controllers\Backend\CRUDController;
use HalcyonLaravel\Base\Repository\BaseRepository;
use Illuminate\Database\Eloquent\Model as IlluminateModel;
use Illuminate\Http\Request;

/**
 * Class CourseController
 *
 * @package App\Http\Controllers\Backend\Course
 */
class CourseController extends CRUDController
{
    /**
     * @var \App\Repositories\Course\CourseRepository
     */
    protected $courseRepository;

    /**
     * CourseController constructor.
     *
     * @param \App\Repositories\Course\CourseRepository $courseRepository
     *
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function __construct(CourseRepository $courseRepository)
    {
        $this->courseRepository = $courseRepository;
        parent::__construct();

        $model = $courseRepository->makeModel();

        $this->middleware('permission:' . $model::permission('index'), ['only' => ['index']]);
        $this->middleware('permission:' . $model::permission('show'), ['only' => ['show']]);
        $this->middleware('permission:' . $model::permission('create'), ['only' => ['create', 'store']]);
        $this->middleware('permission:' . $model::permission('edit'), ['only' => ['update', 'edit']]);
        $this->middleware('permission:' . $model::permission('destroy'), ['only' => ['destroy']]);
    }

    /**
     * @param \Illuminate\Http\Request                 $request
     * @param \Illuminate\Database\Eloquent\Model|null $model
     *
     * @return array
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function generateStub(Request $request, IlluminateModel $model = null): array
    {
        // $data = [
        //     'meta' => $request->meta,
        // ];

        // $model = $this->repository()->makeModel();

        // dd($data);

        // return array_merge($request->only($model->getFillable()), $data);

        $data = $request->all();

        $data['status'] = $request->status ? 'enable' : 'disabled';

        return $data;

        // $data = [
        //     'meta' => $request->meta,
        // ];

        // $model = $this->repository()->makeModel();

        // $request = $request->all();

        // return array_merge($request, $data);
    }

    /**
     * @return \HalcyonLaravel\Base\Repository\BaseRepository
     */
    public function repository(): BaseRepository
    {
        return $this->courseRepository;
    }

    /**
     * Validate input on store/update
     *
     * @param \Illuminate\Http\Request                 $request
     * @param \Illuminate\Database\Eloquent\Model|null $model
     *
     * @return \HalcyonLaravel\Base\BaseableOptions
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function crudRules(Request $request, IlluminateModel $model = null): BaseableOptions
    {
        $table = $this->repository()->makeModel()->getTable();

        return BaseableOptions::create()
            ->storeRules([
                'title' => "required",
            ])
            ->storeRuleMessages([
                'title.required' => 'The title field is required.',
            ])
            ->updateRules([
                'title' => "required",
            ])
            ->updateRuleMessages([
                'title.required' => 'The title field is required.',
            ]);
    }


    public function store(Request $request)
    {
        $baseableOptions = $this->crudRules($request);
        $this->validate($request, $baseableOptions->storeRules, $baseableOptions->storeRuleMessages);

        $data = $this->generateStub($request);
        $model = $this->repository()->create($data);

        return redirect()->route('admin.courses.edit', $model->slug)->withFlashSuccess('Success');
        // return $this->response('store', $request->ajax(), $model,
            // $this->_redirectAfterAction($request->_submission, $model));
    }

    public function update(Request $request, String $routeKeyName)
    {
        $model = $this->getModel($routeKeyName);

        $baseableOptions = $this->crudRules($request, $model);
        $this->validate($request, $baseableOptions->updateRules, $baseableOptions->updateRuleMessages);

        $data = $this->generateStub($request, $model);
        $model = $this->repository()->update($data, $model->id);

        return redirect()->route('admin.courses.edit', $model)->withFlashSuccess('Update Success');


        // return $this->response('update', $request->ajax(), $model,
            // $this->_redirectAfterAction($request->_submission, $model));
    }
}
