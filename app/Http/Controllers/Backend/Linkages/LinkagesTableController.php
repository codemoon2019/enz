<?php

namespace App\Http\Controllers\Backend\Linkages;

use DataTables;
use App\Repositories\Linkages\LinkagesRepository;
use HalcyonLaravel\Base\Controllers\BaseController;
use HalcyonLaravel\Base\Repository\BaseRepository;
use Illuminate\Http\Request;

/**
 * Class LinkagesTableController
 *
 * @package App\Http\Controllers\Backend\Linkages
 */
class LinkagesTableController extends BaseController
{
    /**
     * @var \App\Repositories\Linkages\LinkagesRepository
     */
    protected $linkagesRepository;

    /**
     * LinkagesTableController constructor.
     *
     * @param \App\Repositories\Linkages\LinkagesRepository $linkagesRepository
     *
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function __construct(LinkagesRepository $linkagesRepository)
    {
        $this->linkagesRepository = $linkagesRepository;
        $model = $linkagesRepository->makeModel();

        $this->middleware('permission:' . $model::permission('index'), ['only' => ['__invoke']]);
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return mixed
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function __invoke(Request $request)
    {
        return DataTables::of($this->repository()->table())
            ->editColumn('updated_at', function ($model) {
                return $model->updated_at->timezone(get_user_timezone())->format(config('core.setting.formats.datetime_12'));
            })
            ->addColumn('actions', function ($model) {
                return $model->actions('backend', ['show', 'edit', 'destroy']);
            })
            ->make(true);
    }

    /**
     * @return BaseRepository
     */
    public function repository(): BaseRepository
    {
        return $this->linkagesRepository;
    }
}
