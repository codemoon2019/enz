<?php

namespace Tests\Feature\Modules\Frontend\Gallery;

use App\Models\Gallery\Gallery;
use Tests\TestCase;

/**
 * Class GalleryFeatureFrontendTest
 * @package Tests\Feature\Modules\Frontend\Gallery
 */
class GalleryFeatureFrontendTest extends TestCase
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
    public function galleryRouteFrontShowExist()
    {
        $model = Gallery::first();
        $this->get(route(Gallery::ROUTE_FRONTEND_PATH . '.show', $model))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function galleryRouteFrontIndexExist()
    {
        $this->get(route(Gallery::ROUTE_FRONTEND_PATH . '.index'))
            ->assertStatus(200);
    }
}
