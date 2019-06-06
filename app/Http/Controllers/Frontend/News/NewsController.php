<?php

namespace App\Http\Controllers\Frontend\News;

use App\Repositories\Core\Page\PageRepository;
use App\Repositories\News\NewsRepository;
use HalcyonLaravel\Base\Controllers\BaseController as Controller;
use HalcyonLaravel\Base\Repository\BaseRepository;
use MetaTag;

/**
 * Class NewsController
 *
 * @package App\Http\Controllers\Frontend\News
 */
class NewsController extends Controller
{
    /**
     * @var \App\Repositories\News\NewsRepository
     */
    private $newsRepository;

    private $pageRepository;
    private $viewFrontendPath;

    /**
     * NewsController constructor.
     *
     * @param \App\Repositories\News\NewsRepository $newsRepository
     * @param \App\Repositories\Core\Page\PageRepository                  $pageRepository
     *
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function __construct(NewsRepository $newsRepository, PageRepository $pageRepository)
    {
        $model = $newsRepository->makeModel();
        $this->middleware('page_status:' . get_class($model));

        $this->newsRepository = $newsRepository;
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

        $models = activeNews();

        // $models = $this->repository()->whereStatus('enale')->get();

        return view("{$this->viewFrontendPath}.index", compact('page', 'models', 'Model'));
    }

    /**
     * @return \HalcyonLaravel\Base\Repository\BaseRepository
     */
    public function repository(): BaseRepository
    {
        return $this->newsRepository;
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
