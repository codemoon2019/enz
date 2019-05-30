<?php

namespace Tests\Feature\Modules\Frontend\Subscription;

use App\Models\Subscription\Subscription;
use Tests\TestCase;

/**
 * Class SubscriptionFeatureFrontendTest
 * @package Tests\Feature\Modules\Frontend\Subscription
 */
class SubscriptionFeatureFrontendTest extends TestCase
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
    public function subscriptionRouteFrontShowExist()
    {
        $model = Subscription::first();
        $this->get(route(Subscription::ROUTE_FRONTEND_PATH . '.show', $model))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function subscriptionRouteFrontIndexExist()
    {
        $this->get(route(Subscription::ROUTE_FRONTEND_PATH . '.index'))
            ->assertStatus(200);
    }
}
