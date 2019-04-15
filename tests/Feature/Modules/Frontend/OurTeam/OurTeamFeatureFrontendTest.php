<?php

namespace Tests\Feature\Modules\Frontend\OurTeam;

use App\Models\OurTeam\OurTeam;
use Tests\TestCase;

/**
 * Class OurTeamFeatureFrontendTest
 * @package Tests\Feature\Modules\Frontend\OurTeam
 */
class OurTeamFeatureFrontendTest extends TestCase
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
    public function ourTeamRouteFrontShowExist()
    {
        $model = OurTeam::first();
        $this->get(route(OurTeam::ROUTE_FRONTEND_PATH . '.show', $model))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function ourTeamRouteFrontIndexExist()
    {
        $this->get(route(OurTeam::ROUTE_FRONTEND_PATH . '.index'))
            ->assertStatus(200);
    }
}
