<?php

namespace Tests\Feature\Modules\Frontend\SampleModule;

use App\Models\SampleModule\SampleModule;
use Tests\TestCase;

/**
 * Class SampleModuleFeatureFrontendTest
 * @package Tests\Feature\Modules\Frontend\SampleModule
 */
class SampleModuleFeatureFrontendTest extends TestCase
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
    public function sampleModuleRouteFrontShowExist()
    {
        $model = SampleModule::first();
        $this->get(route(SampleModule::ROUTE_FRONTEND_PATH . '.show', $model))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function sampleModuleRouteFrontIndexExist()
    {
        $this->get(route(SampleModule::ROUTE_FRONTEND_PATH . '.index'))
            ->assertStatus(200);
    }
}
