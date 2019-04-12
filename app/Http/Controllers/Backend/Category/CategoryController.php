<?php

namespace App\Http\Controllers\Backend\Category;

use App\Repositories\Category\CategoryRepository;
use HalcyonLaravel\Base\BaseableOptions;
use HalcyonLaravel\Base\Controllers\Backend\CRUDController;
use HalcyonLaravel\Base\Repository\BaseRepository;
use Illuminate\Database\Eloquent\Model as IlluminateModel;
use Illuminate\Http\Request;

/**
 * Class CategoryController
 *
 * @package App\Http\Controllers\Backend\Category
 */
class CategoryController extends CRUDController
{
    protected $categoryRepository;

    /**
     * CategoriesController constructor.
     *
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->categoryRepository->loadObserver();
        parent::__construct();

        $model = app($categoryRepository->model());
        $this->middleware('permission:' . $model::permission('index'), ['only' => 'index']);
        $this->middleware('permission:' . $model::permission('show'), ['only' => 'show']);
        $this->middleware('permission:' . $model::permission('create'), ['only' => ['create', 'store']]);
        $this->middleware('permission:' . $model::permission('edit'), ['only' => ['edit', 'update']]);
        $this->middleware('permission:' . $model::permission('destroy'), ['only' => 'destroy']);
    }

    /**
     * @param \Illuminate\Http\Request            $request
     * @param \Illuminate\Database\Eloquent\Model $model
     *
     * @return array
     */
    public function generateStub(Request $request, IlluminateModel $model = null): array
    {
        $model = app($this->repository()->model());

        $data = $request->except(['_token', '_method', '_submission', 'status']);
        $data['status'] = array_keys($model->statuses())[$request->status ? 0 : 1];

        $count = $model->where('parent_id', $data['parent_id'])->count();

        if ($data['parent_id']) {
            if ($model && $model->id == $data['parent_id']) {
                $data['parent_id'] = null;
            } else {
                $data['order'] = $count;
            }
        } else {
            $data['order'] = $count;
        }

        return $data;
    }

    public function repository(): BaseRepository
    {
        return $this->categoryRepository;
    }

    /**
     * Validate input on store/update
     *
     * @param Request              $request
     * @param IlluminateModel|null $model
     *
     * @return BaseableOptions
     */
    public function crudRules(Request $request, IlluminateModel $model = null): BaseableOptions
    {
        return BaseableOptions::create()
            ->storeRules([
                'title' => 'required|max:100',
                'description' => 'required',
                'images.*' => 'sometimes|required|mimes:jpg,jpeg,png',
                'parent_id' => 'nullable|exists:categories,id',
            ])
            ->updateRules([
                'title' => 'required|max:100',
                'description' => 'required',
                'images.*' => 'sometimes|required|mimes:jpg,jpeg,png',
                'parent_id' => 'nullable|exists:categories,id',
            ]);
    }
}
