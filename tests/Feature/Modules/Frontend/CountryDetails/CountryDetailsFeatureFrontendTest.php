<?php

namespace Tests\Feature\Modules\Frontend\CountryDetails;

use App\Models\CountryDetails\CountryDetails;
use Tests\TestCase;

/**
 * Class CountryDetailsFeatureFrontendTest
 * @package Tests\Feature\Modules\Frontend\CountryDetails
 */
class CountryDetailsFeatureFrontendTest extends TestCase
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
    public function countryDetailsRouteFrontShowExist()
    {
        $model = CountryDetails::first();
        $this->get(route(CountryDetails::ROUTE_FRONTEND_PATH . '.show', $model))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function countryDetailsRouteFrontIndexExist()
    {
        $this->get(route(CountryDetails::ROUTE_FRONTEND_PATH . '.index'))
            ->assertStatus(200);
    }
}
