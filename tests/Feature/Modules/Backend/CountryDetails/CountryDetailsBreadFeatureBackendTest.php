<?php

namespace Tests\Feature\Modules\Backend\CountryDetails;

use App\Models\CountryDetails\CountryDetails;
use Tests\TestCase;


/**
 * Class CountryDetailsBreadFeatureBackendTest
 * @package Tests\Feature\Modules\Backend\CountryDetails
 */
class CountryDetailsBreadFeatureBackendTest extends TestCase
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
    public function countryDetailsCreateRouteExist()
    {
        $this->get(route(CountryDetails::ROUTE_ADMIN_PATH . '.create'))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function countryDetailsShowRouteExist()
    {
        $model = CountryDetails::first();

        $this->get(route(CountryDetails::ROUTE_ADMIN_PATH . '.show', $model))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function countryDetailsEditRouteExist()
    {
        $model = CountryDetails::first();

        $this->get(route(CountryDetails::ROUTE_ADMIN_PATH . '.edit', $model))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function countryDetailsStore()
    {
        $response = $this->post(route(CountryDetails::ROUTE_ADMIN_PATH . '.store'), [
            'title' => 'Salliess',
        ]);

        $model = CountryDetails::orderBy('id', 'desc')->first();

        $response
            ->assertStatus(302)
            ->assertSessionHas('flash_success', 'Salliess has been created.')
            ->assertRedirect(route(CountryDetails::ROUTE_ADMIN_PATH . '.show', $model));

        $this->assertDatabaseHas((new CountryDetails)->getTable(), [
            'title' => 'Salliess',
        ]);
    }

    /**
     * @test
     */
    public function countryDetailsUpdate()
    {
        $model = CountryDetails::create([
            'title' => 'old Salliess',
        ]);

        $dataNew = [
            'title' => 'new Salliess',
        ];

        $response = $this->put(route(CountryDetails::ROUTE_ADMIN_PATH . '.update', $model), $dataNew);

        // get the updated data
        $model = CountryDetails::find($model->id);

        $response
            ->assertStatus(302)
            ->assertSessionHas('flash_success', 'new Salliess has been updated.')
            ->assertRedirect(route(CountryDetails::ROUTE_ADMIN_PATH . '.show', $model));

        $this->assertDatabaseHas((new CountryDetails)->getTable(), $dataNew);
    }
}
