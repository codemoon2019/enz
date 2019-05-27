<?php

namespace Tests\Feature\Modules\Frontend\City;

use App\Models\City\City;
use Tests\TestCase;

/**
 * Class CityFeatureFrontendTest
 * @package Tests\Feature\Modules\Frontend\City
 */
class CityFeatureFrontendTest extends TestCase
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
    public function cityRouteFrontShowExist()
    {
        $model = City::first();
        $this->get(route(City::ROUTE_FRONTEND_PATH . '.show', $model))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function cityRouteFrontIndexExist()
    {
        $this->get(route(City::ROUTE_FRONTEND_PATH . '.index'))
            ->assertStatus(200);
    }
}
