<?php

namespace Tests\Feature\Modules\Backend\AreaOfStudy;

use App\Models\AreaOfStudy\AreaOfStudy;
use Tests\TestCase;


/**
 * Class AreaOfStudyBreadFeatureDeletesBackendTest
 * @package Tests\Feature\Modules\Backend\AreaOfStudy
 */
class AreaOfStudyBreadFeatureDeletesBackendTest extends TestCase
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
    public function areaOfStudyDestroy()
    {
        $model = AreaOfStudy::create([
            'title' => 'Salliess',
        ]);

        $response = $this->delete(route(AreaOfStudy::ROUTE_ADMIN_PATH . '.destroy', $model));

        $response
            ->assertStatus(302)
            ->assertSessionHas('flash_success', 'Salliess has been deleted.')
            ->assertRedirect(route(AreaOfStudy::ROUTE_ADMIN_PATH . '.index'));

        $this->assertDatabaseMissing((new AreaOfStudy)->getTable(), [
            'id' => $model->id,
        ]);
    }
}
