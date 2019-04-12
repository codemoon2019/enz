<?php

namespace App\Http\Controllers\Backend\Core\Block;

use App\Http\Controllers\Controller;
use App\Repositories\Core\Block\BlockRepository;
use DataTables;
use Illuminate\Http\Request;

/**
 * Class BlockTableController.
 */
class BlockTableController extends Controller
{
    protected $blockRepository;

    /**
     * BlockTableController constructor.
     *
     * @param BlockRepository $blockRepository
     */
    public function __construct(BlockRepository $blockRepository)
    {
        $this->blockRepository = $blockRepository;
    }

    /**
     * @param Request $request
     *
     * @return mixed
     * @throws \Exception
     */
    public function __invoke(Request $request)
    {
        $user = auth()->user();
        // $can = $user->can(resolve($this->blockRepository->model())::permission('change-status'));
        return DataTables::of($this->blockRepository->table($request->except(['_token', '_method'])))
            ->escapeColumns(['id'])
            ->editColumn('updated_at', function ($model) {
                return $model->updated_at->format(config('core.setting.formats.datetime_12'));
            })
            ->addColumn('actions', function ($model) {
                return $model->actions('backend');
            })
            ->make(true);
    }
}
