<?php

namespace Tests\Feature\Modules\Backend\Course;

use App\Models\Course\Course;
use Tests\TestCase;


/**
 * Class CourseBreadFeatureDeletesBackendTest
 * @package Tests\Feature\Modules\Backend\Course
 */
class CourseBreadFeatureDeletesBackendTest extends TestCase
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
    public function courseDestroy()
    {
        $model = Course::create([
            'title' => 'Salliess',
        ]);

        $response = $this->delete(route(Course::ROUTE_ADMIN_PATH . '.destroy', $model));

        $response
            ->assertStatus(302)
            ->assertSessionHas('flash_success', 'Salliess has been deleted.')
            ->assertRedirect(route(Course::ROUTE_ADMIN_PATH . '.index'));

        $this->assertDatabaseMissing((new Course)->getTable(), [
            'id' => $model->id,
        ]);
    }
}
