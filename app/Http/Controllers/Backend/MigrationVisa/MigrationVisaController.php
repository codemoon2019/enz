<?php

namespace App\Http\Controllers\Backend\MigrationVisa;

use App\Repositories\MigrationVisa\MigrationVisaRepository;
use HalcyonLaravel\Base\BaseableOptions;
use HalcyonLaravel\Base\Controllers\Backend\CRUDController;
use HalcyonLaravel\Base\Repository\BaseRepository;
use Illuminate\Database\Eloquent\Model as IlluminateModel;
use Illuminate\Http\Request;
use App\Models\MigrationVisa\MigrationVisa;
use File;
use Response;
use Storage;


/**
 * Class MigrationVisaController
 *
 * @package App\Http\Controllers\Backend\MigrationVisa
 */
class MigrationVisaController extends CRUDController
{
    /**
     * @var \App\Repositories\MigrationVisa\MigrationVisaRepository
     */
    protected $migrationVisaRepository;

    /**
     * MigrationVisaController constructor.
     *
     * @param \App\Repositories\MigrationVisa\MigrationVisaRepository $migrationVisaRepository
     *
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function __construct(MigrationVisaRepository $migrationVisaRepository)
    {
        $this->migrationVisaRepository = $migrationVisaRepository;
        parent::__construct();

        $model = $migrationVisaRepository->makeModel();

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
        return $this->migrationVisaRepository;
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
        $inquiry = MigrationVisa::whereSlug($routeKeyName)->first();

        $resume = json_decode($inquiry->resume);

        $path = storage_path('app/public/inquiry/' . $resume[1]);

        if (!File::exists($path)) {
            abort(404);
        }

        return response()->download($path, $resume[0]);
       
    }
}
