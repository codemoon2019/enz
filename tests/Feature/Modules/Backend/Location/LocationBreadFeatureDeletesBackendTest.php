<?php

namespace Tests\Feature\Modules\Backend\Location;

use App\Models\Location\Location;
use Tests\TestCase;


/**
 * Class LocationBreadFeatureDeletesBackendTest
 * @package Tests\Feature\Modules\Backend\Location
 */
class LocationBreadFeatureDeletesBackendTest extends TestCase
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
    public function locationDestroy()
    {
        $model = Location::create([
            'title' => 'Salliess',
        ]);

        $response = $this->delete(route(Location::ROUTE_ADMIN_PATH . '.destroy', $model));

        $response
            ->assertStatus(302)
            ->assertSessionHas('flash_success', 'Salliess has been deleted.')
            ->assertRedirect(route(Location::ROUTE_ADMIN_PATH . '.index'));

        $this->assertDatabaseMissing((new Location)->getTable(), [
            'id' => $model->id,
        ]);
    }
}
