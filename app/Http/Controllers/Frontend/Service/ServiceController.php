<?php

namespace App\Http\Controllers\Frontend\Service;

use App\Repositories\Core\Page\PageRepository;
use App\Repositories\Service\ServiceRepository;
use HalcyonLaravel\Base\Controllers\BaseController as Controller;
use HalcyonLaravel\Base\Repository\BaseRepository;
use MetaTag;

/**
 * Class ServiceController
 *
 * @package App\Http\Controllers\Frontend\Service
 */
class ServiceController extends Controller
{
    /**
     * @var \App\Repositories\Service\ServiceRepository
     */
    private $servicesRepository;

    private $pageRepository;
    private $viewFrontendPath;

    /**
     * ServiceController constructor.
     *
     * @param \App\Repositories\Service\ServiceRepository $servicesRepository
     * @param \App\Repositories\Core\Page\PageRepository                  $pageRepository
     *
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function __construct(ServiceRepository $servicesRepository, PageRepository $pageRepository)
    {
        $model = $servicesRepository->makeModel();
        $this->middleware('page_status:' . get_class($model));

        $this->servicesRepository = $servicesRepository;
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
        return $this->servicesRepository;
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
