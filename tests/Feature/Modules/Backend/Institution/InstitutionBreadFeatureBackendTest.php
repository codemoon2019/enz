<?php

namespace Tests\Feature\Modules\Backend\Institution;

use App\Models\Institution\Institution;
use Tests\TestCase;


/**
 * Class InstitutionBreadFeatureBackendTest
 * @package Tests\Feature\Modules\Backend\Institution
 */
class InstitutionBreadFeatureBackendTest extends TestCase
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
    public function institutionCreateRouteExist()
    {
        $this->get(route(Institution::ROUTE_ADMIN_PATH . '.create'))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function institutionShowRouteExist()
    {
        $model = Institution::first();

        $this->get(route(Institution::ROUTE_ADMIN_PATH . '.show', $model))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function institutionEditRouteExist()
    {
        $model = Institution::first();

        $this->get(route(Institution::ROUTE_ADMIN_PATH . '.edit', $model))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function institutionStore()
    {
        $response = $this->post(route(Institution::ROUTE_ADMIN_PATH . '.store'), [
            'title' => 'Salliess',
        ]);

        $model = Institution::orderBy('id', 'desc')->first();

        $response
            ->assertStatus(302)
            ->assertSessionHas('flash_success', 'Salliess has been created.')
            ->assertRedirect(route(Institution::ROUTE_ADMIN_PATH . '.show', $model));

        $this->assertDatabaseHas((new Institution)->getTable(), [
            'title' => 'Salliess',
        ]);
    }

    /**
     * @test
     */
    public function institutionUpdate()
    {
        $model = Institution::create([
            'title' => 'old Salliess',
        ]);

        $dataNew = [
            'title' => 'new Salliess',
        ];

        $response = $this->put(route(Institution::ROUTE_ADMIN_PATH . '.update', $model), $dataNew);

        // get the updated data
        $model = Institution::find($model->id);

        $response
            ->assertStatus(302)
            ->assertSessionHas('flash_success', 'new Salliess has been updated.')
            ->assertRedirect(route(Institution::ROUTE_ADMIN_PATH . '.show', $model));

        $this->assertDatabaseHas((new Institution)->getTable(), $dataNew);
    }
}
