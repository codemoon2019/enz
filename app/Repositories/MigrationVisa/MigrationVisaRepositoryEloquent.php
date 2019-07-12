<?php

namespace App\Repositories\MigrationVisa;

use App\Models\MigrationVisa\MigrationVisa;
use HalcyonLaravel\Base\Repository\BaseRepository;

/**
 * Class MigrationVisaRepositoryEloquent
 *
 * @package App\Repositories\MigrationVisa
 */
class MigrationVisaRepositoryEloquent extends BaseRepository implements MigrationVisaRepository
{
    /**
     * MigrationVisaRepository constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->setObserver(new MigrationVisaObserver);
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return MigrationVisa::class;
    }
}
