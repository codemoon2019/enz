<?php

namespace Tests\Feature\Modules\Backend\OurTeam;

use App\Models\OurTeam\OurTeam;
use Tests\TestCase;


/**
 * Class OurTeamBreadFeatureDeletesBackendTest
 * @package Tests\Feature\Modules\Backend\OurTeam
 */
class OurTeamBreadFeatureDeletesBackendTest extends TestCase
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
    public function ourTeamDestroy()
    {
        $model = OurTeam::create([
            'title' => 'Salliess',
        ]);

        $response = $this->delete(route(OurTeam::ROUTE_ADMIN_PATH . '.destroy', $model));

        $response
            ->assertStatus(302)
            ->assertSessionHas('flash_success', 'Salliess has been deleted.')
            ->assertRedirect(route(OurTeam::ROUTE_ADMIN_PATH . '.index'));

        $this->assertDatabaseMissing((new OurTeam)->getTable(), [
            'id' => $model->id,
        ]);
    }
}
