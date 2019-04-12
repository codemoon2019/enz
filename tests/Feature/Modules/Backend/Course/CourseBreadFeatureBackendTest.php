<?php

namespace Tests\Feature\Modules\Backend\Course;

use App\Models\Course\Course;
use Tests\TestCase;


/**
 * Class CourseBreadFeatureBackendTest
 * @package Tests\Feature\Modules\Backend\Course
 */
class CourseBreadFeatureBackendTest extends TestCase
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
    public function courseCreateRouteExist()
    {
        $this->get(route(Course::ROUTE_ADMIN_PATH . '.create'))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function courseShowRouteExist()
    {
        $model = Course::first();

        $this->get(route(Course::ROUTE_ADMIN_PATH . '.show', $model))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function courseEditRouteExist()
    {
        $model = Course::first();

        $this->get(route(Course::ROUTE_ADMIN_PATH . '.edit', $model))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function courseStore()
    {
        $response = $this->post(route(Course::ROUTE_ADMIN_PATH . '.store'), [
            'title' => 'Salliess',
        ]);

        $model = Course::orderBy('id', 'desc')->first();

        $response
            ->assertStatus(302)
            ->assertSessionHas('flash_success', 'Salliess has been created.')
            ->assertRedirect(route(Course::ROUTE_ADMIN_PATH . '.show', $model));

        $this->assertDatabaseHas((new Course)->getTable(), [
            'title' => 'Salliess',
        ]);
    }

    /**
     * @test
     */
    public function courseUpdate()
    {
        $model = Course::create([
            'title' => 'old Salliess',
        ]);

        $dataNew = [
            'title' => 'new Salliess',
        ];

        $response = $this->put(route(Course::ROUTE_ADMIN_PATH . '.update', $model), $dataNew);

        // get the updated data
        $model = Course::find($model->id);

        $response
            ->assertStatus(302)
            ->assertSessionHas('flash_success', 'new Salliess has been updated.')
            ->assertRedirect(route(Course::ROUTE_ADMIN_PATH . '.show', $model));

        $this->assertDatabaseHas((new Course)->getTable(), $dataNew);
    }
}
