<?php

namespace Tests\Feature\Modules\Backend\SubCourses;

use App\Models\SubCourses\SubCourses;
use Tests\TestCase;


/**
 * Class SubCoursesBreadFeatureBackendTest
 * @package Tests\Feature\Modules\Backend\SubCourses
 */
class SubCoursesBreadFeatureBackendTest extends TestCase
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
    public function subCoursesCreateRouteExist()
    {
        $this->get(route(SubCourses::ROUTE_ADMIN_PATH . '.create'))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function subCoursesShowRouteExist()
    {
        $model = SubCourses::first();

        $this->get(route(SubCourses::ROUTE_ADMIN_PATH . '.show', $model))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function subCoursesEditRouteExist()
    {
        $model = SubCourses::first();

        $this->get(route(SubCourses::ROUTE_ADMIN_PATH . '.edit', $model))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function subCoursesStore()
    {
        $response = $this->post(route(SubCourses::ROUTE_ADMIN_PATH . '.store'), [
            'title' => 'Salliess',
        ]);

        $model = SubCourses::orderBy('id', 'desc')->first();

        $response
            ->assertStatus(302)
            ->assertSessionHas('flash_success', 'Salliess has been created.')
            ->assertRedirect(route(SubCourses::ROUTE_ADMIN_PATH . '.show', $model));

        $this->assertDatabaseHas((new SubCourses)->getTable(), [
            'title' => 'Salliess',
        ]);
    }

    /**
     * @test
     */
    public function subCoursesUpdate()
    {
        $model = SubCourses::create([
            'title' => 'old Salliess',
        ]);

        $dataNew = [
            'title' => 'new Salliess',
        ];

        $response = $this->put(route(SubCourses::ROUTE_ADMIN_PATH . '.update', $model), $dataNew);

        // get the updated data
        $model = SubCourses::find($model->id);

        $response
            ->assertStatus(302)
            ->assertSessionHas('flash_success', 'new Salliess has been updated.')
            ->assertRedirect(route(SubCourses::ROUTE_ADMIN_PATH . '.show', $model));

        $this->assertDatabaseHas((new SubCourses)->getTable(), $dataNew);
    }
}
