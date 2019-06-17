<?php

namespace Tests\Feature\Modules\Backend\Application;

use App\Models\Application\Application;
use Tests\TestCase;


/**
 * Class ApplicationBreadFeatureBackendTest
 * @package Tests\Feature\Modules\Backend\Application
 */
class ApplicationBreadFeatureBackendTest extends TestCase
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
    public function applicationCreateRouteExist()
    {
        $this->get(route(Application::ROUTE_ADMIN_PATH . '.create'))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function applicationShowRouteExist()
    {
        $model = Application::first();

        $this->get(route(Application::ROUTE_ADMIN_PATH . '.show', $model))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function applicationEditRouteExist()
    {
        $model = Application::first();

        $this->get(route(Application::ROUTE_ADMIN_PATH . '.edit', $model))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function applicationStore()
    {
        $response = $this->post(route(Application::ROUTE_ADMIN_PATH . '.store'), [
            'title' => 'Salliess',
        ]);

        $model = Application::orderBy('id', 'desc')->first();

        $response
            ->assertStatus(302)
            ->assertSessionHas('flash_success', 'Salliess has been created.')
            ->assertRedirect(route(Application::ROUTE_ADMIN_PATH . '.show', $model));

        $this->assertDatabaseHas((new Application)->getTable(), [
            'title' => 'Salliess',
        ]);
    }

    /**
     * @test
     */
    public function applicationUpdate()
    {
        $model = Application::create([
            'title' => 'old Salliess',
        ]);

        $dataNew = [
            'title' => 'new Salliess',
        ];

        $response = $this->put(route(Application::ROUTE_ADMIN_PATH . '.update', $model), $dataNew);

        // get the updated data
        $model = Application::find($model->id);

        $response
            ->assertStatus(302)
            ->assertSessionHas('flash_success', 'new Salliess has been updated.')
            ->assertRedirect(route(Application::ROUTE_ADMIN_PATH . '.show', $model));

        $this->assertDatabaseHas((new Application)->getTable(), $dataNew);
    }
}
