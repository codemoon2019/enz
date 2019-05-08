<?php

namespace App\Http\Controllers\Backend\CountryDetails;

use DataTables;
use App\Repositories\CountryDetails\CountryDetailsRepository;
use HalcyonLaravel\Base\Controllers\BaseController;
use HalcyonLaravel\Base\Repository\BaseRepository;
use Illuminate\Http\Request;

/**
 * Class CountryDetailsTableController
 *
 * @package App\Http\Controllers\Backend\CountryDetails
 */
class CountryDetailsTableController extends BaseController
{
    /**
     * @var \App\Repositories\CountryDetails\CountryDetailsRepository
     */
    protected $countryDetailsRepository;

    /**
     * CountryDetailsTableController constructor.
     *
     * @param \App\Repositories\CountryDetails\CountryDetailsRepository $countryDetailsRepository
     *
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function __construct(CountryDetailsRepository $countryDetailsRepository)
    {
        $this->countryDetailsRepository = $countryDetailsRepository;
        $model = $countryDetailsRepository->makeModel();

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
        return $this->countryDetailsRepository;
    }
}
