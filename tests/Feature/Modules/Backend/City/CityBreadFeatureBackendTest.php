<?php

namespace Tests\Feature\Modules\Backend\City;

use App\Models\City\City;
use Tests\TestCase;


/**
 * Class CityBreadFeatureBackendTest
 * @package Tests\Feature\Modules\Backend\City
 */
class CityBreadFeatureBackendTest extends TestCase
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
    public function cityCreateRouteExist()
    {
        $this->get(route(City::ROUTE_ADMIN_PATH . '.create'))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function cityShowRouteExist()
    {
        $model = City::first();

        $this->get(route(City::ROUTE_ADMIN_PATH . '.show', $model))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function cityEditRouteExist()
    {
        $model = City::first();

        $this->get(route(City::ROUTE_ADMIN_PATH . '.edit', $model))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function cityStore()
    {
        $response = $this->post(route(City::ROUTE_ADMIN_PATH . '.store'), [
            'title' => 'Salliess',
        ]);

        $model = City::orderBy('id', 'desc')->first();

        $response
            ->assertStatus(302)
            ->assertSessionHas('flash_success', 'Salliess has been created.')
            ->assertRedirect(route(City::ROUTE_ADMIN_PATH . '.show', $model));

        $this->assertDatabaseHas((new City)->getTable(), [
            'title' => 'Salliess',
        ]);
    }

    /**
     * @test
     */
    public function cityUpdate()
    {
        $model = City::create([
            'title' => 'old Salliess',
        ]);

        $dataNew = [
            'title' => 'new Salliess',
        ];

        $response = $this->put(route(City::ROUTE_ADMIN_PATH . '.update', $model), $dataNew);

        // get the updated data
        $model = City::find($model->id);

        $response
            ->assertStatus(302)
            ->assertSessionHas('flash_success', 'new Salliess has been updated.')
            ->assertRedirect(route(City::ROUTE_ADMIN_PATH . '.show', $model));

        $this->assertDatabaseHas((new City)->getTable(), $dataNew);
    }
}
