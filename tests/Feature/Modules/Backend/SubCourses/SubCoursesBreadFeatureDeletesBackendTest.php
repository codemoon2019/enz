<?php

namespace Tests\Feature\Modules\Backend\SubCourses;

use App\Models\SubCourses\SubCourses;
use Tests\TestCase;


/**
 * Class SubCoursesBreadFeatureDeletesBackendTest
 * @package Tests\Feature\Modules\Backend\SubCourses
 */
class SubCoursesBreadFeatureDeletesBackendTest extends TestCase
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
    public function subCoursesDestroy()
    {
        $model = SubCourses::create([
            'title' => 'Salliess',
        ]);

        $response = $this->delete(route(SubCourses::ROUTE_ADMIN_PATH . '.destroy', $model));

        $response
            ->assertStatus(302)
            ->assertSessionHas('flash_success', 'Salliess has been deleted.')
            ->assertRedirect(route(SubCourses::ROUTE_ADMIN_PATH . '.index'));

        $this->assertDatabaseMissing((new SubCourses)->getTable(), [
            'id' => $model->id,
        ]);
    }
}
