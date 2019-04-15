<?php

namespace Tests\Feature\Modules\Backend\Service;

use App\Models\Service\Service;
use Tests\TestCase;


/**
 * Class ServiceBreadFeatureBackendTest
 * @package Tests\Feature\Modules\Backend\Service
 */
class ServiceBreadFeatureBackendTest extends TestCase
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
    public function serviceCreateRouteExist()
    {
        $this->get(route(Service::ROUTE_ADMIN_PATH . '.create'))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function serviceShowRouteExist()
    {
        $model = Service::first();

        $this->get(route(Service::ROUTE_ADMIN_PATH . '.show', $model))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function serviceEditRouteExist()
    {
        $model = Service::first();

        $this->get(route(Service::ROUTE_ADMIN_PATH . '.edit', $model))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function serviceStore()
    {
        $response = $this->post(route(Service::ROUTE_ADMIN_PATH . '.store'), [
            'title' => 'Salliess',
        ]);

        $model = Service::orderBy('id', 'desc')->first();

        $response
            ->assertStatus(302)
            ->assertSessionHas('flash_success', 'Salliess has been created.')
            ->assertRedirect(route(Service::ROUTE_ADMIN_PATH . '.show', $model));

        $this->assertDatabaseHas((new Service)->getTable(), [
            'title' => 'Salliess',
        ]);
    }

    /**
     * @test
     */
    public function serviceUpdate()
    {
        $model = Service::create([
            'title' => 'old Salliess',
        ]);

        $dataNew = [
            'title' => 'new Salliess',
        ];

        $response = $this->put(route(Service::ROUTE_ADMIN_PATH . '.update', $model), $dataNew);

        // get the updated data
        $model = Service::find($model->id);

        $response
            ->assertStatus(302)
            ->assertSessionHas('flash_success', 'new Salliess has been updated.')
            ->assertRedirect(route(Service::ROUTE_ADMIN_PATH . '.show', $model));

        $this->assertDatabaseHas((new Service)->getTable(), $dataNew);
    }
}
