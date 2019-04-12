<?php

namespace Tests\Feature\Modules\Backend\Event;

use App\Models\Event\Event;
use Tests\TestCase;


/**
 * Class EventBreadFeatureBackendTest
 * @package Tests\Feature\Modules\Backend\Event
 */
class EventBreadFeatureBackendTest extends TestCase
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
    public function eventCreateRouteExist()
    {
        $this->get(route(Event::ROUTE_ADMIN_PATH . '.create'))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function eventShowRouteExist()
    {
        $model = Event::first();

        $this->get(route(Event::ROUTE_ADMIN_PATH . '.show', $model))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function eventEditRouteExist()
    {
        $model = Event::first();

        $this->get(route(Event::ROUTE_ADMIN_PATH . '.edit', $model))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function eventStore()
    {
        $response = $this->post(route(Event::ROUTE_ADMIN_PATH . '.store'), [
            'title' => 'Salliess',
        ]);

        $model = Event::orderBy('id', 'desc')->first();

        $response
            ->assertStatus(302)
            ->assertSessionHas('flash_success', 'Salliess has been created.')
            ->assertRedirect(route(Event::ROUTE_ADMIN_PATH . '.show', $model));

        $this->assertDatabaseHas((new Event)->getTable(), [
            'title' => 'Salliess',
        ]);
    }

    /**
     * @test
     */
    public function eventUpdate()
    {
        $model = Event::create([
            'title' => 'old Salliess',
        ]);

        $dataNew = [
            'title' => 'new Salliess',
        ];

        $response = $this->put(route(Event::ROUTE_ADMIN_PATH . '.update', $model), $dataNew);

        // get the updated data
        $model = Event::find($model->id);

        $response
            ->assertStatus(302)
            ->assertSessionHas('flash_success', 'new Salliess has been updated.')
            ->assertRedirect(route(Event::ROUTE_ADMIN_PATH . '.show', $model));

        $this->assertDatabaseHas((new Event)->getTable(), $dataNew);
    }
}
