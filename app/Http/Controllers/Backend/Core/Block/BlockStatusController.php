<?php

namespace App\Http\Controllers\Backend\Core\Block;

use App\Repositories\Core\Block\BlockRepository;
use HalcyonLaravel\Base\Controllers\Backend\StatusController;
use HalcyonLaravel\Base\Repository\BaseRepository;

/**
 * Class BlockStatusController.
 */
class BlockStatusController extends StatusController
{
    protected $blockRepository;

    public function __construct(BlockRepository $blockRepository)
    {
        $this->blockRepository = $blockRepository;
        $this->viewPath = app($blockRepository->model())::VIEW_BACKEND_PATH;
        //$this->route_path   = $this->model::ROUTE_ADMIN_PATH;
    }

    public function repository(): BaseRepository
    {
        return $this->blockRepository;
    }
}
