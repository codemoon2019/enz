<?php
/**
 * Created by PhpStorm.
 * User: Lloric Mayuga Garcia <lloricode@gmail.com>
 * Date: 12/6/18
 * Time: 2:00 PM
 */

namespace App\Helpers\Frontend\Core\Menu;


use App\Models\Core\Menu\Menu as MenuModel;
use App\Repositories\Core\Domain\DomainRepository;
use App\Repositories\Core\Menu\MenuNodeRepository;
use App\Repositories\Core\Menu\MenuRepository;

class Menu
{
    protected $menuRepository;
    protected $nodeRepository;
    protected $domainRepository;
    protected $siteRepository;
    protected $currentDepth = 0;
    private $viewPath;
    private $menu;
    private $withActions;
    private $depth;

    /**
     * Menu constructor.
     *
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function __construct()
    {
        $this->menuRepository = app(MenuRepository::class);
        $this->nodeRepository = app(MenuNodeRepository::class);
        $this->domainRepository = app(DomainRepository::class);
        $this->viewPath = $this->menuRepository->makeModel()::VIEW_FRONTEND_PATH;
    }

    /**
     * @param $label
     * @param $key
     *
     * @return array
     */
    public function pluckData($label, $key): array
    {
        return $this->menuRepository->skipCriteria()->all([
            $label,
            $key
        ])->pluck($label, $key)->toArray();
    }

    /**
     * @param string $machineName
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|string
     * @throws \Exception
     */
    public function render(string $machineName)
    {
        $menu = $this->getByMachineName($machineName);
        if ($menu->status != 'enable') {
            return '';
        }
        $this->menu = $menu;
        $this->withActions = false;
        $this->depth = null;

//        $this->domain = $this->domainRepository->getInstanceByBaseUrl();
//        $menu->hierarchy = (new Hierarchy($menu, null, false))->hierarchy();
        $menu->hierarchy = $this->hierarchy();


        return view("{$this->viewPath}.templates.{$menu->template}")->with([
            'menu' => $menu
        ]);
    }

    /**
     * @param string $machineName
     *
     * @return \App\Models\Core\Menu\Menu
     */
    private function getByMachineName(string $machineName): MenuModel
    {
        $menu = $this->menuRepository
            ->skipCriteria()
            ->with(['nodes'])
            ->findWhere([
                'machine_name' => $machineName,
            ])->first();

        if (is_null($menu)) {
            abort(500, "Menu machine name [$machineName] not found.");
        }

        return $menu;
    }

    /**
     * @param int|null $parentID
     *
     * @return array
     * @throws \Exception
     */
    private function hierarchy(int $parentID = null)
    {
        $nodes = app('query.cache')->queryCache(function () use ($parentID) {
            return $this->domainRepository
                ->getInstanceByBaseUrl()->
                nodes()
                ->where([
                    'parent_id' => $parentID,
                    'menu_id' => $this->menu->id
                ])
                ->with(['menuable'])
                ->orderBy('order')
                ->get();
        }, $parentID);

//        $nodes = $this->nodes->where('parent_id', $parentID);
        $result = [];
        $this->currentDepth += 1;
        foreach ($nodes as $n => $node) {

            // check status
            $status = optional($node->menuable)->status;
            if (!is_null($status) && $status != 'enable') {
                continue;
            }

            if (is_null($this->depth) || !($this->currentDepth > $this->depth)) { // Check if there is depth defined
                if ($node->menuable) {
                    $node->type = $node->menuable::MODULE_NAME;
                }
                if ($this->withActions) {
                    $node->actions = $node->actions('backend', ['edit', 'destroy']);
                }
                $node->children = $this->hierarchy($node->id);
                $result[] = $node;
            }

        }

        return $result;
    }
}