<?php

namespace Tests\Feature\Modules\Backend\MoreLife;

use App\Models\MoreLife\MoreLife;
use Tests\TestCase;


/**
 * Class MoreLifeBreadFeatureBackendTest
 * @package Tests\Feature\Modules\Backend\MoreLife
 */
class MoreLifeBreadFeatureBackendTest extends TestCase
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
    public function moreLifeCreateRouteExist()
    {
        $this->get(route(MoreLife::ROUTE_ADMIN_PATH . '.create'))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function moreLifeShowRouteExist()
    {
        $model = MoreLife::first();

        $this->get(route(MoreLife::ROUTE_ADMIN_PATH . '.show', $model))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function moreLifeEditRouteExist()
    {
        $model = MoreLife::first();

        $this->get(route(MoreLife::ROUTE_ADMIN_PATH . '.edit', $model))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function moreLifeStore()
    {
        $response = $this->post(route(MoreLife::ROUTE_ADMIN_PATH . '.store'), [
            'title' => 'Salliess',
        ]);

        $model = MoreLife::orderBy('id', 'desc')->first();

        $response
            ->assertStatus(302)
            ->assertSessionHas('flash_success', 'Salliess has been created.')
            ->assertRedirect(route(MoreLife::ROUTE_ADMIN_PATH . '.show', $model));

        $this->assertDatabaseHas((new MoreLife)->getTable(), [
            'title' => 'Salliess',
        ]);
    }

    /**
     * @test
     */
    public function moreLifeUpdate()
    {
        $model = MoreLife::create([
            'title' => 'old Salliess',
        ]);

        $dataNew = [
            'title' => 'new Salliess',
        ];

        $response = $this->put(route(MoreLife::ROUTE_ADMIN_PATH . '.update', $model), $dataNew);

        // get the updated data
        $model = MoreLife::find($model->id);

        $response
            ->assertStatus(302)
            ->assertSessionHas('flash_success', 'new Salliess has been updated.')
            ->assertRedirect(route(MoreLife::ROUTE_ADMIN_PATH . '.show', $model));

        $this->assertDatabaseHas((new MoreLife)->getTable(), $dataNew);
    }
}
