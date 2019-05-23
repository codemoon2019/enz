<?php

namespace Tests\Feature\Modules\Backend\BecomeOurClientInquiry;

use App\Models\BecomeOurClientInquiry\BecomeOurClientInquiry;
use Tests\TestCase;


/**
 * Class BecomeOurClientInquiryBreadFeatureBackendTest
 * @package Tests\Feature\Modules\Backend\BecomeOurClientInquiry
 */
class BecomeOurClientInquiryBreadFeatureBackendTest extends TestCase
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
    public function becomeOurClientInquiryCreateRouteExist()
    {
        $this->get(route(BecomeOurClientInquiry::ROUTE_ADMIN_PATH . '.create'))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function becomeOurClientInquiryShowRouteExist()
    {
        $model = BecomeOurClientInquiry::first();

        $this->get(route(BecomeOurClientInquiry::ROUTE_ADMIN_PATH . '.show', $model))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function becomeOurClientInquiryEditRouteExist()
    {
        $model = BecomeOurClientInquiry::first();

        $this->get(route(BecomeOurClientInquiry::ROUTE_ADMIN_PATH . '.edit', $model))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function becomeOurClientInquiryStore()
    {
        $response = $this->post(route(BecomeOurClientInquiry::ROUTE_ADMIN_PATH . '.store'), [
            'title' => 'Salliess',
        ]);

        $model = BecomeOurClientInquiry::orderBy('id', 'desc')->first();

        $response
            ->assertStatus(302)
            ->assertSessionHas('flash_success', 'Salliess has been created.')
            ->assertRedirect(route(BecomeOurClientInquiry::ROUTE_ADMIN_PATH . '.show', $model));

        $this->assertDatabaseHas((new BecomeOurClientInquiry)->getTable(), [
            'title' => 'Salliess',
        ]);
    }

    /**
     * @test
     */
    public function becomeOurClientInquiryUpdate()
    {
        $model = BecomeOurClientInquiry::create([
            'title' => 'old Salliess',
        ]);

        $dataNew = [
            'title' => 'new Salliess',
        ];

        $response = $this->put(route(BecomeOurClientInquiry::ROUTE_ADMIN_PATH . '.update', $model), $dataNew);

        // get the updated data
        $model = BecomeOurClientInquiry::find($model->id);

        $response
            ->assertStatus(302)
            ->assertSessionHas('flash_success', 'new Salliess has been updated.')
            ->assertRedirect(route(BecomeOurClientInquiry::ROUTE_ADMIN_PATH . '.show', $model));

        $this->assertDatabaseHas((new BecomeOurClientInquiry)->getTable(), $dataNew);
    }
}
