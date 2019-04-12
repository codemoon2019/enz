<?php

namespace Tests\Feature\Modules\Backend\SampleModule;

use App\Models\SampleModule\SampleModule;
use Tests\TestCase;


/**
 * Class SampleModuleBreadFeatureBackendTest
 * @package Tests\Feature\Modules\Backend\SampleModule
 */
class SampleModuleBreadFeatureBackendTest extends TestCase
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
    public function sampleModuleCreateRouteExist()
    {
        $this->get(route(SampleModule::ROUTE_ADMIN_PATH . '.create'))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function sampleModuleShowRouteExist()
    {
        $model = SampleModule::first();

        $this->get(route(SampleModule::ROUTE_ADMIN_PATH . '.show', $model))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function sampleModuleEditRouteExist()
    {
        $model = SampleModule::first();

        $this->get(route(SampleModule::ROUTE_ADMIN_PATH . '.edit', $model))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function sampleModuleStore()
    {
        $response = $this->post(route(SampleModule::ROUTE_ADMIN_PATH . '.store'), [
            'title' => 'Salliess',
        ]);

        $model = SampleModule::orderBy('id', 'desc')->first();

        $response
            ->assertStatus(302)
            ->assertSessionHas('flash_success', 'Salliess has been created.')
            ->assertRedirect(route(SampleModule::ROUTE_ADMIN_PATH . '.show', $model));

        $this->assertDatabaseHas((new SampleModule)->getTable(), [
            'title' => 'Salliess',
        ]);
    }

    /**
     * @test
     */
    public function sampleModuleUpdate()
    {
        $model = SampleModule::create([
            'title' => 'old Salliess',
        ]);

        $dataNew = [
            'title' => 'new Salliess',
        ];

        $response = $this->put(route(SampleModule::ROUTE_ADMIN_PATH . '.update', $model), $dataNew);

        // get the updated data
        $model = SampleModule::find($model->id);

        $response
            ->assertStatus(302)
            ->assertSessionHas('flash_success', 'new Salliess has been updated.')
            ->assertRedirect(route(SampleModule::ROUTE_ADMIN_PATH . '.show', $model));

        $this->assertDatabaseHas((new SampleModule)->getTable(), $dataNew);
    }
}
