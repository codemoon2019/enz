<?php

namespace Tests\Feature\Modules\Frontend\Institution;

use App\Models\Institution\Institution;
use Tests\TestCase;

/**
 * Class InstitutionFeatureFrontendTest
 * @package Tests\Feature\Modules\Frontend\Institution
 */
class InstitutionFeatureFrontendTest extends TestCase
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
    public function institutionRouteFrontShowExist()
    {
        $model = Institution::first();
        $this->get(route(Institution::ROUTE_FRONTEND_PATH . '.show', $model))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function institutionRouteFrontIndexExist()
    {
        $this->get(route(Institution::ROUTE_FRONTEND_PATH . '.index'))
            ->assertStatus(200);
    }
}
