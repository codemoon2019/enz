<?php

namespace Tests\Feature\Modules\Backend\Subscription;

use App\Models\Subscription\Subscription;
use Tests\TestCase;


/**
 * Class SubscriptionBreadFeatureBackendTest
 * @package Tests\Feature\Modules\Backend\Subscription
 */
class SubscriptionBreadFeatureBackendTest extends TestCase
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
    public function subscriptionCreateRouteExist()
    {
        $this->get(route(Subscription::ROUTE_ADMIN_PATH . '.create'))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function subscriptionShowRouteExist()
    {
        $model = Subscription::first();

        $this->get(route(Subscription::ROUTE_ADMIN_PATH . '.show', $model))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function subscriptionEditRouteExist()
    {
        $model = Subscription::first();

        $this->get(route(Subscription::ROUTE_ADMIN_PATH . '.edit', $model))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function subscriptionStore()
    {
        $response = $this->post(route(Subscription::ROUTE_ADMIN_PATH . '.store'), [
            'title' => 'Salliess',
        ]);

        $model = Subscription::orderBy('id', 'desc')->first();

        $response
            ->assertStatus(302)
            ->assertSessionHas('flash_success', 'Salliess has been created.')
            ->assertRedirect(route(Subscription::ROUTE_ADMIN_PATH . '.show', $model));

        $this->assertDatabaseHas((new Subscription)->getTable(), [
            'title' => 'Salliess',
        ]);
    }

    /**
     * @test
     */
    public function subscriptionUpdate()
    {
        $model = Subscription::create([
            'title' => 'old Salliess',
        ]);

        $dataNew = [
            'title' => 'new Salliess',
        ];

        $response = $this->put(route(Subscription::ROUTE_ADMIN_PATH . '.update', $model), $dataNew);

        // get the updated data
        $model = Subscription::find($model->id);

        $response
            ->assertStatus(302)
            ->assertSessionHas('flash_success', 'new Salliess has been updated.')
            ->assertRedirect(route(Subscription::ROUTE_ADMIN_PATH . '.show', $model));

        $this->assertDatabaseHas((new Subscription)->getTable(), $dataNew);
    }
}
