<?php

namespace App\Http\Controllers\Frontend\Institution;

use App\Repositories\Core\Page\PageRepository;
use App\Repositories\Institution\InstitutionRepository;
use HalcyonLaravel\Base\Controllers\BaseController as Controller;
use HalcyonLaravel\Base\Repository\BaseRepository;
use MetaTag;

/**
 * Class InstitutionController
 *
 * @package App\Http\Controllers\Frontend\Institution
 */
class InstitutionController extends Controller
{
    /**
     * @var \App\Repositories\Institution\InstitutionRepository
     */
    private $institutionsRepository;

    private $pageRepository;
    private $viewFrontendPath;

    /**
     * InstitutionController constructor.
     *
     * @param \App\Repositories\Institution\InstitutionRepository $institutionsRepository
     * @param \App\Repositories\Core\Page\PageRepository                  $pageRepository
     *
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function __construct(InstitutionRepository $institutionsRepository, PageRepository $pageRepository)
    {
        $model = $institutionsRepository->makeModel();
        $this->middleware('page_status:' . get_class($model));

        $this->institutionsRepository = $institutionsRepository;
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
        return $this->institutionsRepository;
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
