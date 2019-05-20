<?php

namespace Tests\Feature\Modules\Backend\TouristVisaInquiry;

use App\Models\TouristVisaInquiry\TouristVisaInquiry;
use Tests\TestCase;


/**
 * Class TouristVisaInquiryBreadFeatureDeletesBackendTest
 * @package Tests\Feature\Modules\Backend\TouristVisaInquiry
 */
class TouristVisaInquiryBreadFeatureDeletesBackendTest extends TestCase
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
    public function touristVisaInquiryDestroy()
    {
        $model = TouristVisaInquiry::create([
            'title' => 'Salliess',
        ]);

        $response = $this->delete(route(TouristVisaInquiry::ROUTE_ADMIN_PATH . '.destroy', $model));

        $response
            ->assertStatus(302)
            ->assertSessionHas('flash_success', 'Salliess has been deleted.')
            ->assertRedirect(route(TouristVisaInquiry::ROUTE_ADMIN_PATH . '.index'));

        $this->assertDatabaseMissing((new TouristVisaInquiry)->getTable(), [
            'id' => $model->id,
        ]);
    }
}
