<?php

namespace Tests\Feature\Modules\Frontend\Service;

use App\Models\Service\Service;
use Tests\TestCase;

/**
 * Class ServiceFeatureFrontendTest
 * @package Tests\Feature\Modules\Frontend\Service
 */
class ServiceFeatureFrontendTest extends TestCase
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
    public function serviceRouteFrontShowExist()
    {
        $model = Service::first();
        $this->get(route(Service::ROUTE_FRONTEND_PATH . '.show', $model))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function serviceRouteFrontIndexExist()
    {
        $this->get(route(Service::ROUTE_FRONTEND_PATH . '.index'))
            ->assertStatus(200);
    }
}
