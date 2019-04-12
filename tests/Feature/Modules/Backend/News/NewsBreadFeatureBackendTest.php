<?php

namespace Tests\Feature\Modules\Backend\News;

use App\Models\News\News;
use Tests\TestCase;


/**
 * Class NewsBreadFeatureBackendTest
 * @package Tests\Feature\Modules\Backend\News
 */
class NewsBreadFeatureBackendTest extends TestCase
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
    public function newsCreateRouteExist()
    {
        $this->get(route(News::ROUTE_ADMIN_PATH . '.create'))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function newsShowRouteExist()
    {
        $model = News::first();

        $this->get(route(News::ROUTE_ADMIN_PATH . '.show', $model))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function newsEditRouteExist()
    {
        $model = News::first();

        $this->get(route(News::ROUTE_ADMIN_PATH . '.edit', $model))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function newsStore()
    {
        $response = $this->post(route(News::ROUTE_ADMIN_PATH . '.store'), [
            'title' => 'Salliess',
        ]);

        $model = News::orderBy('id', 'desc')->first();

        $response
            ->assertStatus(302)
            ->assertSessionHas('flash_success', 'Salliess has been created.')
            ->assertRedirect(route(News::ROUTE_ADMIN_PATH . '.show', $model));

        $this->assertDatabaseHas((new News)->getTable(), [
            'title' => 'Salliess',
        ]);
    }

    /**
     * @test
     */
    public function newsUpdate()
    {
        $model = News::create([
            'title' => 'old Salliess',
        ]);

        $dataNew = [
            'title' => 'new Salliess',
        ];

        $response = $this->put(route(News::ROUTE_ADMIN_PATH . '.update', $model), $dataNew);

        // get the updated data
        $model = News::find($model->id);

        $response
            ->assertStatus(302)
            ->assertSessionHas('flash_success', 'new Salliess has been updated.')
            ->assertRedirect(route(News::ROUTE_ADMIN_PATH . '.show', $model));

        $this->assertDatabaseHas((new News)->getTable(), $dataNew);
    }
}
