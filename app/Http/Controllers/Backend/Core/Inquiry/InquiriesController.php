<?php

namespace App\Http\Controllers\Backend\Core\Inquiry;

use App\Repositories\Core\Inquiry\InquiryRepository;
use HalcyonLaravel\Base\Controllers\BaseController;
use HalcyonLaravel\Base\Repository\BaseRepository;

/**
 * Class InquiriesController.
 */
class InquiriesController extends BaseController
{
    protected $inquiryRepository;

    /**
     * InquiriesController constructor.
     *
     * @param \App\Repositories\Core\Inquiry\InquiryRepository $inquiryRepository
     *
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function __construct(InquiryRepository $inquiryRepository)
    {
        $this->inquiryRepository = $inquiryRepository;
        $model = $inquiryRepository->makeModel();
        $this->middleware('permission:' . $model::permission('index'), ['only' => 'index']);
        $this->middleware('permission:' . $model::permission('show'), ['only' => 'show']);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function index()
    {
        return view($this->repository()->makeModel()::VIEW_BACKEND_PATH . '.index');
    }

    public function repository(): BaseRepository
    {
        return $this->inquiryRepository;
    }

    /**
     * @param string $routeKeyName
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function show(string $routeKeyName)
    {
        return view($this->repository()->makeModel()::VIEW_BACKEND_PATH . '.show')->with([
            'model' => $this->getModel($routeKeyName),
        ]);
    }
}