<?php

namespace Tests\Feature\Modules\Frontend\Location;

use App\Models\Location\Location;
use Tests\TestCase;

/**
 * Class LocationFeatureFrontendTest
 * @package Tests\Feature\Modules\Frontend\Location
 */
class LocationFeatureFrontendTest extends TestCase
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
    public function locationRouteFrontShowExist()
    {
        $model = Location::first();
        $this->get(route(Location::ROUTE_FRONTEND_PATH . '.show', $model))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function locationRouteFrontIndexExist()
    {
        $this->get(route(Location::ROUTE_FRONTEND_PATH . '.index'))
            ->assertStatus(200);
    }
}
