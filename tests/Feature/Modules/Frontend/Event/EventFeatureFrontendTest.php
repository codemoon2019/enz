<?php

namespace Tests\Feature\Modules\Frontend\Event;

use App\Models\Event\Event;
use Tests\TestCase;

/**
 * Class EventFeatureFrontendTest
 * @package Tests\Feature\Modules\Frontend\Event
 */
class EventFeatureFrontendTest extends TestCase
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
    public function eventRouteFrontShowExist()
    {
        $model = Event::first();
        $this->get(route(Event::ROUTE_FRONTEND_PATH . '.show', $model))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function eventRouteFrontIndexExist()
    {
        $this->get(route(Event::ROUTE_FRONTEND_PATH . '.index'))
            ->assertStatus(200);
    }
}
