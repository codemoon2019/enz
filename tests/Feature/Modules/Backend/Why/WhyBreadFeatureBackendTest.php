<?php

namespace Tests\Feature\Modules\Backend\Why;

use App\Models\Why\Why;
use Tests\TestCase;


/**
 * Class WhyBreadFeatureBackendTest
 * @package Tests\Feature\Modules\Backend\Why
 */
class WhyBreadFeatureBackendTest extends TestCase
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
    public function whyCreateRouteExist()
    {
        $this->get(route(Why::ROUTE_ADMIN_PATH . '.create'))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function whyShowRouteExist()
    {
        $model = Why::first();

        $this->get(route(Why::ROUTE_ADMIN_PATH . '.show', $model))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function whyEditRouteExist()
    {
        $model = Why::first();

        $this->get(route(Why::ROUTE_ADMIN_PATH . '.edit', $model))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function whyStore()
    {
        $response = $this->post(route(Why::ROUTE_ADMIN_PATH . '.store'), [
            'title' => 'Salliess',
        ]);

        $model = Why::orderBy('id', 'desc')->first();

        $response
            ->assertStatus(302)
            ->assertSessionHas('flash_success', 'Salliess has been created.')
            ->assertRedirect(route(Why::ROUTE_ADMIN_PATH . '.show', $model));

        $this->assertDatabaseHas((new Why)->getTable(), [
            'title' => 'Salliess',
        ]);
    }

    /**
     * @test
     */
    public function whyUpdate()
    {
        $model = Why::create([
            'title' => 'old Salliess',
        ]);

        $dataNew = [
            'title' => 'new Salliess',
        ];

        $response = $this->put(route(Why::ROUTE_ADMIN_PATH . '.update', $model), $dataNew);

        // get the updated data
        $model = Why::find($model->id);

        $response
            ->assertStatus(302)
            ->assertSessionHas('flash_success', 'new Salliess has been updated.')
            ->assertRedirect(route(Why::ROUTE_ADMIN_PATH . '.show', $model));

        $this->assertDatabaseHas((new Why)->getTable(), $dataNew);
    }
}
