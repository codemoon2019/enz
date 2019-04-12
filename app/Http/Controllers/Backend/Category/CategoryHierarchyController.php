<?php

namespace App\Http\Controllers\Backend\Category;

use App\Repositories\Category\CategoryRepository;
use HalcyonLaravel\Base\Controllers\BaseController;
use HalcyonLaravel\Base\Repository\BaseRepository;
use Illuminate\Http\Request;

/**
 * Class CategoryHierarchyController.
 */
class CategoryHierarchyController extends BaseController
{
    /**
     * @var CategoryRepository
     */
    protected $categoryRepository;

    /**
     * CategoryHierarchyController constructor.
     *
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->middleware('permission:' . implode(',', app($categoryRepository->model())::permission(['index'])));
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request)
    {
        $this->repository()->updateHierarchy($request->hierarchy);

        return $this->table();
    }

    public function repository(): BaseRepository
    {
        return $this->categoryRepository;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function table()
    {
        $hierarchy = $this->repository()->getHierarchy(null, null, true);

        return response()->json(['hierarchy' => $hierarchy]);
    }
}
