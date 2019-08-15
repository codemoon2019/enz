<?php

namespace App\Http\Controllers\Backend\OurTeam;

use App\Repositories\OurTeam\OurTeamRepository;
use HalcyonLaravel\Base\BaseableOptions;
use HalcyonLaravel\Base\Controllers\Backend\CRUDController;
use HalcyonLaravel\Base\Repository\BaseRepository;
use Illuminate\Database\Eloquent\Model as IlluminateModel;
use Illuminate\Http\Request;

/**
 * Class OurTeamController
 *
 * @package App\Http\Controllers\Backend\OurTeam
 */
class OurTeamController extends CRUDController
{
    /**
     * @var \App\Repositories\OurTeam\OurTeamRepository
     */
    protected $ourTeamRepository;

    /**
     * OurTeamController constructor.
     *
     * @param \App\Repositories\OurTeam\OurTeamRepository $ourTeamRepository
     *
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function __construct(OurTeamRepository $ourTeamRepository)
    {
        $this->ourTeamRepository = $ourTeamRepository;
        parent::__construct();

        $model = $ourTeamRepository->makeModel();

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

        $data = $request->all();

        $data['status']         = $request->status ? 'enable' : 'disabled';
        $data['featured_image'] = $request->featured_image;
        $data['image']          = $request->image;

        return $data;

        // $data = [
        //     'meta' => $request->meta,
        // ];

        // $model = $this->repository()->makeModel();

        // return array_merge($request->only($model->getFillable()), $data);
    }

    /**
     * @return \HalcyonLaravel\Base\Repository\BaseRepository
     */
    public function repository(): BaseRepository
    {
        return $this->ourTeamRepository;
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
                'title.required' => 'The name field is required.',
            ])
            ->updateRules([
                'title' => "required|max:255|unique:$table,title," . optional($model)->id,
            ])
            ->updateRuleMessages([
                'title.required' => 'The name field is required.',
            ]);
    }
}
