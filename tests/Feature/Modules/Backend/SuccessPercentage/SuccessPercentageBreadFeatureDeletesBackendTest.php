<?php

namespace Tests\Feature\Modules\Backend\SuccessPercentage;

use App\Models\SuccessPercentage\SuccessPercentage;
use Tests\TestCase;


/**
 * Class SuccessPercentageBreadFeatureDeletesBackendTest
 * @package Tests\Feature\Modules\Backend\SuccessPercentage
 */
class SuccessPercentageBreadFeatureDeletesBackendTest extends TestCase
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
    public function successPercentageDestroy()
    {
        $model = SuccessPercentage::create([
            'title' => 'Salliess',
        ]);

        $response = $this->delete(route(SuccessPercentage::ROUTE_ADMIN_PATH . '.destroy', $model));

        $response
            ->assertStatus(302)
            ->assertSessionHas('flash_success', 'Salliess has been deleted.')
            ->assertRedirect(route(SuccessPercentage::ROUTE_ADMIN_PATH . '.index'));

        $this->assertDatabaseMissing((new SuccessPercentage)->getTable(), [
            'id' => $model->id,
        ]);
    }
}
