<?php

namespace Tests\Feature\Modules\Backend\Institution;

use App\Models\Institution\Institution;
use Tests\TestCase;


/**
 * Class InstitutionBreadFeatureDeletesBackendTest
 * @package Tests\Feature\Modules\Backend\Institution
 */
class InstitutionBreadFeatureDeletesBackendTest extends TestCase
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
    public function institutionDestroy()
    {
        $model = Institution::create([
            'title' => 'Salliess',
        ]);

        $response = $this->delete(route(Institution::ROUTE_ADMIN_PATH . '.destroy', $model));

        $response
            ->assertStatus(302)
            ->assertSessionHas('flash_success', 'Salliess has been deleted.')
            ->assertRedirect(route(Institution::ROUTE_ADMIN_PATH . '.index'));

        $this->assertDatabaseMissing((new Institution)->getTable(), [
            'id' => $model->id,
        ]);
    }
}
