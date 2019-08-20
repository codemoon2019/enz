<?php

namespace App\Http\Controllers\Backend\Location;

use App\Repositories\Location\LocationRepository;
use HalcyonLaravel\Base\BaseableOptions;
use HalcyonLaravel\Base\Controllers\Backend\CRUDController;
use HalcyonLaravel\Base\Repository\BaseRepository;
use Illuminate\Database\Eloquent\Model as IlluminateModel;
use Illuminate\Http\Request;

/**
 * Class LocationController
 *
 * @package App\Http\Controllers\Backend\Location
 */
class LocationController extends CRUDController
{
    /**
     * @var \App\Repositories\Location\LocationRepository
     */
    protected $locationRepository;

    /**
     * LocationController constructor.
     *
     * @param \App\Repositories\Location\LocationRepository $locationRepository
     *
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function __construct(LocationRepository $locationRepository)
    {
        $this->locationRepository = $locationRepository;
        parent::__construct();

        $model = $locationRepository->makeModel();

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
            'meta'           => $request->meta,
            'featured_image' => $request->featured_image,
        ];

        $model = $this->repository()->makeModel();

        return array_merge($request->only($model->getFillable()), $data);
    }

    /**
     * @return \HalcyonLaravel\Base\Repository\BaseRepository
     */
    public function repository(): BaseRepository
    {
        return $this->locationRepository;
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
                'lat' => 'required',
                'long' => 'required',
                'heading' => 'required',
                'pitch' => 'required',
                'featured_image' => 'required'
            ])
            ->storeRuleMessages([
                'title.required' => 'The title field is required.',
                'lat.required' => 'The latitude field is required.',
                'long.required' => 'The longitude field is required.',
            ])
            ->updateRules([
                'title' => "required|max:255|unique:$table,title," . optional($model)->id,
                'lat' => 'required',
                'long' => 'required',
                'heading' => 'required',
                'pitch' => 'required',
            ])
            ->updateRuleMessages([
                'title.required' => 'The title field is required.',
                'lat.required' => 'The latitude field is required.',
                'long.required' => 'The longitude field is required.',
            ]);
    }
}
