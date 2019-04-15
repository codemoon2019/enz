<?php

namespace Tests\Feature\Modules\Frontend\Testimonial;

use App\Models\Testimonial\Testimonial;
use Tests\TestCase;

/**
 * Class TestimonialFeatureFrontendTest
 * @package Tests\Feature\Modules\Frontend\Testimonial
 */
class TestimonialFeatureFrontendTest extends TestCase
{

    protected function setUp():void
    {
        parent::setUp();
        $this->markTestSkipped();
        $this->loginAsSystem();
    }

    /**
     * @test
     */
    public function testimonialRouteFrontShowExist()
    {
        $model = Testimonial::first();
        $this->get(route(Testimonial::ROUTE_FRONTEND_PATH . '.show', $model))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function testimonialRouteFrontIndexExist()
    {
        $this->get(route(Testimonial::ROUTE_FRONTEND_PATH . '.index'))
            ->assertStatus(200);
    }
}
