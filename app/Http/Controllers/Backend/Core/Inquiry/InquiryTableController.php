<?php

namespace App\Http\Controllers\Backend\Core\Inquiry;

use App\Http\Controllers\Controller;
use App\Repositories\Core\Inquiry\InquiryRepository;
use DataTables;
use Illuminate\Http\Request;

/**
 * Class InquiryTableController
 *
 * @package App\Http\Controllers\Backend\Core\Inquiry
 */
class InquiryTableController extends Controller
{
    protected $inquiryRepository;

    /**
     * InquiryTableController constructor.
     *
     * @param \App\Repositories\Core\Inquiry\InquiryRepository $inquiryRepository
     */
    public function __construct(InquiryRepository $inquiryRepository)
    {
        $this->inquiryRepository = $inquiryRepository;
        $this->middleware('permission:' . implode(',', app($inquiryRepository->model())::permission(['index'])));
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return mixed
     * @throws \Exception
     */
    public function __invoke(Request $request)
    {
        return DataTables::of($this->inquiryRepository->table())
            ->escapeColumns(['id'])
            ->editColumn('consultation', function ($model) {
                return $model->consultation ? 'True' : 'False';
            })
            ->addColumn('actions', function ($model) {

                return $model->action_buttons;

                // return $model->actions('backend');
            })
            ->editColumn('updated_at', function ($model) {
                return $model->updated_at_formatted;
            })
            ->make(true);
    }
}
