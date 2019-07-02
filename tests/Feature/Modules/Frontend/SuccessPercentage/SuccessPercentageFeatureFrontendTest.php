<?php

namespace Tests\Feature\Modules\Frontend\SuccessPercentage;

use App\Models\SuccessPercentage\SuccessPercentage;
use Tests\TestCase;

/**
 * Class SuccessPercentageFeatureFrontendTest
 * @package Tests\Feature\Modules\Frontend\SuccessPercentage
 */
class SuccessPercentageFeatureFrontendTest extends TestCase
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
    public function successPercentageRouteFrontShowExist()
    {
        $model = SuccessPercentage::first();
        $this->get(route(SuccessPercentage::ROUTE_FRONTEND_PATH . '.show', $model))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function successPercentageRouteFrontIndexExist()
    {
        $this->get(route(SuccessPercentage::ROUTE_FRONTEND_PATH . '.index'))
            ->assertStatus(200);
    }
}
