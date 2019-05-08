<?php

namespace App\Http\Controllers\Frontend\Country;

use App\Repositories\Core\Page\PageRepository;
use App\Repositories\Country\CountryRepository;
use HalcyonLaravel\Base\Controllers\BaseController as Controller;
use HalcyonLaravel\Base\Repository\BaseRepository;
use MetaTag;

/**
 * Class CountryController
 *
 * @package App\Http\Controllers\Frontend\Country
 */
class CountryController extends Controller
{
    /**
     * @var \App\Repositories\Country\CountryRepository
     */
    private $countriesRepository;

    private $pageRepository;
    private $viewFrontendPath;

    /**
     * CountryController constructor.
     *
     * @param \App\Repositories\Country\CountryRepository $countriesRepository
     * @param \App\Repositories\Core\Page\PageRepository                  $pageRepository
     *
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function __construct(CountryRepository $countriesRepository, PageRepository $pageRepository)
    {
        $model = $countriesRepository->makeModel();
        $this->middleware('page_status:' . get_class($model));

        $this->countriesRepository = $countriesRepository;
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
        return $this->countriesRepository;
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
