<?php

namespace App\Repositories\StudentVisa;

use App\Models\StudentVisa\StudentVisa;
use HalcyonLaravel\Base\Repository\BaseRepository;

/**
 * Class StudentVisaRepositoryEloquent
 *
 * @package App\Repositories\StudentVisa
 */
class StudentVisaRepositoryEloquent extends BaseRepository implements StudentVisaRepository
{
    /**
     * StudentVisaRepository constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->setObserver(new StudentVisaObserver);
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return StudentVisa::class;
    }
}
