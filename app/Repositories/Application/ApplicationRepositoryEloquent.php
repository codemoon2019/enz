<?php

namespace App\Repositories\Application;

use App\Models\Application\Application;
use HalcyonLaravel\Base\Repository\BaseRepository;

/**
 * Class ApplicationRepositoryEloquent
 *
 * @package App\Repositories\Application
 */
class ApplicationRepositoryEloquent extends BaseRepository implements ApplicationRepository
{
    /**
     * ApplicationRepository constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->setObserver(new ApplicationObserver);
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Application::class;
    }
}
