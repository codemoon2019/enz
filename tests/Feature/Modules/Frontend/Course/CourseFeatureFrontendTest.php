<?php

namespace Tests\Feature\Modules\Frontend\Course;

use App\Models\Course\Course;
use Tests\TestCase;

/**
 * Class CourseFeatureFrontendTest
 * @package Tests\Feature\Modules\Frontend\Course
 */
class CourseFeatureFrontendTest extends TestCase
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
    public function courseRouteFrontShowExist()
    {
        $model = Course::first();
        $this->get(route(Course::ROUTE_FRONTEND_PATH . '.show', $model))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function courseRouteFrontIndexExist()
    {
        $this->get(route(Course::ROUTE_FRONTEND_PATH . '.index'))
            ->assertStatus(200);
    }
}
