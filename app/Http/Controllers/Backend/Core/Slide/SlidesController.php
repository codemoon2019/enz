<?php

namespace App\Http\Controllers\Backend\Core\Slide;

use App\Repositories\Core\Slide\SlideRepository;
use HalcyonLaravel\Base\BaseableOptions;
use HalcyonLaravel\Base\Controllers\Backend\CRUDController;
use HalcyonLaravel\Base\Repository\BaseRepository;
use Illuminate\Database\Eloquent\Model as IlluminateModel;
use Illuminate\Http\Request;

/**
 * Class SlidesController
 *
 * @package App\Http\Controllers\Backend\Core\Slide
 */
class SlidesController extends CRUDController
{
    protected $slideRepository;

    /**
     * SlidesController constructor.
     *
     * @param SlideRepository $slideRepository
     */
    public function __construct(SlideRepository $slideRepository)
    {
        $this->slideRepository = $slideRepository;
        parent::__construct();

        $model = app($slideRepository->model());
        $this->middleware('permission:' . $model::permission('index'), ['only' => 'index']);
//        $this->middleware('permission:' . $model::permission('show'), ['only' => 'show']);
//        $this->middleware('permission:' . $model::permission('create'), ['only' => ['create', 'store']]);
        $this->middleware('permission:' . $model::permission('edit'), ['only' => ['edit', 'update']]);
        $this->middleware('permission:' . $model::permission('destroy'), ['only' => 'destroy']);
    }

    /**
     * @param \Illuminate\Http\Request            $request
     * @param \Illuminate\Database\Eloquent\Model $model
     *
     * @return array
     */
    public function generateStub(Request $request, IlluminateModel $model = null): array
    {
        $data = $request->only(['title', 'description']);
        $data['machine_name'] = str_slug($request['title']);
        $data['status'] = array_keys((app($this->repository()->model()))->statuses())[$request->status ? 0 : 1];
        return $data;
    }

    public function repository(): BaseRepository
    {
        return $this->slideRepository;
    }

    /**
     * @param Request              $request
     * @param IlluminateModel|null $model
     *
     * @return BaseableOptions
     */
    public function crudRules(Request $request, IlluminateModel $model = null): BaseableOptions
    {
        return BaseableOptions::create()
            ->storeRules([
                'title' => 'required|max:100',
                'images' => 'sometimes|required',
                'images.*' => 'mimes:png,jpg,jpeg',
            ])
            ->updateRules([
                'title' => 'required|max:100',
                'images' => 'sometimes|required',
                'images.*' => 'mimes:png,jpg,jpeg',
            ]);
    }
}
