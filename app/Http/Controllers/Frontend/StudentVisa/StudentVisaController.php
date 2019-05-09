<?php

namespace App\Http\Controllers\Frontend\StudentVisa;

use App\Repositories\Core\Page\PageRepository;
use App\Repositories\StudentVisa\StudentVisaRepository;
use HalcyonLaravel\Base\Controllers\BaseController as Controller;
use HalcyonLaravel\Base\Repository\BaseRepository;
use MetaTag;

/**
 * Class StudentVisaController
 *
 * @package App\Http\Controllers\Frontend\StudentVisa
 */
class StudentVisaController extends Controller
{
    /**
     * @var \App\Repositories\StudentVisa\StudentVisaRepository
     */
    private $studentVisasRepository;

    private $pageRepository;
    private $viewFrontendPath;

    /**
     * StudentVisaController constructor.
     *
     * @param \App\Repositories\StudentVisa\StudentVisaRepository $studentVisasRepository
     * @param \App\Repositories\Core\Page\PageRepository                  $pageRepository
     *
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function __construct(StudentVisaRepository $studentVisasRepository, PageRepository $pageRepository)
    {
        $model = $studentVisasRepository->makeModel();
        $this->middleware('page_status:' . get_class($model));

        $this->studentVisasRepository = $studentVisasRepository;
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
        return $this->studentVisasRepository;
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
