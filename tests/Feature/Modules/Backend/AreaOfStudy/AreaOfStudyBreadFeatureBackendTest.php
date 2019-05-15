<?php

namespace Tests\Feature\Modules\Backend\AreaOfStudy;

use App\Models\AreaOfStudy\AreaOfStudy;
use Tests\TestCase;


/**
 * Class AreaOfStudyBreadFeatureBackendTest
 * @package Tests\Feature\Modules\Backend\AreaOfStudy
 */
class AreaOfStudyBreadFeatureBackendTest extends TestCase
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
    public function areaOfStudyCreateRouteExist()
    {
        $this->get(route(AreaOfStudy::ROUTE_ADMIN_PATH . '.create'))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function areaOfStudyShowRouteExist()
    {
        $model = AreaOfStudy::first();

        $this->get(route(AreaOfStudy::ROUTE_ADMIN_PATH . '.show', $model))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function areaOfStudyEditRouteExist()
    {
        $model = AreaOfStudy::first();

        $this->get(route(AreaOfStudy::ROUTE_ADMIN_PATH . '.edit', $model))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function areaOfStudyStore()
    {
        $response = $this->post(route(AreaOfStudy::ROUTE_ADMIN_PATH . '.store'), [
            'title' => 'Salliess',
        ]);

        $model = AreaOfStudy::orderBy('id', 'desc')->first();

        $response
            ->assertStatus(302)
            ->assertSessionHas('flash_success', 'Salliess has been created.')
            ->assertRedirect(route(AreaOfStudy::ROUTE_ADMIN_PATH . '.show', $model));

        $this->assertDatabaseHas((new AreaOfStudy)->getTable(), [
            'title' => 'Salliess',
        ]);
    }

    /**
     * @test
     */
    public function areaOfStudyUpdate()
    {
        $model = AreaOfStudy::create([
            'title' => 'old Salliess',
        ]);

        $dataNew = [
            'title' => 'new Salliess',
        ];

        $response = $this->put(route(AreaOfStudy::ROUTE_ADMIN_PATH . '.update', $model), $dataNew);

        // get the updated data
        $model = AreaOfStudy::find($model->id);

        $response
            ->assertStatus(302)
            ->assertSessionHas('flash_success', 'new Salliess has been updated.')
            ->assertRedirect(route(AreaOfStudy::ROUTE_ADMIN_PATH . '.show', $model));

        $this->assertDatabaseHas((new AreaOfStudy)->getTable(), $dataNew);
    }
}
