<?php

namespace App\Repositories\Core\Menu;

use App\Criterion\Eloquent\ThisOrderByCriteria;
use App\Models\Core\Menu\MenuNode;
use HalcyonLaravel\Base\Repository\BaseRepository;
use Illuminate\Support\Arr;

/**
 * Class MenuNodeRepositoryEloquent
 *
 * @package App\Repositories\Core\Menu
 */
class MenuNodeRepositoryEloquent extends BaseRepository implements MenuNodeRepository
{

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return MenuNode::class;
    }

    /**
     * @param $data
     *
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function updateHierarchy($data)
    {
        $updateNodeClosure = function ($models, $node, $order, $parentID = null) use (&$updateNodeClosure) {

            if (array_key_exists('id', $node) && $node['id']) {

                $this->update([
                    'order' => $order,
                    'parent_id' => $parentID
                ], $node['id']);
            }

            foreach (Arr::get($node, 'children', []) as $key => $child) {
                $updateNodeClosure($models, $child, $key, $node['id']);
            }

        };

        $this->pushCriteria(new ThisOrderByCriteria('order'));
        $models = $this->get();

        foreach ($data as $order => $node) {
            $updateNodeClosure($models, $node, $order);
        }
    }
}
