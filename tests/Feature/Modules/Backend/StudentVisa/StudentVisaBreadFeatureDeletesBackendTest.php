<?php

namespace Tests\Feature\Modules\Backend\StudentVisa;

use App\Models\StudentVisa\StudentVisa;
use Tests\TestCase;


/**
 * Class StudentVisaBreadFeatureDeletesBackendTest
 * @package Tests\Feature\Modules\Backend\StudentVisa
 */
class StudentVisaBreadFeatureDeletesBackendTest extends TestCase
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
    public function studentVisaDestroy()
    {
        $model = StudentVisa::create([
            'title' => 'Salliess',
        ]);

        $response = $this->delete(route(StudentVisa::ROUTE_ADMIN_PATH . '.destroy', $model));

        $response
            ->assertStatus(302)
            ->assertSessionHas('flash_success', 'Salliess has been deleted.')
            ->assertRedirect(route(StudentVisa::ROUTE_ADMIN_PATH . '.index'));

        $this->assertDatabaseMissing((new StudentVisa)->getTable(), [
            'id' => $model->id,
        ]);
    }
}
