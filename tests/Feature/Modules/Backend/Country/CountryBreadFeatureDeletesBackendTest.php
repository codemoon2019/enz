<?php

namespace Tests\Feature\Modules\Backend\Country;

use App\Models\Country\Country;
use Tests\TestCase;


/**
 * Class CountryBreadFeatureDeletesBackendTest
 * @package Tests\Feature\Modules\Backend\Country
 */
class CountryBreadFeatureDeletesBackendTest extends TestCase
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
    public function countryDestroy()
    {
        $model = Country::create([
            'title' => 'Salliess',
        ]);

        $response = $this->delete(route(Country::ROUTE_ADMIN_PATH . '.destroy', $model));

        $response
            ->assertStatus(302)
            ->assertSessionHas('flash_success', 'Salliess has been deleted.')
            ->assertRedirect(route(Country::ROUTE_ADMIN_PATH . '.index'));

        $this->assertDatabaseMissing((new Country)->getTable(), [
            'id' => $model->id,
        ]);
    }
}
