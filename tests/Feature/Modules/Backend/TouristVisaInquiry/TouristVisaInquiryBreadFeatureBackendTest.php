<?php

namespace Tests\Feature\Modules\Backend\TouristVisaInquiry;

use App\Models\TouristVisaInquiry\TouristVisaInquiry;
use Tests\TestCase;


/**
 * Class TouristVisaInquiryBreadFeatureBackendTest
 * @package Tests\Feature\Modules\Backend\TouristVisaInquiry
 */
class TouristVisaInquiryBreadFeatureBackendTest extends TestCase
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
    public function touristVisaInquiryCreateRouteExist()
    {
        $this->get(route(TouristVisaInquiry::ROUTE_ADMIN_PATH . '.create'))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function touristVisaInquiryShowRouteExist()
    {
        $model = TouristVisaInquiry::first();

        $this->get(route(TouristVisaInquiry::ROUTE_ADMIN_PATH . '.show', $model))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function touristVisaInquiryEditRouteExist()
    {
        $model = TouristVisaInquiry::first();

        $this->get(route(TouristVisaInquiry::ROUTE_ADMIN_PATH . '.edit', $model))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function touristVisaInquiryStore()
    {
        $response = $this->post(route(TouristVisaInquiry::ROUTE_ADMIN_PATH . '.store'), [
            'title' => 'Salliess',
        ]);

        $model = TouristVisaInquiry::orderBy('id', 'desc')->first();

        $response
            ->assertStatus(302)
            ->assertSessionHas('flash_success', 'Salliess has been created.')
            ->assertRedirect(route(TouristVisaInquiry::ROUTE_ADMIN_PATH . '.show', $model));

        $this->assertDatabaseHas((new TouristVisaInquiry)->getTable(), [
            'title' => 'Salliess',
        ]);
    }

    /**
     * @test
     */
    public function touristVisaInquiryUpdate()
    {
        $model = TouristVisaInquiry::create([
            'title' => 'old Salliess',
        ]);

        $dataNew = [
            'title' => 'new Salliess',
        ];

        $response = $this->put(route(TouristVisaInquiry::ROUTE_ADMIN_PATH . '.update', $model), $dataNew);

        // get the updated data
        $model = TouristVisaInquiry::find($model->id);

        $response
            ->assertStatus(302)
            ->assertSessionHas('flash_success', 'new Salliess has been updated.')
            ->assertRedirect(route(TouristVisaInquiry::ROUTE_ADMIN_PATH . '.show', $model));

        $this->assertDatabaseHas((new TouristVisaInquiry)->getTable(), $dataNew);
    }
}
