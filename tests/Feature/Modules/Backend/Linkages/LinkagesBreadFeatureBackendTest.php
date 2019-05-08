<?php

namespace Tests\Feature\Modules\Backend\Linkages;

use App\Models\Linkages\Linkages;
use Tests\TestCase;


/**
 * Class LinkagesBreadFeatureBackendTest
 * @package Tests\Feature\Modules\Backend\Linkages
 */
class LinkagesBreadFeatureBackendTest extends TestCase
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
    public function linkagesCreateRouteExist()
    {
        $this->get(route(Linkages::ROUTE_ADMIN_PATH . '.create'))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function linkagesShowRouteExist()
    {
        $model = Linkages::first();

        $this->get(route(Linkages::ROUTE_ADMIN_PATH . '.show', $model))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function linkagesEditRouteExist()
    {
        $model = Linkages::first();

        $this->get(route(Linkages::ROUTE_ADMIN_PATH . '.edit', $model))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function linkagesStore()
    {
        $response = $this->post(route(Linkages::ROUTE_ADMIN_PATH . '.store'), [
            'title' => 'Salliess',
        ]);

        $model = Linkages::orderBy('id', 'desc')->first();

        $response
            ->assertStatus(302)
            ->assertSessionHas('flash_success', 'Salliess has been created.')
            ->assertRedirect(route(Linkages::ROUTE_ADMIN_PATH . '.show', $model));

        $this->assertDatabaseHas((new Linkages)->getTable(), [
            'title' => 'Salliess',
        ]);
    }

    /**
     * @test
     */
    public function linkagesUpdate()
    {
        $model = Linkages::create([
            'title' => 'old Salliess',
        ]);

        $dataNew = [
            'title' => 'new Salliess',
        ];

        $response = $this->put(route(Linkages::ROUTE_ADMIN_PATH . '.update', $model), $dataNew);

        // get the updated data
        $model = Linkages::find($model->id);

        $response
            ->assertStatus(302)
            ->assertSessionHas('flash_success', 'new Salliess has been updated.')
            ->assertRedirect(route(Linkages::ROUTE_ADMIN_PATH . '.show', $model));

        $this->assertDatabaseHas((new Linkages)->getTable(), $dataNew);
    }
}
