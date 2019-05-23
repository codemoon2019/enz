<?php

namespace App\Http\Controllers\Frontend\Linkages;

use App\Repositories\Core\Page\PageRepository;
use App\Repositories\Linkages\LinkagesRepository;
use HalcyonLaravel\Base\Controllers\BaseController as Controller;
use HalcyonLaravel\Base\Repository\BaseRepository;
use MetaTag;
use App\Models\Country\Country;

/**
 * Class LinkagesController
 *
 * @package App\Http\Controllers\Frontend\Linkages
 */
class LinkagesController extends Controller
{
    /**
     * @var \App\Repositories\Linkages\LinkagesRepository
     */
    private $linkagesRepository;

    private $pageRepository;
    private $viewFrontendPath;

    /**
     * LinkagesController constructor.
     *
     * @param \App\Repositories\Linkages\LinkagesRepository $linkagesRepository
     * @param \App\Repositories\Core\Page\PageRepository                  $pageRepository
     *
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function __construct(LinkagesRepository $linkagesRepository, PageRepository $pageRepository)
    {
        $model = $linkagesRepository->makeModel();
        $this->middleware('page_status:' . get_class($model));

        $this->linkagesRepository = $linkagesRepository;
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

        $country = Country::with('linkages')->get();

        return view("{$this->viewFrontendPath}.index", compact('page', 'country'));
    }

    /**
     * @return \HalcyonLaravel\Base\Repository\BaseRepository
     */
    public function repository(): BaseRepository
    {
        return $this->linkagesRepository;
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
