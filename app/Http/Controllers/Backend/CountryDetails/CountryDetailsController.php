<?php

namespace App\Http\Controllers\Backend\CountryDetails;

use App\Repositories\CountryDetails\CountryDetailsRepository;
use HalcyonLaravel\Base\BaseableOptions;
use HalcyonLaravel\Base\Controllers\Backend\CRUDController;
use HalcyonLaravel\Base\Repository\BaseRepository;
use Illuminate\Database\Eloquent\Model as IlluminateModel;
use Illuminate\Http\Request;
use App\Models\Country\Country;

/**
 * Class CountryDetailsController
 *
 * @package App\Http\Controllers\Backend\CountryDetails
 */
class CountryDetailsController extends CRUDController
{
    /**
     * @var \App\Repositories\CountryDetails\CountryDetailsRepository
     */
    protected $countryDetailsRepository;

    /**
     * CountryDetailsController constructor.
     *
     * @param \App\Repositories\CountryDetails\CountryDetailsRepository $countryDetailsRepository
     *
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function __construct(CountryDetailsRepository $countryDetailsRepository)
    {
        $this->countryDetailsRepository = $countryDetailsRepository;
        parent::__construct();

        $model = $countryDetailsRepository->makeModel();

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

        $request = $request->all();

        $request['country_id'] = Country::whereSlug($request['country_id'])->first()->id;

        return array_merge($request, $data);

    }

    /**
     * @return \HalcyonLaravel\Base\Repository\BaseRepository
     */
    public function repository(): BaseRepository
    {
        return $this->countryDetailsRepository;
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
                'title' => "required",
            ])
            ->storeRuleMessages([
                'title.required' => 'The title field is required.',
            ])
            ->updateRules([
                'title' => "required",
            ])
            ->updateRuleMessages([
                'title.required' => 'The title field is required.',
            ]);
    }
    public function store(Request $request)
    {
        $baseableOptions = $this->crudRules($request);
        $this->validate($request, $baseableOptions->storeRules, $baseableOptions->storeRuleMessages);

        $data = $this->generateStub($request);
        $model = $this->repository()->create($data);

        return redirect()->route('admin.country-details.edit', [$model->slug, $model->country->slug])->withFlashSuccess('Success');

    }
    public function update(Request $request, String $routeKeyName)
    {
        $model = $this->getModel($routeKeyName);

        $baseableOptions = $this->crudRules($request, $model);
        $this->validate($request, $baseableOptions->updateRules, $baseableOptions->updateRuleMessages);

        $data = $this->generateStub($request, $model);
        $model = $this->repository()->update($data, $model->id);

        return redirect()->route('admin.country-details.edit', [$model->slug, $model->country->slug])->withFlashSuccess('Success');
    }
}
