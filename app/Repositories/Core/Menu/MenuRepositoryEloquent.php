<?php

namespace App\Repositories\Core\Menu;

use App\Models\Core\Menu\Menu;
use App\Repositories\Core\Domain\DomainRepository;
use HalcyonLaravel\Base\Repository\BaseRepository;

/**
 * Class MenuRepositoryEloquent
 *
 * @package App\Repositories\Core\Menu
 */
class MenuRepositoryEloquent extends BaseRepository implements MenuRepository
{

    protected $currentDepth = 0;
    protected $nodeRepository;
    protected $domainRepository;

    public function __construct()
    {
        parent::__construct();
        $this->nodeRepository = resolve(MenuNodeRepository::class);
        $this->domainRepository = resolve(DomainRepository::class);
    }

    public function loadObserver()
    {
        $this->setObserver(new MenuObserver);
    }

    public function updateHierarchy($data)
    {
        $this->nodeRepository->updateHierarchy($data);
    }

    /**
     * @param \App\Models\Core\Menu\Menu $menu
     * @param int|null                   $parentID
     * @param int|null                   $depth
     * @param bool                       $withActions
     *
     * @return array
     */
    public function getHierarchy(Menu $menu, int $parentID = null, int $depth = null, bool $withActions = false)
    {
        $nodes = app('query.cache')->queryCache(function () use ($parentID, $menu) {
            return $this->domainRepository
                ->getInstanceByBaseUrl(app('request')->get('domain-name'))
                ->nodes()
                ->orderBy('order')
                ->where([
                    'parent_id' => $parentID,
                    'menu_id' => $menu->id,
                ])
                ->get();
        }, [
            'parent_id' => $parentID,
            'menu_id' => $menu->id,
            'domain_name' => app('request')->get('domain-name'),
        ]);


        $result = [];
        $this->currentDepth += 1;
        foreach ($nodes as $node) {

            // check status
            $status = optional($node->menuable)->status;
            if (!is_null($status) && $status != 'enable') {
                continue;
            }

            if (is_null($depth) || !($this->currentDepth > $depth)) { // Check if there is depth defined

                if ($node->menuable) {
                    $node->type = $node->menuable::MODULE_NAME;
                }
                if ($withActions) {
                    $node->actions = $node->actions('backend', ['edit', 'destroy']);
                }
                $node->children = $this->getHierarchy($menu, $node->id);

                $result[] = $node;
            }

        }

//        $menu->hierarchy=$result;
//       return $menu;
        return $result;

    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Menu::class;
    }
}
