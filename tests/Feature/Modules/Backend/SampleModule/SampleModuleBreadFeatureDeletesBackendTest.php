<?php

namespace Tests\Feature\Modules\Backend\SampleModule;

use App\Models\SampleModule\SampleModule;
use Tests\TestCase;


/**
 * Class SampleModuleBreadFeatureDeletesBackendTest
 * @package Tests\Feature\Modules\Backend\SampleModule
 */
class SampleModuleBreadFeatureDeletesBackendTest extends TestCase
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
    public function sampleModuleDestroy()
    {
        $model = SampleModule::create([
            'title' => 'Salliess',
        ]);

        $response = $this->delete(route(SampleModule::ROUTE_ADMIN_PATH . '.destroy', $model));

        $response
            ->assertStatus(302)
            ->assertSessionHas('flash_success', 'Salliess has been deleted.')
            ->assertRedirect(route(SampleModule::ROUTE_ADMIN_PATH . '.index'));

        $this->assertDatabaseMissing((new SampleModule)->getTable(), [
            'id' => $model->id,
        ]);
    }
}
