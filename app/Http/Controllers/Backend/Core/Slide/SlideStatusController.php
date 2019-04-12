<?php

namespace App\Http\Controllers\Backend\Core\Slide;

use App\Repositories\Core\Slide\SlideRepository;
use HalcyonLaravel\Base\Controllers\Backend\StatusController;
use HalcyonLaravel\Base\Repository\BaseRepository;

/**
 * Class SlideStatusController.
 */
class SlideStatusController extends StatusController
{
    protected $slideRepository;

    public function __construct(SlideRepository $slideRepository)
    {
        $this->slideRepository = $slideRepository;
        $model = resolve($slideRepository->model());
        $this->viewPath = $model::VIEW_BACKEND_PATH;
//        $this->route_path = $model::ROUTE_ADMIN_PATH;
        $this->middleware('permission:' . $model::permission('change-status'));
    }

    public function repository(): BaseRepository
    {
        return $this->slideRepository;
    }
}
