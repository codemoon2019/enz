<?php

namespace Tests\Feature\Modules\Backend\BecomeOurClientInquiry;

use App\Models\BecomeOurClientInquiry\BecomeOurClientInquiry;
use Tests\TestCase;


/**
 * Class BecomeOurClientInquiryBreadFeatureDeletesBackendTest
 * @package Tests\Feature\Modules\Backend\BecomeOurClientInquiry
 */
class BecomeOurClientInquiryBreadFeatureDeletesBackendTest extends TestCase
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
    public function becomeOurClientInquiryDestroy()
    {
        $model = BecomeOurClientInquiry::create([
            'title' => 'Salliess',
        ]);

        $response = $this->delete(route(BecomeOurClientInquiry::ROUTE_ADMIN_PATH . '.destroy', $model));

        $response
            ->assertStatus(302)
            ->assertSessionHas('flash_success', 'Salliess has been deleted.')
            ->assertRedirect(route(BecomeOurClientInquiry::ROUTE_ADMIN_PATH . '.index'));

        $this->assertDatabaseMissing((new BecomeOurClientInquiry)->getTable(), [
            'id' => $model->id,
        ]);
    }
}
