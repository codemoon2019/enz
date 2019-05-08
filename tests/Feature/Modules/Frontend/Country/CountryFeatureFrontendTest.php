<?php

namespace Tests\Feature\Modules\Frontend\Country;

use App\Models\Country\Country;
use Tests\TestCase;

/**
 * Class CountryFeatureFrontendTest
 * @package Tests\Feature\Modules\Frontend\Country
 */
class CountryFeatureFrontendTest extends TestCase
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
    public function countryRouteFrontShowExist()
    {
        $model = Country::first();
        $this->get(route(Country::ROUTE_FRONTEND_PATH . '.show', $model))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function countryRouteFrontIndexExist()
    {
        $this->get(route(Country::ROUTE_FRONTEND_PATH . '.index'))
            ->assertStatus(200);
    }
}
