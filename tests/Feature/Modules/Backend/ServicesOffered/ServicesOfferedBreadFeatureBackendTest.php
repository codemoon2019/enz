<?php

namespace Tests\Feature\Modules\Backend\ServicesOffered;

use App\Models\ServicesOffered\ServicesOffered;
use Tests\TestCase;


/**
 * Class ServicesOfferedBreadFeatureBackendTest
 * @package Tests\Feature\Modules\Backend\ServicesOffered
 */
class ServicesOfferedBreadFeatureBackendTest extends TestCase
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
    public function servicesOfferedCreateRouteExist()
    {
        $this->get(route(ServicesOffered::ROUTE_ADMIN_PATH . '.create'))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function servicesOfferedShowRouteExist()
    {
        $model = ServicesOffered::first();

        $this->get(route(ServicesOffered::ROUTE_ADMIN_PATH . '.show', $model))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function servicesOfferedEditRouteExist()
    {
        $model = ServicesOffered::first();

        $this->get(route(ServicesOffered::ROUTE_ADMIN_PATH . '.edit', $model))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function servicesOfferedStore()
    {
        $response = $this->post(route(ServicesOffered::ROUTE_ADMIN_PATH . '.store'), [
            'title' => 'Salliess',
        ]);

        $model = ServicesOffered::orderBy('id', 'desc')->first();

        $response
            ->assertStatus(302)
            ->assertSessionHas('flash_success', 'Salliess has been created.')
            ->assertRedirect(route(ServicesOffered::ROUTE_ADMIN_PATH . '.show', $model));

        $this->assertDatabaseHas((new ServicesOffered)->getTable(), [
            'title' => 'Salliess',
        ]);
    }

    /**
     * @test
     */
    public function servicesOfferedUpdate()
    {
        $model = ServicesOffered::create([
            'title' => 'old Salliess',
        ]);

        $dataNew = [
            'title' => 'new Salliess',
        ];

        $response = $this->put(route(ServicesOffered::ROUTE_ADMIN_PATH . '.update', $model), $dataNew);

        // get the updated data
        $model = ServicesOffered::find($model->id);

        $response
            ->assertStatus(302)
            ->assertSessionHas('flash_success', 'new Salliess has been updated.')
            ->assertRedirect(route(ServicesOffered::ROUTE_ADMIN_PATH . '.show', $model));

        $this->assertDatabaseHas((new ServicesOffered)->getTable(), $dataNew);
    }
}
