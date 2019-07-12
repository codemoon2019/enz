<?php

namespace Tests\Feature\Modules\Backend\MigrationVisa;

use App\Models\MigrationVisa\MigrationVisa;
use Tests\TestCase;


/**
 * Class MigrationVisaBreadFeatureBackendTest
 * @package Tests\Feature\Modules\Backend\MigrationVisa
 */
class MigrationVisaBreadFeatureBackendTest extends TestCase
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
    public function migrationVisaCreateRouteExist()
    {
        $this->get(route(MigrationVisa::ROUTE_ADMIN_PATH . '.create'))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function migrationVisaShowRouteExist()
    {
        $model = MigrationVisa::first();

        $this->get(route(MigrationVisa::ROUTE_ADMIN_PATH . '.show', $model))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function migrationVisaEditRouteExist()
    {
        $model = MigrationVisa::first();

        $this->get(route(MigrationVisa::ROUTE_ADMIN_PATH . '.edit', $model))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function migrationVisaStore()
    {
        $response = $this->post(route(MigrationVisa::ROUTE_ADMIN_PATH . '.store'), [
            'title' => 'Salliess',
        ]);

        $model = MigrationVisa::orderBy('id', 'desc')->first();

        $response
            ->assertStatus(302)
            ->assertSessionHas('flash_success', 'Salliess has been created.')
            ->assertRedirect(route(MigrationVisa::ROUTE_ADMIN_PATH . '.show', $model));

        $this->assertDatabaseHas((new MigrationVisa)->getTable(), [
            'title' => 'Salliess',
        ]);
    }

    /**
     * @test
     */
    public function migrationVisaUpdate()
    {
        $model = MigrationVisa::create([
            'title' => 'old Salliess',
        ]);

        $dataNew = [
            'title' => 'new Salliess',
        ];

        $response = $this->put(route(MigrationVisa::ROUTE_ADMIN_PATH . '.update', $model), $dataNew);

        // get the updated data
        $model = MigrationVisa::find($model->id);

        $response
            ->assertStatus(302)
            ->assertSessionHas('flash_success', 'new Salliess has been updated.')
            ->assertRedirect(route(MigrationVisa::ROUTE_ADMIN_PATH . '.show', $model));

        $this->assertDatabaseHas((new MigrationVisa)->getTable(), $dataNew);
    }
}
