<?php

namespace Tests\Feature\Modules\Backend\Testimonial;

use App\Models\Testimonial\Testimonial;
use Tests\TestCase;


/**
 * Class TestimonialBreadFeatureBackendTest
 * @package Tests\Feature\Modules\Backend\Testimonial
 */
class TestimonialBreadFeatureBackendTest extends TestCase
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
    public function testimonialCreateRouteExist()
    {
        $this->get(route(Testimonial::ROUTE_ADMIN_PATH . '.create'))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function testimonialShowRouteExist()
    {
        $model = Testimonial::first();

        $this->get(route(Testimonial::ROUTE_ADMIN_PATH . '.show', $model))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function testimonialEditRouteExist()
    {
        $model = Testimonial::first();

        $this->get(route(Testimonial::ROUTE_ADMIN_PATH . '.edit', $model))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function testimonialStore()
    {
        $response = $this->post(route(Testimonial::ROUTE_ADMIN_PATH . '.store'), [
            'title' => 'Salliess',
        ]);

        $model = Testimonial::orderBy('id', 'desc')->first();

        $response
            ->assertStatus(302)
            ->assertSessionHas('flash_success', 'Salliess has been created.')
            ->assertRedirect(route(Testimonial::ROUTE_ADMIN_PATH . '.show', $model));

        $this->assertDatabaseHas((new Testimonial)->getTable(), [
            'title' => 'Salliess',
        ]);
    }

    /**
     * @test
     */
    public function testimonialUpdate()
    {
        $model = Testimonial::create([
            'title' => 'old Salliess',
        ]);

        $dataNew = [
            'title' => 'new Salliess',
        ];

        $response = $this->put(route(Testimonial::ROUTE_ADMIN_PATH . '.update', $model), $dataNew);

        // get the updated data
        $model = Testimonial::find($model->id);

        $response
            ->assertStatus(302)
            ->assertSessionHas('flash_success', 'new Salliess has been updated.')
            ->assertRedirect(route(Testimonial::ROUTE_ADMIN_PATH . '.show', $model));

        $this->assertDatabaseHas((new Testimonial)->getTable(), $dataNew);
    }
}
