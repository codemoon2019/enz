<?php

namespace Tests\Feature\Modules\Frontend\Application;

use App\Models\Application\Application;
use Tests\TestCase;

/**
 * Class ApplicationFeatureFrontendTest
 * @package Tests\Feature\Modules\Frontend\Application
 */
class ApplicationFeatureFrontendTest extends TestCase
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
    public function applicationRouteFrontShowExist()
    {
        $model = Application::first();
        $this->get(route(Application::ROUTE_FRONTEND_PATH . '.show', $model))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function applicationRouteFrontIndexExist()
    {
        $this->get(route(Application::ROUTE_FRONTEND_PATH . '.index'))
            ->assertStatus(200);
    }
}
