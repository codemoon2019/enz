<?php

namespace App\Http\Controllers\Frontend\City;

use App\Repositories\Core\Page\PageRepository;
use App\Repositories\City\CityRepository;
use HalcyonLaravel\Base\Controllers\BaseController as Controller;
use HalcyonLaravel\Base\Repository\BaseRepository;
use MetaTag;

/**
 * Class CityController
 *
 * @package App\Http\Controllers\Frontend\City
 */
class CityController extends Controller
{
    /**
     * @var \App\Repositories\City\CityRepository
     */
    private $citiesRepository;

    private $pageRepository;
    private $viewFrontendPath;

    /**
     * CityController constructor.
     *
     * @param \App\Repositories\City\CityRepository $citiesRepository
     * @param \App\Repositories\Core\Page\PageRepository                  $pageRepository
     *
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function __construct(CityRepository $citiesRepository, PageRepository $pageRepository)
    {
        $model = $citiesRepository->makeModel();
        $this->middleware('page_status:' . get_class($model));

        $this->citiesRepository = $citiesRepository;
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
        return $this->citiesRepository;
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
