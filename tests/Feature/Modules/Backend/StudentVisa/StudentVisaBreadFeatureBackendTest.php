<?php

namespace Tests\Feature\Modules\Backend\StudentVisa;

use App\Models\StudentVisa\StudentVisa;
use Tests\TestCase;


/**
 * Class StudentVisaBreadFeatureBackendTest
 * @package Tests\Feature\Modules\Backend\StudentVisa
 */
class StudentVisaBreadFeatureBackendTest extends TestCase
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
    public function studentVisaCreateRouteExist()
    {
        $this->get(route(StudentVisa::ROUTE_ADMIN_PATH . '.create'))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function studentVisaShowRouteExist()
    {
        $model = StudentVisa::first();

        $this->get(route(StudentVisa::ROUTE_ADMIN_PATH . '.show', $model))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function studentVisaEditRouteExist()
    {
        $model = StudentVisa::first();

        $this->get(route(StudentVisa::ROUTE_ADMIN_PATH . '.edit', $model))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function studentVisaStore()
    {
        $response = $this->post(route(StudentVisa::ROUTE_ADMIN_PATH . '.store'), [
            'title' => 'Salliess',
        ]);

        $model = StudentVisa::orderBy('id', 'desc')->first();

        $response
            ->assertStatus(302)
            ->assertSessionHas('flash_success', 'Salliess has been created.')
            ->assertRedirect(route(StudentVisa::ROUTE_ADMIN_PATH . '.show', $model));

        $this->assertDatabaseHas((new StudentVisa)->getTable(), [
            'title' => 'Salliess',
        ]);
    }

    /**
     * @test
     */
    public function studentVisaUpdate()
    {
        $model = StudentVisa::create([
            'title' => 'old Salliess',
        ]);

        $dataNew = [
            'title' => 'new Salliess',
        ];

        $response = $this->put(route(StudentVisa::ROUTE_ADMIN_PATH . '.update', $model), $dataNew);

        // get the updated data
        $model = StudentVisa::find($model->id);

        $response
            ->assertStatus(302)
            ->assertSessionHas('flash_success', 'new Salliess has been updated.')
            ->assertRedirect(route(StudentVisa::ROUTE_ADMIN_PATH . '.show', $model));

        $this->assertDatabaseHas((new StudentVisa)->getTable(), $dataNew);
    }
}
