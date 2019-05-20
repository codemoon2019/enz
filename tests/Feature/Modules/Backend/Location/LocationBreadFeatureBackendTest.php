<?php

namespace Tests\Feature\Modules\Backend\Location;

use App\Models\Location\Location;
use Tests\TestCase;


/**
 * Class LocationBreadFeatureBackendTest
 * @package Tests\Feature\Modules\Backend\Location
 */
class LocationBreadFeatureBackendTest extends TestCase
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
    public function locationCreateRouteExist()
    {
        $this->get(route(Location::ROUTE_ADMIN_PATH . '.create'))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function locationShowRouteExist()
    {
        $model = Location::first();

        $this->get(route(Location::ROUTE_ADMIN_PATH . '.show', $model))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function locationEditRouteExist()
    {
        $model = Location::first();

        $this->get(route(Location::ROUTE_ADMIN_PATH . '.edit', $model))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function locationStore()
    {
        $response = $this->post(route(Location::ROUTE_ADMIN_PATH . '.store'), [
            'title' => 'Salliess',
        ]);

        $model = Location::orderBy('id', 'desc')->first();

        $response
            ->assertStatus(302)
            ->assertSessionHas('flash_success', 'Salliess has been created.')
            ->assertRedirect(route(Location::ROUTE_ADMIN_PATH . '.show', $model));

        $this->assertDatabaseHas((new Location)->getTable(), [
            'title' => 'Salliess',
        ]);
    }

    /**
     * @test
     */
    public function locationUpdate()
    {
        $model = Location::create([
            'title' => 'old Salliess',
        ]);

        $dataNew = [
            'title' => 'new Salliess',
        ];

        $response = $this->put(route(Location::ROUTE_ADMIN_PATH . '.update', $model), $dataNew);

        // get the updated data
        $model = Location::find($model->id);

        $response
            ->assertStatus(302)
            ->assertSessionHas('flash_success', 'new Salliess has been updated.')
            ->assertRedirect(route(Location::ROUTE_ADMIN_PATH . '.show', $model));

        $this->assertDatabaseHas((new Location)->getTable(), $dataNew);
    }
}
