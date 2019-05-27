<?php

namespace App\Http\Controllers\Backend\City;

use App\Repositories\City\CityRepository;
use HalcyonLaravel\Base\BaseableOptions;
use HalcyonLaravel\Base\Controllers\Backend\CRUDController;
use HalcyonLaravel\Base\Repository\BaseRepository;
use Illuminate\Database\Eloquent\Model as IlluminateModel;
use Illuminate\Http\Request;

/**
 * Class CityController
 *
 * @package App\Http\Controllers\Backend\City
 */
class CityController extends CRUDController
{
    /**
     * @var \App\Repositories\City\CityRepository
     */
    protected $cityRepository;

    /**
     * CityController constructor.
     *
     * @param \App\Repositories\City\CityRepository $cityRepository
     *
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function __construct(CityRepository $cityRepository)
    {
        $this->cityRepository = $cityRepository;
        parent::__construct();

        $model = $cityRepository->makeModel();

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
        $data = [
            'meta' => $request->meta,
        ];

        $model = $this->repository()->makeModel();

        return array_merge($request->only($model->getFillable()), $data);
    }

    /**
     * @return \HalcyonLaravel\Base\Repository\BaseRepository
     */
    public function repository(): BaseRepository
    {
        return $this->cityRepository;
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
                'title' => "required|max:255|unique:$table",
            ])
            ->storeRuleMessages([
                'title.required' => 'The title field is required.',
            ])
            ->updateRules([
                'title' => "required|max:255|unique:$table,title," . optional($model)->id,
            ])
            ->updateRuleMessages([
                'title.required' => 'The title field is required.',
            ]);
    }

    public function update(Request $request, String $routeKeyName)
    {
        $model = $this->getModel($routeKeyName);

        $baseableOptions = $this->crudRules($request, $model);
        
        $this->validate($request, $baseableOptions->updateRules, $baseableOptions->updateRuleMessages);

        $data = $this->generateStub($request, $model);

        $model = $this->repository()->update($data, $model->id);

        return redirect()->route('admin.cities.edit', [$model, $model->country->slug])->withFlashSuccess('Update Success');

        // return $this->response('update', $request->ajax(), $model,
        //     $this->_redirectAfterAction($request->_submission, $model));
    }


    public function store(Request $request)
    {
        $baseableOptions = $this->crudRules($request);

        $this->validate($request, $baseableOptions->storeRules, $baseableOptions->storeRuleMessages);

        $data = $this->generateStub($request);

        $model = $this->repository()->create($data);

        return redirect()->route('admin.cities.edit', [$model->slug, $model->country->slug])->withFlashSuccess('Success');

    }
}
