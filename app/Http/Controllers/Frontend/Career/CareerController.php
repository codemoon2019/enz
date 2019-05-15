<?php

namespace App\Http\Controllers\Frontend\Career;

use App\Repositories\Core\Page\PageRepository;
use App\Repositories\Career\CareerRepository;
use HalcyonLaravel\Base\Controllers\BaseController as Controller;
use HalcyonLaravel\Base\Repository\BaseRepository;
use MetaTag;

/**
 * Class CareerController
 *
 * @package App\Http\Controllers\Frontend\Career
 */
class CareerController extends Controller
{
    /**
     * @var \App\Repositories\Career\CareerRepository
     */
    private $careersRepository;

    private $pageRepository;
    private $viewFrontendPath;

    /**
     * CareerController constructor.
     *
     * @param \App\Repositories\Career\CareerRepository $careersRepository
     * @param \App\Repositories\Core\Page\PageRepository                  $pageRepository
     *
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function __construct(CareerRepository $careersRepository, PageRepository $pageRepository)
    {
        $model = $careersRepository->makeModel();
        $this->middleware('page_status:' . get_class($model));

        $this->careersRepository = $careersRepository;
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
        return $this->careersRepository;
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
