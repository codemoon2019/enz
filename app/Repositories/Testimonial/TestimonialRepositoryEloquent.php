<?php

namespace App\Repositories\Testimonial;

use App\Models\Testimonial\Testimonial;
use HalcyonLaravel\Base\Repository\BaseRepository;

/**
 * Class TestimonialRepositoryEloquent
 *
 * @package App\Repositories\Testimonial
 */
class TestimonialRepositoryEloquent extends BaseRepository implements TestimonialRepository
{
    /**
     * TestimonialRepository constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->setObserver(new TestimonialObserver);
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Testimonial::class;
    }
}
