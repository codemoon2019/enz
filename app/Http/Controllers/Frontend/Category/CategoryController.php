<?php

namespace App\Http\Controllers\Frontend\Category;

use App\Criterion\Eloquent\ThisEqualThatCriteria;
use App\Criterion\Eloquent\ThisOrderByCriteria;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\Core\Page\PageRepository;
use HalcyonLaravel\Base\Controllers\BaseController;
use HalcyonLaravel\Base\Repository\BaseRepository;
use MetaTag;

/**
 * Class CategoryController
 *
 * @package App\Http\Controllers\Frontend\Category
 */
class CategoryController extends BaseController
{
    protected $pageRepository;
    protected $categoryRepository;

    /**
     * CategoriesController constructor.
     *
     * @param \App\Repositories\Core\Page\PageRepository    $pageRepository
     * @param \App\Repositories\Category\CategoryRepository $categoryRepository
     *
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function __construct(PageRepository $pageRepository, CategoryRepository $categoryRepository)
    {
        $this->middleware('page_status:' . $categoryRepository->makeModel()::MODULE_NAME);

        $this->pageRepository = $pageRepository;
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function index()
    {
        $page = $this->pageRepository->indexPage($this->repository()->makeModel()::MODULE_NAME);

        MetaTag::setEntity($page);

        $MODEL = $this->repository()->makeModel();

        $this->repository()->pushCriteria(new ThisEqualThatCriteria('parent_id'));
        $this->repository()->pushCriteria(new ThisEqualThatCriteria('status', 'enable'));
        $this->repository()->pushCriteria(new ThisOrderByCriteria('order'));
        $models = $this->repository()->paginate(12);

        return view($this->repository()->makeModel()::VIEW_FRONTEND_PATH . '.index',
            compact('MODEL', 'models', 'page'));
    }

    public function repository(): BaseRepository
    {
        return $this->categoryRepository;
    }

    /**
     * @param string $routeKeyName
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function show(string $routeKeyName)
    {
        $page = $model = $this->repository()->getModel($routeKeyName);

        MetaTag::setEntity($model);

        $models = $this->repository()->getModelRelations($model);
        return view($this->categoryRepository->makeModel()::VIEW_FRONTEND_PATH . '.show',
            compact('model', 'models', 'page'));
    }

}
