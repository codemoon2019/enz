<?php

namespace Tests\Feature\Modules\Backend\Testimonial;

use App\Models\Testimonial\Testimonial;
use Tests\TestCase;


/**
 * Class TestimonialBreadFeatureDeletesBackendTest
 * @package Tests\Feature\Modules\Backend\Testimonial
 */
class TestimonialBreadFeatureDeletesBackendTest extends TestCase
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
    public function testimonialDestroy()
    {
        $model = Testimonial::create([
            'title' => 'Salliess',
        ]);

        $response = $this->delete(route(Testimonial::ROUTE_ADMIN_PATH . '.destroy', $model));

        $response
            ->assertStatus(302)
            ->assertSessionHas('flash_success', 'Salliess has been deleted.')
            ->assertRedirect(route(Testimonial::ROUTE_ADMIN_PATH . '.index'));

        $this->assertDatabaseMissing((new Testimonial)->getTable(), [
            'id' => $model->id,
        ]);
    }
}
