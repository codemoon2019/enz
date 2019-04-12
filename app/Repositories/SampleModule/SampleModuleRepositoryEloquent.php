<?php

namespace App\Repositories\SampleModule;

use App\Models\SampleModule\SampleModule;
use HalcyonLaravel\Base\Repository\BaseRepository;

/**
 * Class SampleModuleRepositoryEloquent
 *
 * @package App\Repositories\SampleModule
 */
class SampleModuleRepositoryEloquent extends BaseRepository implements SampleModuleRepository
{
    /**
     * SampleModuleRepository constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->setObserver(new SampleModuleObserver);
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return SampleModule::class;
    }
}
