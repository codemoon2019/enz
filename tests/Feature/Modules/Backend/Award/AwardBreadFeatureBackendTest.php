<?php

namespace Tests\Feature\Modules\Backend\Award;

use App\Models\Award\Award;
use Tests\TestCase;


/**
 * Class AwardBreadFeatureBackendTest
 * @package Tests\Feature\Modules\Backend\Award
 */
class AwardBreadFeatureBackendTest extends TestCase
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
    public function awardCreateRouteExist()
    {
        $this->get(route(Award::ROUTE_ADMIN_PATH . '.create'))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function awardShowRouteExist()
    {
        $model = Award::first();

        $this->get(route(Award::ROUTE_ADMIN_PATH . '.show', $model))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function awardEditRouteExist()
    {
        $model = Award::first();

        $this->get(route(Award::ROUTE_ADMIN_PATH . '.edit', $model))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function awardStore()
    {
        $response = $this->post(route(Award::ROUTE_ADMIN_PATH . '.store'), [
            'title' => 'Salliess',
        ]);

        $model = Award::orderBy('id', 'desc')->first();

        $response
            ->assertStatus(302)
            ->assertSessionHas('flash_success', 'Salliess has been created.')
            ->assertRedirect(route(Award::ROUTE_ADMIN_PATH . '.show', $model));

        $this->assertDatabaseHas((new Award)->getTable(), [
            'title' => 'Salliess',
        ]);
    }

    /**
     * @test
     */
    public function awardUpdate()
    {
        $model = Award::create([
            'title' => 'old Salliess',
        ]);

        $dataNew = [
            'title' => 'new Salliess',
        ];

        $response = $this->put(route(Award::ROUTE_ADMIN_PATH . '.update', $model), $dataNew);

        // get the updated data
        $model = Award::find($model->id);

        $response
            ->assertStatus(302)
            ->assertSessionHas('flash_success', 'new Salliess has been updated.')
            ->assertRedirect(route(Award::ROUTE_ADMIN_PATH . '.show', $model));

        $this->assertDatabaseHas((new Award)->getTable(), $dataNew);
    }
}
