<?php

namespace Tests\Feature\Modules\Backend\CountryDetails;

use App\Models\CountryDetails\CountryDetails;
use Tests\TestCase;


/**
 * Class CountryDetailsBreadFeatureDeletesBackendTest
 * @package Tests\Feature\Modules\Backend\CountryDetails
 */
class CountryDetailsBreadFeatureDeletesBackendTest extends TestCase
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
    public function countryDetailsDestroy()
    {
        $model = CountryDetails::create([
            'title' => 'Salliess',
        ]);

        $response = $this->delete(route(CountryDetails::ROUTE_ADMIN_PATH . '.destroy', $model));

        $response
            ->assertStatus(302)
            ->assertSessionHas('flash_success', 'Salliess has been deleted.')
            ->assertRedirect(route(CountryDetails::ROUTE_ADMIN_PATH . '.index'));

        $this->assertDatabaseMissing((new CountryDetails)->getTable(), [
            'id' => $model->id,
        ]);
    }
}
