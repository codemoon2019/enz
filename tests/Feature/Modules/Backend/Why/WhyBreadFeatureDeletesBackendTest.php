<?php

namespace Tests\Feature\Modules\Backend\Why;

use App\Models\Why\Why;
use Tests\TestCase;


/**
 * Class WhyBreadFeatureDeletesBackendTest
 * @package Tests\Feature\Modules\Backend\Why
 */
class WhyBreadFeatureDeletesBackendTest extends TestCase
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
    public function whyDestroy()
    {
        $model = Why::create([
            'title' => 'Salliess',
        ]);

        $response = $this->delete(route(Why::ROUTE_ADMIN_PATH . '.destroy', $model));

        $response
            ->assertStatus(302)
            ->assertSessionHas('flash_success', 'Salliess has been deleted.')
            ->assertRedirect(route(Why::ROUTE_ADMIN_PATH . '.index'));

        $this->assertDatabaseMissing((new Why)->getTable(), [
            'id' => $model->id,
        ]);
    }
}
