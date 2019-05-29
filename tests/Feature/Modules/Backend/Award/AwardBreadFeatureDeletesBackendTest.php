<?php

namespace Tests\Feature\Modules\Backend\Award;

use App\Models\Award\Award;
use Tests\TestCase;


/**
 * Class AwardBreadFeatureDeletesBackendTest
 * @package Tests\Feature\Modules\Backend\Award
 */
class AwardBreadFeatureDeletesBackendTest extends TestCase
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
    public function awardDestroy()
    {
        $model = Award::create([
            'title' => 'Salliess',
        ]);

        $response = $this->delete(route(Award::ROUTE_ADMIN_PATH . '.destroy', $model));

        $response
            ->assertStatus(302)
            ->assertSessionHas('flash_success', 'Salliess has been deleted.')
            ->assertRedirect(route(Award::ROUTE_ADMIN_PATH . '.index'));

        $this->assertDatabaseMissing((new Award)->getTable(), [
            'id' => $model->id,
        ]);
    }
}
