<?php

namespace Tests\Feature\Modules\Backend\Service;

use App\Models\Service\Service;
use Tests\TestCase;


/**
 * Class ServiceBreadFeatureDeletesBackendTest
 * @package Tests\Feature\Modules\Backend\Service
 */
class ServiceBreadFeatureDeletesBackendTest extends TestCase
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
    public function serviceDestroy()
    {
        $model = Service::create([
            'title' => 'Salliess',
        ]);

        $response = $this->delete(route(Service::ROUTE_ADMIN_PATH . '.destroy', $model));

        $response
            ->assertStatus(302)
            ->assertSessionHas('flash_success', 'Salliess has been deleted.')
            ->assertRedirect(route(Service::ROUTE_ADMIN_PATH . '.index'));

        $this->assertDatabaseMissing((new Service)->getTable(), [
            'id' => $model->id,
        ]);
    }
}
