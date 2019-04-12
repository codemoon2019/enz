<?php

namespace App\Http\Controllers\Frontend\MoreLife;

use App\Repositories\Core\Page\PageRepository;
use App\Repositories\MoreLife\MoreLifeRepository;
use HalcyonLaravel\Base\Controllers\BaseController as Controller;
use HalcyonLaravel\Base\Repository\BaseRepository;
use MetaTag;

/**
 * Class MoreLifeController
 *
 * @package App\Http\Controllers\Frontend\MoreLife
 */
class MoreLifeController extends Controller
{
    /**
     * @var \App\Repositories\MoreLife\MoreLifeRepository
     */
    private $moreLivesRepository;

    private $pageRepository;
    private $viewFrontendPath;

    /**
     * MoreLifeController constructor.
     *
     * @param \App\Repositories\MoreLife\MoreLifeRepository $moreLivesRepository
     * @param \App\Repositories\Core\Page\PageRepository                  $pageRepository
     *
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function __construct(MoreLifeRepository $moreLivesRepository, PageRepository $pageRepository)
    {
        $model = $moreLivesRepository->makeModel();
        $this->middleware('page_status:' . get_class($model));

        $this->moreLivesRepository = $moreLivesRepository;
        $this->pageRepository = $pageRepository;
        $this->viewFrontendPath = $model::VIEW_FRONTEND_PATH;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function index()
    {
    // return view('frontend.more-life');
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
        return $this->moreLivesRepository;
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
