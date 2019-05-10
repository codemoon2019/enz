<?php

namespace App\Http\Controllers\Frontend\Details;

use App\Repositories\Core\Page\PageRepository;
use App\Repositories\Details\DetailsRepository;
use HalcyonLaravel\Base\Controllers\BaseController as Controller;
use HalcyonLaravel\Base\Repository\BaseRepository;
use MetaTag;

/**
 * Class DetailsController
 *
 * @package App\Http\Controllers\Frontend\Details
 */
class DetailsController extends Controller
{
    /**
     * @var \App\Repositories\Details\DetailsRepository
     */
    private $detailsRepository;

    private $pageRepository;
    private $viewFrontendPath;

    /**
     * DetailsController constructor.
     *
     * @param \App\Repositories\Details\DetailsRepository $detailsRepository
     * @param \App\Repositories\Core\Page\PageRepository                  $pageRepository
     *
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function __construct(DetailsRepository $detailsRepository, PageRepository $pageRepository)
    {
        $model = $detailsRepository->makeModel();
        $this->middleware('page_status:' . get_class($model));

        $this->detailsRepository = $detailsRepository;
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
        return $this->detailsRepository;
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
