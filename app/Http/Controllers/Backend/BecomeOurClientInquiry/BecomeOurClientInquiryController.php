<?php

namespace App\Http\Controllers\Backend\BecomeOurClientInquiry;

use App\Repositories\BecomeOurClientInquiry\BecomeOurClientInquiryRepository;
use HalcyonLaravel\Base\BaseableOptions;
use HalcyonLaravel\Base\Controllers\Backend\CRUDController;
use HalcyonLaravel\Base\Repository\BaseRepository;
use Illuminate\Database\Eloquent\Model as IlluminateModel;
use Illuminate\Http\Request;

use App\Models\BecomeOurClientInquiry\BecomeOurClientInquiry;
use File;
use Response;
use Storage;

/**
 * Class BecomeOurClientInquiryController
 *
 * @package App\Http\Controllers\Backend\BecomeOurClientInquiry
 */
class BecomeOurClientInquiryController extends CRUDController
{
    /**
     * @var \App\Repositories\BecomeOurClientInquiry\BecomeOurClientInquiryRepository
     */
    protected $becomeOurClientInquiryRepository;

    /**
     * BecomeOurClientInquiryController constructor.
     *
     * @param \App\Repositories\BecomeOurClientInquiry\BecomeOurClientInquiryRepository $becomeOurClientInquiryRepository
     *
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function __construct(BecomeOurClientInquiryRepository $becomeOurClientInquiryRepository)
    {
        $this->becomeOurClientInquiryRepository = $becomeOurClientInquiryRepository;
        parent::__construct();

        $model = $becomeOurClientInquiryRepository->makeModel();

        $this->middleware('permission:' . $model::permission('index'), ['only' => ['index']]);
        $this->middleware('permission:' . $model::permission('show'), ['only' => ['show']]);
        $this->middleware('permission:' . $model::permission('create'), ['only' => ['create', 'store']]);
        $this->middleware('permission:' . $model::permission('edit'), ['only' => ['update', 'edit']]);
        $this->middleware('permission:' . $model::permission('destroy'), ['only' => ['destroy']]);
    }

    /**
     * @param \Illuminate\Http\Request                 $request
     * @param \Illuminate\Database\Eloquent\Model|null $model
     *
     * @return array
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function generateStub(Request $request, IlluminateModel $model = null): array
    {
        $data = [
            'meta' => $request->meta,
        ];

        $model = $this->repository()->makeModel();

        return array_merge($request->only($model->getFillable()), $data);
    }

    /**
     * @return \HalcyonLaravel\Base\Repository\BaseRepository
     */
    public function repository(): BaseRepository
    {
        return $this->becomeOurClientInquiryRepository;
    }

    /**
     * Validate input on store/update
     *
     * @param \Illuminate\Http\Request                 $request
     * @param \Illuminate\Database\Eloquent\Model|null $model
     *
     * @return \HalcyonLaravel\Base\BaseableOptions
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function crudRules(Request $request, IlluminateModel $model = null): BaseableOptions
    {
        $table = $this->repository()->makeModel()->getTable();

        return BaseableOptions::create()
            ->storeRules([
                'title' => "required|max:255|unique:$table",
            ])
            ->storeRuleMessages([
                'title.required' => 'The title field is required.',
            ])
            ->updateRules([
                'title' => "required|max:255|unique:$table,title," . optional($model)->id,
            ])
            ->updateRuleMessages([
                'title.required' => 'The title field is required.',
            ]);
    }

    public function download(string $routeKeyName)
    {
        $inquiry = BecomeOurClientInquiry::whereSlug($routeKeyName)->first();

        $file = json_decode($inquiry->file);

        $path = storage_path('app/public/client_inquiry/' . $file[1]);

        if (!File::exists($path)) {
            abort(404);
        }

        return response()->download($path, $file[0]);
       
    }
}
