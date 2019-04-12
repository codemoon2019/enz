<?php

namespace Tests\Feature\Modules\Backend\Event;

use App\Models\Event\Event;
use Tests\TestCase;


/**
 * Class EventBreadFeatureDeletesBackendTest
 * @package Tests\Feature\Modules\Backend\Event
 */
class EventBreadFeatureDeletesBackendTest extends TestCase
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
    public function eventDestroy()
    {
        $model = Event::create([
            'title' => 'Salliess',
        ]);

        $response = $this->delete(route(Event::ROUTE_ADMIN_PATH . '.destroy', $model));

        $response
            ->assertStatus(302)
            ->assertSessionHas('flash_success', 'Salliess has been deleted.')
            ->assertRedirect(route(Event::ROUTE_ADMIN_PATH . '.index'));

        $this->assertDatabaseMissing((new Event)->getTable(), [
            'id' => $model->id,
        ]);
    }
}
