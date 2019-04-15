<?php

namespace Tests\Feature\Modules\Frontend\Why;

use App\Models\Why\Why;
use Tests\TestCase;

/**
 * Class WhyFeatureFrontendTest
 * @package Tests\Feature\Modules\Frontend\Why
 */
class WhyFeatureFrontendTest extends TestCase
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
    public function whyRouteFrontShowExist()
    {
        $model = Why::first();
        $this->get(route(Why::ROUTE_FRONTEND_PATH . '.show', $model))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function whyRouteFrontIndexExist()
    {
        $this->get(route(Why::ROUTE_FRONTEND_PATH . '.index'))
            ->assertStatus(200);
    }
}
