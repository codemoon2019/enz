<?php

namespace Tests\Feature\Modules\Frontend\CoreValue;

use App\Models\CoreValue\CoreValue;
use Tests\TestCase;

/**
 * Class CoreValueFeatureFrontendTest
 * @package Tests\Feature\Modules\Frontend\CoreValue
 */
class CoreValueFeatureFrontendTest extends TestCase
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
    public function coreValueRouteFrontShowExist()
    {
        $model = CoreValue::first();
        $this->get(route(CoreValue::ROUTE_FRONTEND_PATH . '.show', $model))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function coreValueRouteFrontIndexExist()
    {
        $this->get(route(CoreValue::ROUTE_FRONTEND_PATH . '.index'))
            ->assertStatus(200);
    }
}
