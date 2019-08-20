<?php

namespace App\Http\Controllers\Backend\BecomeOurClientInquiry;

use DataTables;
use App\Repositories\BecomeOurClientInquiry\BecomeOurClientInquiryRepository;
use HalcyonLaravel\Base\Controllers\BaseController;
use HalcyonLaravel\Base\Repository\BaseRepository;
use Illuminate\Http\Request;

/**
 * Class BecomeOurClientInquiryTableController
 *
 * @package App\Http\Controllers\Backend\BecomeOurClientInquiry
 */
class BecomeOurClientInquiryTableController extends BaseController
{
    /**
     * @var \App\Repositories\BecomeOurClientInquiry\BecomeOurClientInquiryRepository
     */
    protected $becomeOurClientInquiryRepository;

    /**
     * BecomeOurClientInquiryTableController constructor.
     *
     * @param \App\Repositories\BecomeOurClientInquiry\BecomeOurClientInquiryRepository $becomeOurClientInquiryRepository
     *
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function __construct(BecomeOurClientInquiryRepository $becomeOurClientInquiryRepository)
    {
        $this->becomeOurClientInquiryRepository = $becomeOurClientInquiryRepository;
        $model = $becomeOurClientInquiryRepository->makeModel();

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
            ->escapeColumns(['id'])
            ->editColumn('id', function ($model) {
                return $model->id;
            })
            ->editColumn('updated_at', function ($model) {
                return $model->updated_at->timezone(get_user_timezone())->format(config('core.setting.formats.datetime_12'));
            })
            ->addColumn('actions', function ($model) {

                return $model->action_buttons;

            })
 
            ->make(true);
    }

    /**
     * @return BaseRepository
     */
    public function repository(): BaseRepository
    {
        return $this->becomeOurClientInquiryRepository;
    }
}
