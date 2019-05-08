<?php

namespace Tests\Feature\Modules\Frontend\Linkages;

use App\Models\Linkages\Linkages;
use Tests\TestCase;

/**
 * Class LinkagesFeatureFrontendTest
 * @package Tests\Feature\Modules\Frontend\Linkages
 */
class LinkagesFeatureFrontendTest extends TestCase
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
    public function linkagesRouteFrontShowExist()
    {
        $model = Linkages::first();
        $this->get(route(Linkages::ROUTE_FRONTEND_PATH . '.show', $model))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function linkagesRouteFrontIndexExist()
    {
        $this->get(route(Linkages::ROUTE_FRONTEND_PATH . '.index'))
            ->assertStatus(200);
    }
}
