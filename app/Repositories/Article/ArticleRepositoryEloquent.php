<?php

namespace App\Repositories\Article;

use App\Models\Article\Article;
use HalcyonLaravel\Base\Repository\BaseRepository;

/**
 * Class ArticleRepositoryEloquent
 *
 * @package App\Repositories\Article
 */
class ArticleRepositoryEloquent extends BaseRepository implements ArticleRepository
{
    public function __construct()
    {
        parent::__construct();
        $this->setObserver(new ArticleObserver);
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Article::class;
    }
}
