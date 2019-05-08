<?php

namespace Tests\Feature\Modules\Backend\Linkages;

use App\Models\Linkages\Linkages;
use Tests\TestCase;


/**
 * Class LinkagesBreadFeatureDeletesBackendTest
 * @package Tests\Feature\Modules\Backend\Linkages
 */
class LinkagesBreadFeatureDeletesBackendTest extends TestCase
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
    public function linkagesDestroy()
    {
        $model = Linkages::create([
            'title' => 'Salliess',
        ]);

        $response = $this->delete(route(Linkages::ROUTE_ADMIN_PATH . '.destroy', $model));

        $response
            ->assertStatus(302)
            ->assertSessionHas('flash_success', 'Salliess has been deleted.')
            ->assertRedirect(route(Linkages::ROUTE_ADMIN_PATH . '.index'));

        $this->assertDatabaseMissing((new Linkages)->getTable(), [
            'id' => $model->id,
        ]);
    }
}
