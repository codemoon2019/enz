<?php

namespace App\Repositories\Core\Page;

use App\Models\Core\Page\Page;
use HalcyonLaravel\Base\Repository\BaseRepository;

/**
 * Class PageRepositoryEloquent
 *
 * @package App\Repositories\Core\Page
 */
class PageRepositoryEloquent extends BaseRepository implements PageRepository
{

    public function __construct()
    {
        parent::__construct();
        $this->setObserver(new PageObserver);
    }

    /**
     * @param string $pageName
     * @param array  $with
     *
     * @return \App\Models\Core\Page\Page
     */
    public function indexPage(string $pageName, array $with = ['menuable', 'metaTag']): Page
    {
        $page = $this->skipCriteria()
            ->with($with)
            ->findWhere([
                'pageable_type' => $pageName,
            ])->first();

        if (is_null($page)) {
            abort(404, "Page name [$pageName] not found.");
        }

        return $page;
    }

    /**
     * @param array|null $request
     * @param array      $fields
     * @param bool       $isAllFillable
     *
     * @return mixed
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function table(array $request = null, array $fields = [], bool $isAllFillable = true)
    {
//        $statusKey = $this->model->statusKeyName();
//        if (array_key_exists($statusKey, $request)) {
//            $this->pushCriteria(new ThisEqualThatCriteria($statusKey, $request[$statusKey]));
//        }

        $this->applyCriteria();
        $this->applyScope();

        $builder = $this->model->select(['id', 'title', 'slug', 'updated_at', 'pageable_type']);

        $this->resetModel();
        $this->resetScope();

        return $builder;
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Page::class;
    }
}
