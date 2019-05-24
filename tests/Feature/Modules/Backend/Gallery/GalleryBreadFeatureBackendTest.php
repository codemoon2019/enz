<?php

namespace Tests\Feature\Modules\Backend\Gallery;

use App\Models\Gallery\Gallery;
use Tests\TestCase;


/**
 * Class GalleryBreadFeatureBackendTest
 * @package Tests\Feature\Modules\Backend\Gallery
 */
class GalleryBreadFeatureBackendTest extends TestCase
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
    public function galleryCreateRouteExist()
    {
        $this->get(route(Gallery::ROUTE_ADMIN_PATH . '.create'))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function galleryShowRouteExist()
    {
        $model = Gallery::first();

        $this->get(route(Gallery::ROUTE_ADMIN_PATH . '.show', $model))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function galleryEditRouteExist()
    {
        $model = Gallery::first();

        $this->get(route(Gallery::ROUTE_ADMIN_PATH . '.edit', $model))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function galleryStore()
    {
        $response = $this->post(route(Gallery::ROUTE_ADMIN_PATH . '.store'), [
            'title' => 'Salliess',
        ]);

        $model = Gallery::orderBy('id', 'desc')->first();

        $response
            ->assertStatus(302)
            ->assertSessionHas('flash_success', 'Salliess has been created.')
            ->assertRedirect(route(Gallery::ROUTE_ADMIN_PATH . '.show', $model));

        $this->assertDatabaseHas((new Gallery)->getTable(), [
            'title' => 'Salliess',
        ]);
    }

    /**
     * @test
     */
    public function galleryUpdate()
    {
        $model = Gallery::create([
            'title' => 'old Salliess',
        ]);

        $dataNew = [
            'title' => 'new Salliess',
        ];

        $response = $this->put(route(Gallery::ROUTE_ADMIN_PATH . '.update', $model), $dataNew);

        // get the updated data
        $model = Gallery::find($model->id);

        $response
            ->assertStatus(302)
            ->assertSessionHas('flash_success', 'new Salliess has been updated.')
            ->assertRedirect(route(Gallery::ROUTE_ADMIN_PATH . '.show', $model));

        $this->assertDatabaseHas((new Gallery)->getTable(), $dataNew);
    }
}
