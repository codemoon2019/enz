<?php

namespace Tests\Feature\Modules\Backend\SuccessPercentage;

use App\Models\SuccessPercentage\SuccessPercentage;
use Tests\TestCase;


/**
 * Class SuccessPercentageBreadFeatureBackendTest
 * @package Tests\Feature\Modules\Backend\SuccessPercentage
 */
class SuccessPercentageBreadFeatureBackendTest extends TestCase
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
    public function successPercentageCreateRouteExist()
    {
        $this->get(route(SuccessPercentage::ROUTE_ADMIN_PATH . '.create'))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function successPercentageShowRouteExist()
    {
        $model = SuccessPercentage::first();

        $this->get(route(SuccessPercentage::ROUTE_ADMIN_PATH . '.show', $model))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function successPercentageEditRouteExist()
    {
        $model = SuccessPercentage::first();

        $this->get(route(SuccessPercentage::ROUTE_ADMIN_PATH . '.edit', $model))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function successPercentageStore()
    {
        $response = $this->post(route(SuccessPercentage::ROUTE_ADMIN_PATH . '.store'), [
            'title' => 'Salliess',
        ]);

        $model = SuccessPercentage::orderBy('id', 'desc')->first();

        $response
            ->assertStatus(302)
            ->assertSessionHas('flash_success', 'Salliess has been created.')
            ->assertRedirect(route(SuccessPercentage::ROUTE_ADMIN_PATH . '.show', $model));

        $this->assertDatabaseHas((new SuccessPercentage)->getTable(), [
            'title' => 'Salliess',
        ]);
    }

    /**
     * @test
     */
    public function successPercentageUpdate()
    {
        $model = SuccessPercentage::create([
            'title' => 'old Salliess',
        ]);

        $dataNew = [
            'title' => 'new Salliess',
        ];

        $response = $this->put(route(SuccessPercentage::ROUTE_ADMIN_PATH . '.update', $model), $dataNew);

        // get the updated data
        $model = SuccessPercentage::find($model->id);

        $response
            ->assertStatus(302)
            ->assertSessionHas('flash_success', 'new Salliess has been updated.')
            ->assertRedirect(route(SuccessPercentage::ROUTE_ADMIN_PATH . '.show', $model));

        $this->assertDatabaseHas((new SuccessPercentage)->getTable(), $dataNew);
    }
}
