<?php

namespace App\Http\Controllers\Frontend\OurTeam;

use App\Repositories\Core\Page\PageRepository;
use App\Repositories\OurTeam\OurTeamRepository;
use HalcyonLaravel\Base\Controllers\BaseController as Controller;
use HalcyonLaravel\Base\Repository\BaseRepository;
use MetaTag;

/**
 * Class OurTeamController
 *
 * @package App\Http\Controllers\Frontend\OurTeam
 */
class OurTeamController extends Controller
{
    /**
     * @var \App\Repositories\OurTeam\OurTeamRepository
     */
    private $ourTeamsRepository;

    private $pageRepository;
    private $viewFrontendPath;

    /**
     * OurTeamController constructor.
     *
     * @param \App\Repositories\OurTeam\OurTeamRepository $ourTeamsRepository
     * @param \App\Repositories\Core\Page\PageRepository                  $pageRepository
     *
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function __construct(OurTeamRepository $ourTeamsRepository, PageRepository $pageRepository)
    {
        $model = $ourTeamsRepository->makeModel();
        $this->middleware('page_status:' . get_class($model));

        $this->ourTeamsRepository = $ourTeamsRepository;
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

        // $models = $this->repository()->paginate(12);

        return view("{$this->viewFrontendPath}.index", compact('page', 'Model'));
    }

    /**
     * @return \HalcyonLaravel\Base\Repository\BaseRepository
     */
    public function repository(): BaseRepository
    {
        return $this->ourTeamsRepository;
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
