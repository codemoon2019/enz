<?php

namespace App\Http\Controllers\Backend\Core\Page;

use App\Repositories\Core\Page\PageRepository;
use HalcyonLaravel\Base\Controllers\Backend\StatusController;
use HalcyonLaravel\Base\Repository\BaseRepository;

/**
 * Class PageStatusController.
 */
class PageStatusController extends StatusController
{
    protected $pageRepository;

    /**
     * PageStatusController constructor.
     *
     * @param \App\Repositories\Core\Page\PageRepository $pageRepository
     *
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function __construct(PageRepository $pageRepository)
    {
        $this->pageRepository = $pageRepository;
        $model = $pageRepository->makeModel();
        $this->viewPath = $model::VIEW_BACKEND_PATH;
        $this->routePath = $model::ROUTE_ADMIN_PATH;
        // $this->middleware('permission:' . $model::permission('change-status'));
    }

    public function repository(): BaseRepository
    {
        return $this->pageRepository;
    }
}
