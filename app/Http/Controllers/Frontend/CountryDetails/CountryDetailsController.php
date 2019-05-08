<?php

namespace App\Http\Controllers\Frontend\CountryDetails;

use App\Repositories\Core\Page\PageRepository;
use App\Repositories\CountryDetails\CountryDetailsRepository;
use HalcyonLaravel\Base\Controllers\BaseController as Controller;
use HalcyonLaravel\Base\Repository\BaseRepository;
use MetaTag;

/**
 * Class CountryDetailsController
 *
 * @package App\Http\Controllers\Frontend\CountryDetails
 */
class CountryDetailsController extends Controller
{
    /**
     * @var \App\Repositories\CountryDetails\CountryDetailsRepository
     */
    private $countryDetailsRepository;

    private $pageRepository;
    private $viewFrontendPath;

    /**
     * CountryDetailsController constructor.
     *
     * @param \App\Repositories\CountryDetails\CountryDetailsRepository $countryDetailsRepository
     * @param \App\Repositories\Core\Page\PageRepository                  $pageRepository
     *
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function __construct(CountryDetailsRepository $countryDetailsRepository, PageRepository $pageRepository)
    {
        $model = $countryDetailsRepository->makeModel();
        $this->middleware('page_status:' . get_class($model));

        $this->countryDetailsRepository = $countryDetailsRepository;
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
        return $this->countryDetailsRepository;
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
