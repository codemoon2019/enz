<?php

namespace App\Http\Controllers\Frontend\AreaOfStudy;

use App\Repositories\Core\Page\PageRepository;
use App\Repositories\AreaOfStudy\AreaOfStudyRepository;
use HalcyonLaravel\Base\Controllers\BaseController as Controller;
use HalcyonLaravel\Base\Repository\BaseRepository;
use MetaTag;

/**
 * Class AreaOfStudyController
 *
 * @package App\Http\Controllers\Frontend\AreaOfStudy
 */
class AreaOfStudyController extends Controller
{
    /**
     * @var \App\Repositories\AreaOfStudy\AreaOfStudyRepository
     */
    private $areaOfStudiesRepository;

    private $pageRepository;
    private $viewFrontendPath;

    /**
     * AreaOfStudyController constructor.
     *
     * @param \App\Repositories\AreaOfStudy\AreaOfStudyRepository $areaOfStudiesRepository
     * @param \App\Repositories\Core\Page\PageRepository                  $pageRepository
     *
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function __construct(AreaOfStudyRepository $areaOfStudiesRepository, PageRepository $pageRepository)
    {
        $model = $areaOfStudiesRepository->makeModel();
        $this->middleware('page_status:' . get_class($model));

        $this->areaOfStudiesRepository = $areaOfStudiesRepository;
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
        return $this->areaOfStudiesRepository;
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
