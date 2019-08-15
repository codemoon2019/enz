<?php

namespace Tests\Feature\Modules\Backend\ServicesOffered;

use App\Models\ServicesOffered\ServicesOffered;
use Tests\TestCase;


/**
 * Class ServicesOfferedBreadFeatureDeletesBackendTest
 * @package Tests\Feature\Modules\Backend\ServicesOffered
 */
class ServicesOfferedBreadFeatureDeletesBackendTest extends TestCase
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
    public function servicesOfferedDestroy()
    {
        $model = ServicesOffered::create([
            'title' => 'Salliess',
        ]);

        $response = $this->delete(route(ServicesOffered::ROUTE_ADMIN_PATH . '.destroy', $model));

        $response
            ->assertStatus(302)
            ->assertSessionHas('flash_success', 'Salliess has been deleted.')
            ->assertRedirect(route(ServicesOffered::ROUTE_ADMIN_PATH . '.index'));

        $this->assertDatabaseMissing((new ServicesOffered)->getTable(), [
            'id' => $model->id,
        ]);
    }
}
