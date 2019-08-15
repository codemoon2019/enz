<?php

namespace App\Http\Controllers\Backend\ServicesOffered;

use App\Repositories\ServicesOffered\ServicesOfferedRepository;
use HalcyonLaravel\Base\BaseableOptions;
use HalcyonLaravel\Base\Controllers\Backend\CRUDController;
use HalcyonLaravel\Base\Repository\BaseRepository;
use Illuminate\Database\Eloquent\Model as IlluminateModel;
use Illuminate\Http\Request;

/**
 * Class ServicesOfferedController
 *
 * @package App\Http\Controllers\Backend\ServicesOffered
 */
class ServicesOfferedController extends CRUDController
{
    /**
     * @var \App\Repositories\ServicesOffered\ServicesOfferedRepository
     */
    protected $servicesOfferedRepository;

    /**
     * ServicesOfferedController constructor.
     *
     * @param \App\Repositories\ServicesOffered\ServicesOfferedRepository $servicesOfferedRepository
     *
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function __construct(ServicesOfferedRepository $servicesOfferedRepository)
    {
        $this->servicesOfferedRepository = $servicesOfferedRepository;
        parent::__construct();

        $model = $servicesOfferedRepository->makeModel();

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
        
        $data = $request->except(['_token', '_method', '_submission']);

        return $data;

    }

    /**
     * @return \HalcyonLaravel\Base\Repository\BaseRepository
     */
    public function repository(): BaseRepository
    {
        return $this->servicesOfferedRepository;
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
                'description' => "required",
                'icon' => "required",
            ])
            ->storeRuleMessages([
                'title.required' => 'The title field is required.',
            ])
            ->updateRules([
                'title' => "required|max:255|unique:$table,title," . optional($model)->id,
                'description' => "required",
            ])
            ->updateRuleMessages([
                'title.required' => 'The title field is required.',
            ]);
    }
}
