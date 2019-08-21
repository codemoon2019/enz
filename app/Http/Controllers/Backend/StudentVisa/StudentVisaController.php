<?php

namespace App\Http\Controllers\Backend\StudentVisa;

use App\Repositories\StudentVisa\StudentVisaRepository;
use HalcyonLaravel\Base\BaseableOptions;
use HalcyonLaravel\Base\Controllers\Backend\CRUDController;
use HalcyonLaravel\Base\Repository\BaseRepository;
use Illuminate\Database\Eloquent\Model as IlluminateModel;
use Illuminate\Http\Request;

/**
 * Class StudentVisaController
 *
 * @package App\Http\Controllers\Backend\StudentVisa
 */
class StudentVisaController extends CRUDController
{
    /**
     * @var \App\Repositories\StudentVisa\StudentVisaRepository
     */
    protected $studentVisaRepository;

    /**
     * StudentVisaController constructor.
     *
     * @param \App\Repositories\StudentVisa\StudentVisaRepository $studentVisaRepository
     *
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function __construct(StudentVisaRepository $studentVisaRepository)
    {
        $this->studentVisaRepository = $studentVisaRepository;
        parent::__construct();

        $model = $studentVisaRepository->makeModel();

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
        $data = $request->except(['_token', '_method', '_submission']);

        return $data;
    }

    /**
     * @return \HalcyonLaravel\Base\Repository\BaseRepository
     */
    public function repository(): BaseRepository
    {
        return $this->studentVisaRepository;
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
                'icon' => ["required",function($attribute,$value,$fail){
                        $this->isSVG($attribute,$value,$fail);
                    }]
            ])
            ->storeRuleMessages([
                'title.required' => 'The title field is required.',
            ])
            ->updateRules([
                'title' => "required|max:255|unique:$table,title," . optional($model)->id,
                'icon' => [function($attribute,$value,$fail){
                    $this->isSVG($attribute,$value,$fail);
                }]
            ])
            ->updateRuleMessages([
                'title.required' => 'The title field is required.',
            ]);
    }

    private function isSVG($attribute,$value,$fail){
        if(!($value->getClientMimeType()=='image/svg+xml')){
            $fail('The '.$attribute.' is not an SVG file.');
        }
    }
}
