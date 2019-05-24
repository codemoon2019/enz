<?php

namespace App\Http\Controllers\Frontend\Gallery;

use App\Repositories\Core\Page\PageRepository;
use App\Repositories\Gallery\GalleryRepository;
use HalcyonLaravel\Base\Controllers\BaseController as Controller;
use HalcyonLaravel\Base\Repository\BaseRepository;
use MetaTag;

/**
 * Class GalleryController
 *
 * @package App\Http\Controllers\Frontend\Gallery
 */
class GalleryController extends Controller
{
    /**
     * @var \App\Repositories\Gallery\GalleryRepository
     */
    private $galleriesRepository;

    private $pageRepository;
    private $viewFrontendPath;

    /**
     * GalleryController constructor.
     *
     * @param \App\Repositories\Gallery\GalleryRepository $galleriesRepository
     * @param \App\Repositories\Core\Page\PageRepository                  $pageRepository
     *
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function __construct(GalleryRepository $galleriesRepository, PageRepository $pageRepository)
    {
        $model = $galleriesRepository->makeModel();
        $this->middleware('page_status:' . get_class($model));

        $this->galleriesRepository = $galleriesRepository;
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
        return $this->galleriesRepository;
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
