<?php

namespace App\Http\Controllers\Frontend\Why;

use App\Repositories\Core\Page\PageRepository;
use App\Repositories\Why\WhyRepository;
use HalcyonLaravel\Base\Controllers\BaseController as Controller;
use HalcyonLaravel\Base\Repository\BaseRepository;
use MetaTag;

/**
 * Class WhyController
 *
 * @package App\Http\Controllers\Frontend\Why
 */
class WhyController extends Controller
{
    /**
     * @var \App\Repositories\Why\WhyRepository
     */
    private $whiesRepository;

    private $pageRepository;
    private $viewFrontendPath;

    /**
     * WhyController constructor.
     *
     * @param \App\Repositories\Why\WhyRepository $whiesRepository
     * @param \App\Repositories\Core\Page\PageRepository                  $pageRepository
     *
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function __construct(WhyRepository $whiesRepository, PageRepository $pageRepository)
    {
        $model = $whiesRepository->makeModel();
        $this->middleware('page_status:' . get_class($model));

        $this->whiesRepository = $whiesRepository;
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
        return $this->whiesRepository;
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
