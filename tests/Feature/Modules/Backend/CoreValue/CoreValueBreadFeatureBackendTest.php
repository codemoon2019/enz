<?php

namespace Tests\Feature\Modules\Backend\CoreValue;

use App\Models\CoreValue\CoreValue;
use Tests\TestCase;


/**
 * Class CoreValueBreadFeatureBackendTest
 * @package Tests\Feature\Modules\Backend\CoreValue
 */
class CoreValueBreadFeatureBackendTest extends TestCase
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
    public function coreValueCreateRouteExist()
    {
        $this->get(route(CoreValue::ROUTE_ADMIN_PATH . '.create'))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function coreValueShowRouteExist()
    {
        $model = CoreValue::first();

        $this->get(route(CoreValue::ROUTE_ADMIN_PATH . '.show', $model))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function coreValueEditRouteExist()
    {
        $model = CoreValue::first();

        $this->get(route(CoreValue::ROUTE_ADMIN_PATH . '.edit', $model))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function coreValueStore()
    {
        $response = $this->post(route(CoreValue::ROUTE_ADMIN_PATH . '.store'), [
            'title' => 'Salliess',
        ]);

        $model = CoreValue::orderBy('id', 'desc')->first();

        $response
            ->assertStatus(302)
            ->assertSessionHas('flash_success', 'Salliess has been created.')
            ->assertRedirect(route(CoreValue::ROUTE_ADMIN_PATH . '.show', $model));

        $this->assertDatabaseHas((new CoreValue)->getTable(), [
            'title' => 'Salliess',
        ]);
    }

    /**
     * @test
     */
    public function coreValueUpdate()
    {
        $model = CoreValue::create([
            'title' => 'old Salliess',
        ]);

        $dataNew = [
            'title' => 'new Salliess',
        ];

        $response = $this->put(route(CoreValue::ROUTE_ADMIN_PATH . '.update', $model), $dataNew);

        // get the updated data
        $model = CoreValue::find($model->id);

        $response
            ->assertStatus(302)
            ->assertSessionHas('flash_success', 'new Salliess has been updated.')
            ->assertRedirect(route(CoreValue::ROUTE_ADMIN_PATH . '.show', $model));

        $this->assertDatabaseHas((new CoreValue)->getTable(), $dataNew);
    }
}
