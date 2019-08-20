<?php

namespace App\Http\Controllers\Backend\SuccessPercentage;

use App\Repositories\SuccessPercentage\SuccessPercentageRepository;
use HalcyonLaravel\Base\BaseableOptions;
use HalcyonLaravel\Base\Controllers\Backend\CRUDController;
use HalcyonLaravel\Base\Repository\BaseRepository;
use Illuminate\Database\Eloquent\Model as IlluminateModel;
use App\Models\SuccessPercentage\SuccessPercentage;
use Illuminate\Http\Request;

/**
 * Class SuccessPercentageController
 *
 * @package App\Http\Controllers\Backend\SuccessPercentage
 */
class SuccessPercentageController extends CRUDController
{
    /**
     * @var \App\Repositories\SuccessPercentage\SuccessPercentageRepository
     */
    protected $successPercentageRepository;

    /**
     * SuccessPercentageController constructor.
     *
     * @param \App\Repositories\SuccessPercentage\SuccessPercentageRepository $successPercentageRepository
     *
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function __construct(SuccessPercentageRepository $successPercentageRepository)
    {
        $this->successPercentageRepository = $successPercentageRepository;
        parent::__construct();

        $model = $successPercentageRepository->makeModel();

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
        $order = SuccessPercentage::max('order');
        $request->request->add(['order'=>$order+1]);
        return array_merge($request->only($model->getFillable()), $data);
    }

    /**
     * @return \HalcyonLaravel\Base\Repository\BaseRepository
     */
    public function repository(): BaseRepository
    {
        return $this->successPercentageRepository;
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
                'percentage' => "required|numeric|between:1,100"
            ])
            ->storeRuleMessages([
                'title.required' => 'The title field is required.',
            ])
            ->updateRules([
                'title' => "required|max:255|unique:$table,title," . optional($model)->id,
                'percentage' => "required|numeric|between:1,100"
            ])
            ->updateRuleMessages([
                'title.required' => 'The title field is required.',
            ]);
    }
}
