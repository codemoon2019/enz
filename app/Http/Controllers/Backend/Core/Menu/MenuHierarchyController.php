<?php

namespace App\Http\Controllers\Backend\Core\Menu;

use App\Models\Core\Menu\Menu as Model;
use App\Repositories\Core\Menu\MenuRepository;
use HalcyonLaravel\Base\Controllers\BaseController;
use HalcyonLaravel\Base\Repository\BaseRepository;
use Illuminate\Http\Request;

/**
 * Class MenuHierarchyController.
 */
class MenuHierarchyController extends BaseController
{
    /**
     * MenuHierarchyController constructor.
     */
    public function __construct()
    {
        $this->middleware('permission:' . implode(',', Model::permission(['hierarchy'])));
    }

    /**
     * @param string $routeKeyName
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function index(string $routeKeyName)
    {
        $model = $this->getModel($routeKeyName);
        return view($this->repository()->model()::VIEW_BACKEND_PATH . ".hierarchy.index", compact('model'));
    }

    public function repository(): BaseRepository
    {
        return resolve(MenuRepository::class);
    }

    /**
     * @param Request $request
     * @param string  $routeKeyName
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function table(Request $request, string $routeKeyName)
    {
        return $this->getData($routeKeyName);
    }

    private function getData($routeKeyName)
    {
        $model = $this->getModel($routeKeyName);

        $model->hierarchy = $this->repository()->getHierarchy($model, null, null, true);

        return response()->json(
            $model
        );
    }

    /**
     * @param Request $request
     * @param string  $routeKeyName
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function update(Request $request, string $routeKeyName)
    {
        $this->repository()->updateHierarchy($request->hierarchy);

        return $this->getData($routeKeyName);
    }
}
