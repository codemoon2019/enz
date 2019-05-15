<?php

namespace Tests\Feature\Modules\Frontend\Career;

use App\Models\Career\Career;
use Tests\TestCase;

/**
 * Class CareerFeatureFrontendTest
 * @package Tests\Feature\Modules\Frontend\Career
 */
class CareerFeatureFrontendTest extends TestCase
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
    public function careerRouteFrontShowExist()
    {
        $model = Career::first();
        $this->get(route(Career::ROUTE_FRONTEND_PATH . '.show', $model))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function careerRouteFrontIndexExist()
    {
        $this->get(route(Career::ROUTE_FRONTEND_PATH . '.index'))
            ->assertStatus(200);
    }
}
