<?php

namespace App\Repositories\Institution;

use App\Models\Institution\Institution;
use HalcyonLaravel\Base\Repository\BaseRepository;

/**
 * Class InstitutionRepositoryEloquent
 *
 * @package App\Repositories\Institution
 */
class InstitutionRepositoryEloquent extends BaseRepository implements InstitutionRepository
{
    /**
     * InstitutionRepository constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->setObserver(new InstitutionObserver);
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Institution::class;
    }
}
