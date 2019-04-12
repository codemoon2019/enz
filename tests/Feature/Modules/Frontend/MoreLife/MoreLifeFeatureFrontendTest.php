<?php

namespace Tests\Feature\Modules\Frontend\MoreLife;

use App\Models\MoreLife\MoreLife;
use Tests\TestCase;

/**
 * Class MoreLifeFeatureFrontendTest
 * @package Tests\Feature\Modules\Frontend\MoreLife
 */
class MoreLifeFeatureFrontendTest extends TestCase
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
    public function moreLifeRouteFrontShowExist()
    {
        $model = MoreLife::first();
        $this->get(route(MoreLife::ROUTE_FRONTEND_PATH . '.show', $model))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function moreLifeRouteFrontIndexExist()
    {
        $this->get(route(MoreLife::ROUTE_FRONTEND_PATH . '.index'))
            ->assertStatus(200);
    }
}
