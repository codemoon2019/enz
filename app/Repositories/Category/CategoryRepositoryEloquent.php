<?php

namespace App\Repositories\Category;

use App\Criterion\Eloquent\ThisOrderByCriteria;
use App\Models\Category\Category;
use HalcyonLaravel\Base\Repository\BaseRepository as Repository;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;

/**
 * Class CategoryRepositoryEloquent
 *
 * @package App\Repositories\Category
 */
class CategoryRepositoryEloquent extends Repository implements CategoryRepository
{
    protected $currentDepth = 0;

    public function loadObserver()
    {
        $this->setObserver(new CategoryObserver);
    }

    public function inForm(Category $category = null): array
    {
        $list = parent::all([
            'title',
            'id',
        ]);

        if (!is_null($category)) {
            $list = $list->filter(function ($item) use ($category) {
                return $item->id !== $category->id;
            });
        }
        return $list->pluck('title', 'id')->toArray();
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

            foreach (array_get($node, 'children', []) as $key => $child) {
                $updateNodeClosure($models, $child, $key, $node['id']);
            }

        };

        $this->pushCriteria(new ThisOrderByCriteria('order'));
        $models = $this->get();

        foreach ($data as $order => $node) {
            $updateNodeClosure($models, $node, $order);
        }
    }


    /**
     * Return the category based on the depth of the link.
     *
     * @param $queries
     *
     * @return mixed
     */
    public function getModel($queries)
    {
        $keys = explode('/', $queries);
        if (count($keys) > 1) {
            $models = [];
            foreach ($keys as $k => $key) {
                if ($k < count($keys) - 1) {
                    if (count($models)) {
                        $models[$k] = $models[$k - 1]->children()->where($this->model->getRouteKeyName(),
                            $key)->first();
                    } else {
                        $models[$k] = $this->model->where($this->model->getRouteKeyName(), $key)->firstOrFail();
                    }
                } else {
                    return $models[$k - 1]->children()->where($this->model->getRouteKeyName(), $key)->firstOrFail();
                }
            }
        }
        return $this->model->where($this->model->getRouteKeyName(), $keys[0])->firstOrFail();
    }

    /**
     * Return the category's related models and it's preceding hierarchy.
     *
     * @param $model
     *
     * @return LengthAwarePaginator
     */
    public function getModelRelations($model)
    {
        $lists = $model->children
            ->each(function ($item) {
                $item->relation_type = 'category';
            });
        foreach ($model->getRelations() as $k => $relation) {
            $lists = $lists->merge(
                $relation
                    ->each(function ($item) use ($k) {
                        if ($k != 'children') {
                            $item->relation_type = str_singular($k);
                        }
                    })
            );
        }
        return $this->paginate_($lists, 12)->withPath(request()->url());
    }

    /**
     * Laravel Paginate Collection or Array.
     *
     * @param array|Collection $items
     * @param int              $perPage
     * @param int              $page
     * @param array            $options
     *
     * @return LengthAwarePaginator
     */
    private function paginate_($items, $perPage = 15, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }

    /**
     * @param int|null $parentID
     * @param int|null $depth
     * @param bool     $withActions
     *
     * @return array
     */
    public function getHierarchy(int $parentID = null, int $depth = null, bool $withActions = false)
    {

        $models = $this->skipCriteria()
            ->orderBy('order')
            ->findWhere(['parent_id' => $parentID])
            ->all();

        $result = [];
        $this->currentDepth += 1;
        foreach ($models as $n => $node) {
            if (is_null($depth) || !($this->currentDepth > $depth)) { // Check if there is depth defined
                if ($withActions) {
                    $node->actions = $node->actions('backend', ['edit', 'destroy']);
                }
                $node->children = $this->getHierarchy($node->id);
                $result[] = $node;
            }
        }

        return $result;
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Category::class;
    }
}
