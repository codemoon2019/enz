<?php

namespace Tests\Feature\Modules\Frontend\StudentVisa;

use App\Models\StudentVisa\StudentVisa;
use Tests\TestCase;

/**
 * Class StudentVisaFeatureFrontendTest
 * @package Tests\Feature\Modules\Frontend\StudentVisa
 */
class StudentVisaFeatureFrontendTest extends TestCase
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
    public function studentVisaRouteFrontShowExist()
    {
        $model = StudentVisa::first();
        $this->get(route(StudentVisa::ROUTE_FRONTEND_PATH . '.show', $model))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function studentVisaRouteFrontIndexExist()
    {
        $this->get(route(StudentVisa::ROUTE_FRONTEND_PATH . '.index'))
            ->assertStatus(200);
    }
}
