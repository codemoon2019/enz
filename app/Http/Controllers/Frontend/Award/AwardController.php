<?php

namespace App\Http\Controllers\Frontend\Award;

use App\Repositories\Core\Page\PageRepository;
use App\Repositories\Award\AwardRepository;
use HalcyonLaravel\Base\Controllers\BaseController as Controller;
use HalcyonLaravel\Base\Repository\BaseRepository;
use MetaTag;

/**
 * Class AwardController
 *
 * @package App\Http\Controllers\Frontend\Award
 */
class AwardController extends Controller
{
    /**
     * @var \App\Repositories\Award\AwardRepository
     */
    private $awardsRepository;

    private $pageRepository;
    private $viewFrontendPath;

    /**
     * AwardController constructor.
     *
     * @param \App\Repositories\Award\AwardRepository $awardsRepository
     * @param \App\Repositories\Core\Page\PageRepository                  $pageRepository
     *
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function __construct(AwardRepository $awardsRepository, PageRepository $pageRepository)
    {
        $model = $awardsRepository->makeModel();
        $this->middleware('page_status:' . get_class($model));

        $this->awardsRepository = $awardsRepository;
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
        return $this->awardsRepository;
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
