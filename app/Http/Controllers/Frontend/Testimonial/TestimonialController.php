<?php

namespace App\Http\Controllers\Frontend\Testimonial;

use App\Repositories\Core\Page\PageRepository;
use App\Repositories\Testimonial\TestimonialRepository;
use HalcyonLaravel\Base\Controllers\BaseController as Controller;
use HalcyonLaravel\Base\Repository\BaseRepository;
use MetaTag;

/**
 * Class TestimonialController
 *
 * @package App\Http\Controllers\Frontend\Testimonial
 */
class TestimonialController extends Controller
{
    /**
     * @var \App\Repositories\Testimonial\TestimonialRepository
     */
    private $testimonialsRepository;

    private $pageRepository;
    private $viewFrontendPath;

    /**
     * TestimonialController constructor.
     *
     * @param \App\Repositories\Testimonial\TestimonialRepository $testimonialsRepository
     * @param \App\Repositories\Core\Page\PageRepository                  $pageRepository
     *
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function __construct(TestimonialRepository $testimonialsRepository, PageRepository $pageRepository)
    {
        $model = $testimonialsRepository->makeModel();
        $this->middleware('page_status:' . get_class($model));

        $this->testimonialsRepository = $testimonialsRepository;
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
        return $this->testimonialsRepository;
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
