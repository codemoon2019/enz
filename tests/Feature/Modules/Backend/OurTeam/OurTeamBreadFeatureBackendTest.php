<?php

namespace Tests\Feature\Modules\Backend\OurTeam;

use App\Models\OurTeam\OurTeam;
use Tests\TestCase;


/**
 * Class OurTeamBreadFeatureBackendTest
 * @package Tests\Feature\Modules\Backend\OurTeam
 */
class OurTeamBreadFeatureBackendTest extends TestCase
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
    public function ourTeamCreateRouteExist()
    {
        $this->get(route(OurTeam::ROUTE_ADMIN_PATH . '.create'))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function ourTeamShowRouteExist()
    {
        $model = OurTeam::first();

        $this->get(route(OurTeam::ROUTE_ADMIN_PATH . '.show', $model))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function ourTeamEditRouteExist()
    {
        $model = OurTeam::first();

        $this->get(route(OurTeam::ROUTE_ADMIN_PATH . '.edit', $model))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function ourTeamStore()
    {
        $response = $this->post(route(OurTeam::ROUTE_ADMIN_PATH . '.store'), [
            'title' => 'Salliess',
        ]);

        $model = OurTeam::orderBy('id', 'desc')->first();

        $response
            ->assertStatus(302)
            ->assertSessionHas('flash_success', 'Salliess has been created.')
            ->assertRedirect(route(OurTeam::ROUTE_ADMIN_PATH . '.show', $model));

        $this->assertDatabaseHas((new OurTeam)->getTable(), [
            'title' => 'Salliess',
        ]);
    }

    /**
     * @test
     */
    public function ourTeamUpdate()
    {
        $model = OurTeam::create([
            'title' => 'old Salliess',
        ]);

        $dataNew = [
            'title' => 'new Salliess',
        ];

        $response = $this->put(route(OurTeam::ROUTE_ADMIN_PATH . '.update', $model), $dataNew);

        // get the updated data
        $model = OurTeam::find($model->id);

        $response
            ->assertStatus(302)
            ->assertSessionHas('flash_success', 'new Salliess has been updated.')
            ->assertRedirect(route(OurTeam::ROUTE_ADMIN_PATH . '.show', $model));

        $this->assertDatabaseHas((new OurTeam)->getTable(), $dataNew);
    }
}
