<?php

namespace Tests\Feature\Modules\Backend\News;

use App\Models\News\News;
use Tests\TestCase;


/**
 * Class NewsBreadFeatureDeletesBackendTest
 * @package Tests\Feature\Modules\Backend\News
 */
class NewsBreadFeatureDeletesBackendTest extends TestCase
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
    public function newsDestroy()
    {
        $model = News::create([
            'title' => 'Salliess',
        ]);

        $response = $this->delete(route(News::ROUTE_ADMIN_PATH . '.destroy', $model));

        $response
            ->assertStatus(302)
            ->assertSessionHas('flash_success', 'Salliess has been deleted.')
            ->assertRedirect(route(News::ROUTE_ADMIN_PATH . '.index'));

        $this->assertDatabaseMissing((new News)->getTable(), [
            'id' => $model->id,
        ]);
    }
}
