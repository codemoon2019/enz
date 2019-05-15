<?php

namespace Tests\Feature\Modules\Frontend\AreaOfStudy;

use App\Models\AreaOfStudy\AreaOfStudy;
use Tests\TestCase;

/**
 * Class AreaOfStudyFeatureFrontendTest
 * @package Tests\Feature\Modules\Frontend\AreaOfStudy
 */
class AreaOfStudyFeatureFrontendTest extends TestCase
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
    public function areaOfStudyRouteFrontShowExist()
    {
        $model = AreaOfStudy::first();
        $this->get(route(AreaOfStudy::ROUTE_FRONTEND_PATH . '.show', $model))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function areaOfStudyRouteFrontIndexExist()
    {
        $this->get(route(AreaOfStudy::ROUTE_FRONTEND_PATH . '.index'))
            ->assertStatus(200);
    }
}
