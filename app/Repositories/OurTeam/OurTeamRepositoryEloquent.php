<?php

namespace App\Repositories\OurTeam;

use App\Models\OurTeam\OurTeam;
use HalcyonLaravel\Base\Repository\BaseRepository;

/**
 * Class OurTeamRepositoryEloquent
 *
 * @package App\Repositories\OurTeam
 */
class OurTeamRepositoryEloquent extends BaseRepository implements OurTeamRepository
{
    /**
     * OurTeamRepository constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->setObserver(new OurTeamObserver);
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return OurTeam::class;
    }
}
