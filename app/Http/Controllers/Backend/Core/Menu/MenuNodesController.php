<?php

namespace App\Http\Controllers\Backend\Core\Menu;

use App\Models\Core\Menu\Menu;
use App\Repositories\Core\Menu\MenuNodeRepository;
use App\Repositories\Core\Menu\MenuRepository;
use HalcyonLaravel\Base\Controllers\Backend\Traits\CRUDTrait;
use HalcyonLaravel\Base\Controllers\BaseController;
use HalcyonLaravel\Base\Repository\BaseRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Models\Core\Menu\MenuNode;

/**
 * Class MenuNodesController.
 */
class MenuNodesController extends BaseController
{
    use CRUDTrait;
    protected $menuRepository;
    protected $menuNodeRepository;

    /**
     * MenuNodesController constructor.
     *
     * @param \App\Repositories\Core\Menu\MenuNodeRepository $menuNodeRepository
     * @param \App\Repositories\Core\Menu\MenuRepository     $menuRepository
     *
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function __construct(MenuNodeRepository $menuNodeRepository, MenuRepository $menuRepository)
    {
        $this->menuNodeRepository = $menuNodeRepository;
        $this->menuRepository = $menuRepository;

        $menuNode = $menuNodeRepository->makeModel();
        $menu = $menuRepository->makeModel();

        $this->viewPath = $menu::VIEW_BACKEND_PATH;
        $this->routePath = $menu::ROUTE_ADMIN_PATH;

        $this->middleware('permission:' . $menuNode::permission('create'), ['only' => 'create']);
        $this->middleware('permission:' . $menuNode::permission('edit'), ['only' => 'edit']);
        $this->middleware('permission:' . $menuNode::permission('destroy'), ['only' => 'destroy']);
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create($routeKeyName)
    {
        $menu = Menu::whereSlug($routeKeyName)->first();

        return view('backend.core.menu.node.create', compact('menu'));
        // return view("{$this->viewPath}.create");

    }

    /**
     * @param string $menuRouteKeyName
     * @param string $routeKeyName
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function edit(string $menuRouteKeyName, string $routeKeyName)
    {

        $menu = $this->getMenu($menuRouteKeyName);
        $model = $this->getModel($routeKeyName);


        return view('backend.core.menu.node.edit', compact('menu', 'model'));
        // return view("{$this->viewPath}.edit")->with([
        //     'menu' => $this->getMenu($menuRouteKeyName),
        //     'model' => $this->getModel($routeKeyName),
        // ]);
    }

    /**
     * @param $menuRouteKeyName
     *
     * @return mixed
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    private function getMenu($menuRouteKeyName)
    {
        $menu = $this->menuRepository->skipCriteria()->findWhere([
            $this->menuRepository->makeModel()->getRouteKeyName() => $menuRouteKeyName,
        ])->first();

        if (is_null($menu)) {
            throw new ModelNotFoundException;
        }
        return $menu;
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param string                   $routeKeyName
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function store(Request $request, string $routeKeyName)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            // 'url' => 'required|url',
        ]);

        $menu = $this->getMenu($routeKeyName);

        $data = $this->generateStub($request, $menu);


        $model = $menu->nodes()->create(['name' => $data['name'], 'parent_id' => $data['parent_id'], 'url' => $data['url']]);

        cache()->flush();

        return redirect()->route('admin.menus.node.edit', [$menu->slug, $model->slug])->withFlasSuccess('New item created');
    }

    /**
     * @param Request $request
     * @param Menu    $menu
     * @param null    $model
     *
     * @return array
     */
    public function generateStub(Request $request, Menu $menu, $model = null): array
    {
        $data = $request->except(['_token', '_method', '_submission', 'options', 'parent_id']);
        $data['menu_id'] = $menu->id;
        $data['parent_id'] = str_contains($request->parent_id, ['_']) ? explode('_', $request->parent_id)[1] : null;
        if (!is_null($data['parent_id'])) {
            $parent = $this->model->where('id', $data['parent_id'])->with(['nodes'])->firstOrFail();
            $data['order'] = count($parent->nodes);
            if ($data['parent_id'] && $model && $model->id == $data['parent_id']) {
                $data['parent_id'] = null;
            }
        } else {
            $data['order'] = $menu->nodes()->whereNull('parent_id')->count();
        }
        $data['options'] = json_encode($request->options ?? []);
        return $data;
    }

    public function repository(): BaseRepository
    {
        return $this->menuNodeRepository;
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param string                   $menuRouteKeyName
     * @param string                   $routeKeyName
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     * @throws \Throwable
     */
    public function update(Request $request, string $menuRouteKeyName, string $routeKeyName)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            // 'a_target' => 'required|in:' . implode(',', array_keys(config('core.menu.a_target.attributes'))),
            'url' => 'nullable',
        ]);

        $menu = $this->getMenu($menuRouteKeyName);
        $model = $this->getModel($routeKeyName);
        $data = $this->generateStub($request, $menu);

        $model->update(['name' => $data['name'], 'url' => $data['url']]);

        cache()->flush();

        return redirect()->route('admin.menus.node.edit', [$menu->slug, $model->slug])->withFlasSuccess('New item updated');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param string                   $menuRouteKeyName
     * @param string                   $routeKeyName
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function destroy(Request $request, string $menuRouteKeyName, string $routeKeyName)
    {
        $menu = $this->getMenu($menuRouteKeyName);
        
        $model = $this->getModel($routeKeyName);
        
        $model->delete();
        
        cache()->flush();
        
        return redirect()->route('admin.menus.hierarchy', $menu->slug)->withFlasSuccess('Deleted');
    }
}
