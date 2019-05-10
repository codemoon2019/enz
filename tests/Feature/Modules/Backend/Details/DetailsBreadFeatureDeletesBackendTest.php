<?php

namespace Tests\Feature\Modules\Backend\Details;

use App\Models\Details\Details;
use Tests\TestCase;


/**
 * Class DetailsBreadFeatureDeletesBackendTest
 * @package Tests\Feature\Modules\Backend\Details
 */
class DetailsBreadFeatureDeletesBackendTest extends TestCase
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
    public function detailsDestroy()
    {
        $model = Details::create([
            'title' => 'Salliess',
        ]);

        $response = $this->delete(route(Details::ROUTE_ADMIN_PATH . '.destroy', $model));

        $response
            ->assertStatus(302)
            ->assertSessionHas('flash_success', 'Salliess has been deleted.')
            ->assertRedirect(route(Details::ROUTE_ADMIN_PATH . '.index'));

        $this->assertDatabaseMissing((new Details)->getTable(), [
            'id' => $model->id,
        ]);
    }
}
