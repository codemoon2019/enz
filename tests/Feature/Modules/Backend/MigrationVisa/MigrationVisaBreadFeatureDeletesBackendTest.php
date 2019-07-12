<?php

namespace Tests\Feature\Modules\Backend\MigrationVisa;

use App\Models\MigrationVisa\MigrationVisa;
use Tests\TestCase;


/**
 * Class MigrationVisaBreadFeatureDeletesBackendTest
 * @package Tests\Feature\Modules\Backend\MigrationVisa
 */
class MigrationVisaBreadFeatureDeletesBackendTest extends TestCase
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
    public function migrationVisaDestroy()
    {
        $model = MigrationVisa::create([
            'title' => 'Salliess',
        ]);

        $response = $this->delete(route(MigrationVisa::ROUTE_ADMIN_PATH . '.destroy', $model));

        $response
            ->assertStatus(302)
            ->assertSessionHas('flash_success', 'Salliess has been deleted.')
            ->assertRedirect(route(MigrationVisa::ROUTE_ADMIN_PATH . '.index'));

        $this->assertDatabaseMissing((new MigrationVisa)->getTable(), [
            'id' => $model->id,
        ]);
    }
}
