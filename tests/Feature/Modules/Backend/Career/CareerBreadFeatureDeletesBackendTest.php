<?php

namespace Tests\Feature\Modules\Backend\Career;

use App\Models\Career\Career;
use Tests\TestCase;


/**
 * Class CareerBreadFeatureDeletesBackendTest
 * @package Tests\Feature\Modules\Backend\Career
 */
class CareerBreadFeatureDeletesBackendTest extends TestCase
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
    public function careerDestroy()
    {
        $model = Career::create([
            'title' => 'Salliess',
        ]);

        $response = $this->delete(route(Career::ROUTE_ADMIN_PATH . '.destroy', $model));

        $response
            ->assertStatus(302)
            ->assertSessionHas('flash_success', 'Salliess has been deleted.')
            ->assertRedirect(route(Career::ROUTE_ADMIN_PATH . '.index'));

        $this->assertDatabaseMissing((new Career)->getTable(), [
            'id' => $model->id,
        ]);
    }
}
