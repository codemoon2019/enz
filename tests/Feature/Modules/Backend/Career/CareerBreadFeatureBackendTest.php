<?php

namespace Tests\Feature\Modules\Backend\Career;

use App\Models\Career\Career;
use Tests\TestCase;


/**
 * Class CareerBreadFeatureBackendTest
 * @package Tests\Feature\Modules\Backend\Career
 */
class CareerBreadFeatureBackendTest extends TestCase
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
    public function careerCreateRouteExist()
    {
        $this->get(route(Career::ROUTE_ADMIN_PATH . '.create'))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function careerShowRouteExist()
    {
        $model = Career::first();

        $this->get(route(Career::ROUTE_ADMIN_PATH . '.show', $model))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function careerEditRouteExist()
    {
        $model = Career::first();

        $this->get(route(Career::ROUTE_ADMIN_PATH . '.edit', $model))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function careerStore()
    {
        $response = $this->post(route(Career::ROUTE_ADMIN_PATH . '.store'), [
            'title' => 'Salliess',
        ]);

        $model = Career::orderBy('id', 'desc')->first();

        $response
            ->assertStatus(302)
            ->assertSessionHas('flash_success', 'Salliess has been created.')
            ->assertRedirect(route(Career::ROUTE_ADMIN_PATH . '.show', $model));

        $this->assertDatabaseHas((new Career)->getTable(), [
            'title' => 'Salliess',
        ]);
    }

    /**
     * @test
     */
    public function careerUpdate()
    {
        $model = Career::create([
            'title' => 'old Salliess',
        ]);

        $dataNew = [
            'title' => 'new Salliess',
        ];

        $response = $this->put(route(Career::ROUTE_ADMIN_PATH . '.update', $model), $dataNew);

        // get the updated data
        $model = Career::find($model->id);

        $response
            ->assertStatus(302)
            ->assertSessionHas('flash_success', 'new Salliess has been updated.')
            ->assertRedirect(route(Career::ROUTE_ADMIN_PATH . '.show', $model));

        $this->assertDatabaseHas((new Career)->getTable(), $dataNew);
    }
}
