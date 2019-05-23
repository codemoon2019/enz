<?php

namespace Tests\Feature\Modules\Frontend\BecomeOurClientInquiry;

use App\Models\BecomeOurClientInquiry\BecomeOurClientInquiry;
use Tests\TestCase;

/**
 * Class BecomeOurClientInquiryFeatureFrontendTest
 * @package Tests\Feature\Modules\Frontend\BecomeOurClientInquiry
 */
class BecomeOurClientInquiryFeatureFrontendTest extends TestCase
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
    public function becomeOurClientInquiryRouteFrontShowExist()
    {
        $model = BecomeOurClientInquiry::first();
        $this->get(route(BecomeOurClientInquiry::ROUTE_FRONTEND_PATH . '.show', $model))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function becomeOurClientInquiryRouteFrontIndexExist()
    {
        $this->get(route(BecomeOurClientInquiry::ROUTE_FRONTEND_PATH . '.index'))
            ->assertStatus(200);
    }
}
