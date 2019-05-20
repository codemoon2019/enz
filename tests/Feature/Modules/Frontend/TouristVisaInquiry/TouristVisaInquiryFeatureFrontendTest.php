<?php

namespace Tests\Feature\Modules\Frontend\TouristVisaInquiry;

use App\Models\TouristVisaInquiry\TouristVisaInquiry;
use Tests\TestCase;

/**
 * Class TouristVisaInquiryFeatureFrontendTest
 * @package Tests\Feature\Modules\Frontend\TouristVisaInquiry
 */
class TouristVisaInquiryFeatureFrontendTest extends TestCase
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
    public function touristVisaInquiryRouteFrontShowExist()
    {
        $model = TouristVisaInquiry::first();
        $this->get(route(TouristVisaInquiry::ROUTE_FRONTEND_PATH . '.show', $model))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function touristVisaInquiryRouteFrontIndexExist()
    {
        $this->get(route(TouristVisaInquiry::ROUTE_FRONTEND_PATH . '.index'))
            ->assertStatus(200);
    }
}
