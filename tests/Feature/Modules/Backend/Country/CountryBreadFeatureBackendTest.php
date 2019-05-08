<?php

namespace Tests\Feature\Modules\Backend\Country;

use App\Models\Country\Country;
use Tests\TestCase;


/**
 * Class CountryBreadFeatureBackendTest
 * @package Tests\Feature\Modules\Backend\Country
 */
class CountryBreadFeatureBackendTest extends TestCase
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
    public function countryCreateRouteExist()
    {
        $this->get(route(Country::ROUTE_ADMIN_PATH . '.create'))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function countryShowRouteExist()
    {
        $model = Country::first();

        $this->get(route(Country::ROUTE_ADMIN_PATH . '.show', $model))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function countryEditRouteExist()
    {
        $model = Country::first();

        $this->get(route(Country::ROUTE_ADMIN_PATH . '.edit', $model))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function countryStore()
    {
        $response = $this->post(route(Country::ROUTE_ADMIN_PATH . '.store'), [
            'title' => 'Salliess',
        ]);

        $model = Country::orderBy('id', 'desc')->first();

        $response
            ->assertStatus(302)
            ->assertSessionHas('flash_success', 'Salliess has been created.')
            ->assertRedirect(route(Country::ROUTE_ADMIN_PATH . '.show', $model));

        $this->assertDatabaseHas((new Country)->getTable(), [
            'title' => 'Salliess',
        ]);
    }

    /**
     * @test
     */
    public function countryUpdate()
    {
        $model = Country::create([
            'title' => 'old Salliess',
        ]);

        $dataNew = [
            'title' => 'new Salliess',
        ];

        $response = $this->put(route(Country::ROUTE_ADMIN_PATH . '.update', $model), $dataNew);

        // get the updated data
        $model = Country::find($model->id);

        $response
            ->assertStatus(302)
            ->assertSessionHas('flash_success', 'new Salliess has been updated.')
            ->assertRedirect(route(Country::ROUTE_ADMIN_PATH . '.show', $model));

        $this->assertDatabaseHas((new Country)->getTable(), $dataNew);
    }
}
