<?php

namespace Tests\Feature\Modules\Backend\City;

use App\Models\City\City;
use Tests\TestCase;


/**
 * Class CityBreadFeatureDeletesBackendTest
 * @package Tests\Feature\Modules\Backend\City
 */
class CityBreadFeatureDeletesBackendTest extends TestCase
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
    public function cityDestroy()
    {
        $model = City::create([
            'title' => 'Salliess',
        ]);

        $response = $this->delete(route(City::ROUTE_ADMIN_PATH . '.destroy', $model));

        $response
            ->assertStatus(302)
            ->assertSessionHas('flash_success', 'Salliess has been deleted.')
            ->assertRedirect(route(City::ROUTE_ADMIN_PATH . '.index'));

        $this->assertDatabaseMissing((new City)->getTable(), [
            'id' => $model->id,
        ]);
    }
}
