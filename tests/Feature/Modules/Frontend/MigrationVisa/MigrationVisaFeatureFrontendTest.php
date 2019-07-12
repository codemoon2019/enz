<?php

namespace Tests\Feature\Modules\Frontend\MigrationVisa;

use App\Models\MigrationVisa\MigrationVisa;
use Tests\TestCase;

/**
 * Class MigrationVisaFeatureFrontendTest
 * @package Tests\Feature\Modules\Frontend\MigrationVisa
 */
class MigrationVisaFeatureFrontendTest extends TestCase
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
    public function migrationVisaRouteFrontShowExist()
    {
        $model = MigrationVisa::first();
        $this->get(route(MigrationVisa::ROUTE_FRONTEND_PATH . '.show', $model))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function migrationVisaRouteFrontIndexExist()
    {
        $this->get(route(MigrationVisa::ROUTE_FRONTEND_PATH . '.index'))
            ->assertStatus(200);
    }
}
