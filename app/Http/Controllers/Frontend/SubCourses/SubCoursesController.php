<?php

namespace App\Http\Controllers\Frontend\SubCourses;

use App\Repositories\Core\Page\PageRepository;
use App\Repositories\SubCourses\SubCoursesRepository;
use HalcyonLaravel\Base\Controllers\BaseController as Controller;
use HalcyonLaravel\Base\Repository\BaseRepository;
use MetaTag;

/**
 * Class SubCoursesController
 *
 * @package App\Http\Controllers\Frontend\SubCourses
 */
class SubCoursesController extends Controller
{
    /**
     * @var \App\Repositories\SubCourses\SubCoursesRepository
     */
    private $subCoursesRepository;

    private $pageRepository;
    private $viewFrontendPath;

    /**
     * SubCoursesController constructor.
     *
     * @param \App\Repositories\SubCourses\SubCoursesRepository $subCoursesRepository
     * @param \App\Repositories\Core\Page\PageRepository                  $pageRepository
     *
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function __construct(SubCoursesRepository $subCoursesRepository, PageRepository $pageRepository)
    {
        $model = $subCoursesRepository->makeModel();
        $this->middleware('page_status:' . get_class($model));

        $this->subCoursesRepository = $subCoursesRepository;
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
        return $this->subCoursesRepository;
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
