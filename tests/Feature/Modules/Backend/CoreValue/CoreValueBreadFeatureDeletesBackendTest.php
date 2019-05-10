<?php

namespace Tests\Feature\Modules\Backend\CoreValue;

use App\Models\CoreValue\CoreValue;
use Tests\TestCase;


/**
 * Class CoreValueBreadFeatureDeletesBackendTest
 * @package Tests\Feature\Modules\Backend\CoreValue
 */
class CoreValueBreadFeatureDeletesBackendTest extends TestCase
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
    public function coreValueDestroy()
    {
        $model = CoreValue::create([
            'title' => 'Salliess',
        ]);

        $response = $this->delete(route(CoreValue::ROUTE_ADMIN_PATH . '.destroy', $model));

        $response
            ->assertStatus(302)
            ->assertSessionHas('flash_success', 'Salliess has been deleted.')
            ->assertRedirect(route(CoreValue::ROUTE_ADMIN_PATH . '.index'));

        $this->assertDatabaseMissing((new CoreValue)->getTable(), [
            'id' => $model->id,
        ]);
    }
}
