<?php

namespace App\Http\Controllers\Backend\TouristVisaInquiry;

use DataTables;
use App\Repositories\TouristVisaInquiry\TouristVisaInquiryRepository;
use HalcyonLaravel\Base\Controllers\BaseController;
use HalcyonLaravel\Base\Repository\BaseRepository;
use Illuminate\Http\Request;

/**
 * Class TouristVisaInquiryTableController
 *
 * @package App\Http\Controllers\Backend\TouristVisaInquiry
 */
class TouristVisaInquiryTableController extends BaseController
{
    /**
     * @var \App\Repositories\TouristVisaInquiry\TouristVisaInquiryRepository
     */
    protected $touristVisaInquiryRepository;

    /**
     * TouristVisaInquiryTableController constructor.
     *
     * @param \App\Repositories\TouristVisaInquiry\TouristVisaInquiryRepository $touristVisaInquiryRepository
     *
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function __construct(TouristVisaInquiryRepository $touristVisaInquiryRepository)
    {
        $this->touristVisaInquiryRepository = $touristVisaInquiryRepository;
        $model = $touristVisaInquiryRepository->makeModel();

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
        return $this->touristVisaInquiryRepository;
    }
}
