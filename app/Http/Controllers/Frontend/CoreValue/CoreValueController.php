<?php

namespace App\Http\Controllers\Frontend\CoreValue;

use App\Repositories\Core\Page\PageRepository;
use App\Repositories\CoreValue\CoreValueRepository;
use HalcyonLaravel\Base\Controllers\BaseController as Controller;
use HalcyonLaravel\Base\Repository\BaseRepository;
use MetaTag;

/**
 * Class CoreValueController
 *
 * @package App\Http\Controllers\Frontend\CoreValue
 */
class CoreValueController extends Controller
{
    /**
     * @var \App\Repositories\CoreValue\CoreValueRepository
     */
    private $coreValuesRepository;

    private $pageRepository;
    private $viewFrontendPath;

    /**
     * CoreValueController constructor.
     *
     * @param \App\Repositories\CoreValue\CoreValueRepository $coreValuesRepository
     * @param \App\Repositories\Core\Page\PageRepository                  $pageRepository
     *
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function __construct(CoreValueRepository $coreValuesRepository, PageRepository $pageRepository)
    {
        $model = $coreValuesRepository->makeModel();
        $this->middleware('page_status:' . get_class($model));

        $this->coreValuesRepository = $coreValuesRepository;
        $this->pageRepository = $pageRepository;
        $this->viewFrontendPath = $model::VIEW_FRONTEND_PATH;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function index()
    {
        $model = $this->repository()->makeModel();
        $page = $this->pageRepository->indexPage($this->repository()->model());
        $Model = $model;

        MetaTag::setEntity($page);

        $models = $this->repository()->paginate(12);

        return view("{$this->viewFrontendPath}.index", compact('page', 'models', 'Model'));
    }

    /**
     * @return \HalcyonLaravel\Base\Repository\BaseRepository
     */
    public function repository(): BaseRepository
    {
        return $this->coreValuesRepository;
    }

    /**
     * @param string $routeKeyName
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function show(string $routeKeyName)
    {
        $page = $model = $this->getModel($routeKeyName, false);

        MetaTag::setEntity($model);

        return view("{$this->viewFrontendPath}.show", compact('model', 'page'));
    }
}
