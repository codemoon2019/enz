<?php

namespace Tests\Feature\Modules\Backend\Subscription;

use App\Models\Subscription\Subscription;
use Tests\TestCase;


/**
 * Class SubscriptionBreadFeatureDeletesBackendTest
 * @package Tests\Feature\Modules\Backend\Subscription
 */
class SubscriptionBreadFeatureDeletesBackendTest extends TestCase
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
    public function subscriptionDestroy()
    {
        $model = Subscription::create([
            'title' => 'Salliess',
        ]);

        $response = $this->delete(route(Subscription::ROUTE_ADMIN_PATH . '.destroy', $model));

        $response
            ->assertStatus(302)
            ->assertSessionHas('flash_success', 'Salliess has been deleted.')
            ->assertRedirect(route(Subscription::ROUTE_ADMIN_PATH . '.index'));

        $this->assertDatabaseMissing((new Subscription)->getTable(), [
            'id' => $model->id,
        ]);
    }
}
