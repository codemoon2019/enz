<?php

namespace Tests\Feature\Modules\Frontend\ServicesOffered;

use App\Models\ServicesOffered\ServicesOffered;
use Tests\TestCase;

/**
 * Class ServicesOfferedFeatureFrontendTest
 * @package Tests\Feature\Modules\Frontend\ServicesOffered
 */
class ServicesOfferedFeatureFrontendTest extends TestCase
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
    public function servicesOfferedRouteFrontShowExist()
    {
        $model = ServicesOffered::first();
        $this->get(route(ServicesOffered::ROUTE_FRONTEND_PATH . '.show', $model))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function servicesOfferedRouteFrontIndexExist()
    {
        $this->get(route(ServicesOffered::ROUTE_FRONTEND_PATH . '.index'))
            ->assertStatus(200);
    }
}
