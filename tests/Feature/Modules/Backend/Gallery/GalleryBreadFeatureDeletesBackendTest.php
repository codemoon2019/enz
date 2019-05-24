<?php

namespace Tests\Feature\Modules\Backend\Gallery;

use App\Models\Gallery\Gallery;
use Tests\TestCase;


/**
 * Class GalleryBreadFeatureDeletesBackendTest
 * @package Tests\Feature\Modules\Backend\Gallery
 */
class GalleryBreadFeatureDeletesBackendTest extends TestCase
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
    public function galleryDestroy()
    {
        $model = Gallery::create([
            'title' => 'Salliess',
        ]);

        $response = $this->delete(route(Gallery::ROUTE_ADMIN_PATH . '.destroy', $model));

        $response
            ->assertStatus(302)
            ->assertSessionHas('flash_success', 'Salliess has been deleted.')
            ->assertRedirect(route(Gallery::ROUTE_ADMIN_PATH . '.index'));

        $this->assertDatabaseMissing((new Gallery)->getTable(), [
            'id' => $model->id,
        ]);
    }
}
