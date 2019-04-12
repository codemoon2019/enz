<?php

namespace App\Http\Controllers\Frontend\SampleModule;

use App\Repositories\Core\Page\PageRepository;
use App\Repositories\SampleModule\SampleModuleRepository;
use HalcyonLaravel\Base\Controllers\BaseController as Controller;
use HalcyonLaravel\Base\Repository\BaseRepository;
use MetaTag;

/**
 * Class SampleModuleController
 *
 * @package App\Http\Controllers\Frontend\SampleModule
 */
class SampleModuleController extends Controller
{
    /**
     * @var \App\Repositories\SampleModule\SampleModuleRepository
     */
    private $sampleModulesRepository;

    private $pageRepository;
    private $viewFrontendPath;

    /**
     * SampleModuleController constructor.
     *
     * @param \App\Repositories\SampleModule\SampleModuleRepository $sampleModulesRepository
     * @param \App\Repositories\Core\Page\PageRepository                  $pageRepository
     *
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function __construct(SampleModuleRepository $sampleModulesRepository, PageRepository $pageRepository)
    {
        $model = $sampleModulesRepository->makeModel();
        $this->middleware('page_status:' . get_class($model));

        $this->sampleModulesRepository = $sampleModulesRepository;
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
        return $this->sampleModulesRepository;
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
