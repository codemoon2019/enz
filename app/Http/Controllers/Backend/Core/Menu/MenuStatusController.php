<?php

namespace App\Http\Controllers\Backend\Core\Menu;

use App\Repositories\Core\Menu\MenuRepository;
use HalcyonLaravel\Base\Controllers\Backend\StatusController;
use HalcyonLaravel\Base\Repository\BaseRepository;

/**
 * Class MenuStatusController
 *
 * @package App\Http\Controllers\Backend\Core\Menu
 */
class MenuStatusController extends StatusController
{
    protected $menuRepository;

    /**
     * MenuStatusController constructor.
     *
     * @param \App\Repositories\Core\Menu\MenuRepository $menuRepository
     */
    public function __construct(MenuRepository $menuRepository)
    {
        $this->menuRepository = $menuRepository;
        $model = app($menuRepository->model());
        $this->viewPath = $model::VIEW_BACKEND_PATH;
//        $this->route_path = $this->model::ROUTE_ADMIN_PATH;
        $this->middleware('permission:' . $model::permission('change-status'));
    }

    public function repository(): BaseRepository
    {
        return $this->menuRepository;
    }
}
