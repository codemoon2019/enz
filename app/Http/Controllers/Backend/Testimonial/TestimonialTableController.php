<?php

namespace App\Http\Controllers\Backend\Testimonial;

use DataTables;
use App\Repositories\Testimonial\TestimonialRepository;
use HalcyonLaravel\Base\Controllers\BaseController;
use HalcyonLaravel\Base\Repository\BaseRepository;
use Illuminate\Http\Request;

/**
 * Class TestimonialTableController
 *
 * @package App\Http\Controllers\Backend\Testimonial
 */
class TestimonialTableController extends BaseController
{
    /**
     * @var \App\Repositories\Testimonial\TestimonialRepository
     */
    protected $testimonialRepository;

    /**
     * TestimonialTableController constructor.
     *
     * @param \App\Repositories\Testimonial\TestimonialRepository $testimonialRepository
     *
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function __construct(TestimonialRepository $testimonialRepository)
    {
        $this->testimonialRepository = $testimonialRepository;
        $model = $testimonialRepository->makeModel();

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
        return $this->testimonialRepository;
    }
}
