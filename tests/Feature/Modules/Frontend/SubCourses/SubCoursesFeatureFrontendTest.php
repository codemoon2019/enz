<?php

namespace Tests\Feature\Modules\Frontend\SubCourses;

use App\Models\SubCourses\SubCourses;
use Tests\TestCase;

/**
 * Class SubCoursesFeatureFrontendTest
 * @package Tests\Feature\Modules\Frontend\SubCourses
 */
class SubCoursesFeatureFrontendTest extends TestCase
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
    public function subCoursesRouteFrontShowExist()
    {
        $model = SubCourses::first();
        $this->get(route(SubCourses::ROUTE_FRONTEND_PATH . '.show', $model))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function subCoursesRouteFrontIndexExist()
    {
        $this->get(route(SubCourses::ROUTE_FRONTEND_PATH . '.index'))
            ->assertStatus(200);
    }
}
