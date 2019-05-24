<?php

namespace App\Http\Controllers\Backend\Gallery;

use DataTables;
use App\Repositories\Gallery\GalleryRepository;
use HalcyonLaravel\Base\Controllers\BaseController;
use HalcyonLaravel\Base\Repository\BaseRepository;
use Illuminate\Http\Request;

/**
 * Class GalleryTableController
 *
 * @package App\Http\Controllers\Backend\Gallery
 */
class GalleryTableController extends BaseController
{
    /**
     * @var \App\Repositories\Gallery\GalleryRepository
     */
    protected $galleryRepository;

    /**
     * GalleryTableController constructor.
     *
     * @param \App\Repositories\Gallery\GalleryRepository $galleryRepository
     *
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function __construct(GalleryRepository $galleryRepository)
    {
        $this->galleryRepository = $galleryRepository;
        $model = $galleryRepository->makeModel();

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
        return $this->galleryRepository;
    }
}
