<?php

namespace App\Http\Controllers\Backend\Core\Menu;

use App\Repositories\Core\Menu\MenuRepository;
use HalcyonLaravel\Base\BaseableOptions;
use HalcyonLaravel\Base\Controllers\Backend\CRUDController;
use HalcyonLaravel\Base\Repository\BaseRepository;
use Illuminate\Database\Eloquent\Model as IlluminateModel;
use Illuminate\Http\Request;

/**
 * Class MenusController.
 */
class MenusController extends CRUDController
{
    protected $menuRepository;

    /**
     * MenusController constructor.
     *
     * @param \App\Repositories\Core\Menu\MenuRepository $menuRepository
     *
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function __construct(MenuRepository $menuRepository)
    {
        $this->menuRepository = $menuRepository;
        parent::__construct();
        $model = $menuRepository->makeModel();
        $this->middleware('permission:' . $model::permission('index'), ['only' => 'index']);
        $this->middleware('permission:' . $model::permission('show'), ['only' => 'show']);
        $this->middleware('permission:' . $model::permission('create'), ['only' => 'create']);
        $this->middleware('permission:' . $model::permission('edit'), ['only' => 'edit']);
        $this->middleware('permission:' . $model::permission('destroy'), ['only' => 'destroy']);
    }

    /**
     * @param \Illuminate\Http\Request            $request
     * @param \Illuminate\Database\Eloquent\Model $model
     *
     * @return array
     */
    public function generateStub(Request $request, IlluminateModel $model = null): array
    {
        $data = $request->except(['_token', '_method', '_submission', 'status']);
        $data['status'] = 'enable';
        $data['template'] = 'main-navbar';

        return $data;
    }

    /**
     * @param Request              $request
     * @param IlluminateModel|null $model
     *
     * @return BaseableOptions
     */
    public function crudRules(Request $request, IlluminateModel $model = null): BaseableOptions
    {
        return BaseableOptions::create()
            ->storeRules([
                'name' => 'sometimes|required|unique:menus|max:100',
                'depth' => 'required|integer|min:1|max:10',
                'template' => 'sometimes|required',
            ])
            ->updateRules([
                'name' => 'sometimes|required|max:100|unique:menus,name,' . optional($model)->id,
                'depth' => 'required|integer|min:1|max:10',
                'template' => 'sometimes|required',
            ]);
    }


    public function repository(): BaseRepository
    {
        return $this->menuRepository;
    }
}
