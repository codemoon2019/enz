<?php

namespace Tests\Feature\Modules\Backend\Details;

use App\Models\Details\Details;
use Tests\TestCase;


/**
 * Class DetailsBreadFeatureBackendTest
 * @package Tests\Feature\Modules\Backend\Details
 */
class DetailsBreadFeatureBackendTest extends TestCase
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
    public function detailsCreateRouteExist()
    {
        $this->get(route(Details::ROUTE_ADMIN_PATH . '.create'))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function detailsShowRouteExist()
    {
        $model = Details::first();

        $this->get(route(Details::ROUTE_ADMIN_PATH . '.show', $model))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function detailsEditRouteExist()
    {
        $model = Details::first();

        $this->get(route(Details::ROUTE_ADMIN_PATH . '.edit', $model))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function detailsStore()
    {
        $response = $this->post(route(Details::ROUTE_ADMIN_PATH . '.store'), [
            'title' => 'Salliess',
        ]);

        $model = Details::orderBy('id', 'desc')->first();

        $response
            ->assertStatus(302)
            ->assertSessionHas('flash_success', 'Salliess has been created.')
            ->assertRedirect(route(Details::ROUTE_ADMIN_PATH . '.show', $model));

        $this->assertDatabaseHas((new Details)->getTable(), [
            'title' => 'Salliess',
        ]);
    }

    /**
     * @test
     */
    public function detailsUpdate()
    {
        $model = Details::create([
            'title' => 'old Salliess',
        ]);

        $dataNew = [
            'title' => 'new Salliess',
        ];

        $response = $this->put(route(Details::ROUTE_ADMIN_PATH . '.update', $model), $dataNew);

        // get the updated data
        $model = Details::find($model->id);

        $response
            ->assertStatus(302)
            ->assertSessionHas('flash_success', 'new Salliess has been updated.')
            ->assertRedirect(route(Details::ROUTE_ADMIN_PATH . '.show', $model));

        $this->assertDatabaseHas((new Details)->getTable(), $dataNew);
    }
}
