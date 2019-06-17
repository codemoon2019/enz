<?php

namespace Tests\Feature\Modules\Backend\Application;

use App\Models\Application\Application;
use Tests\TestCase;


/**
 * Class ApplicationBreadFeatureDeletesBackendTest
 * @package Tests\Feature\Modules\Backend\Application
 */
class ApplicationBreadFeatureDeletesBackendTest extends TestCase
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
    public function applicationDestroy()
    {
        $model = Application::create([
            'title' => 'Salliess',
        ]);

        $response = $this->delete(route(Application::ROUTE_ADMIN_PATH . '.destroy', $model));

        $response
            ->assertStatus(302)
            ->assertSessionHas('flash_success', 'Salliess has been deleted.')
            ->assertRedirect(route(Application::ROUTE_ADMIN_PATH . '.index'));

        $this->assertDatabaseMissing((new Application)->getTable(), [
            'id' => $model->id,
        ]);
    }
}
