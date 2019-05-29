<?php

namespace Tests\Feature\Modules\Frontend\Award;

use App\Models\Award\Award;
use Tests\TestCase;

/**
 * Class AwardFeatureFrontendTest
 * @package Tests\Feature\Modules\Frontend\Award
 */
class AwardFeatureFrontendTest extends TestCase
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
    public function awardRouteFrontShowExist()
    {
        $model = Award::first();
        $this->get(route(Award::ROUTE_FRONTEND_PATH . '.show', $model))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function awardRouteFrontIndexExist()
    {
        $this->get(route(Award::ROUTE_FRONTEND_PATH . '.index'))
            ->assertStatus(200);
    }
}
