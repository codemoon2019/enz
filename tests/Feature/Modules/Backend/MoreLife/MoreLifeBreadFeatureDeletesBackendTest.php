<?php

namespace Tests\Feature\Modules\Backend\MoreLife;

use App\Models\MoreLife\MoreLife;
use Tests\TestCase;


/**
 * Class MoreLifeBreadFeatureDeletesBackendTest
 * @package Tests\Feature\Modules\Backend\MoreLife
 */
class MoreLifeBreadFeatureDeletesBackendTest extends TestCase
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
    public function moreLifeDestroy()
    {
        $model = MoreLife::create([
            'title' => 'Salliess',
        ]);

        $response = $this->delete(route(MoreLife::ROUTE_ADMIN_PATH . '.destroy', $model));

        $response
            ->assertStatus(302)
            ->assertSessionHas('flash_success', 'Salliess has been deleted.')
            ->assertRedirect(route(MoreLife::ROUTE_ADMIN_PATH . '.index'));

        $this->assertDatabaseMissing((new MoreLife)->getTable(), [
            'id' => $model->id,
        ]);
    }
}
