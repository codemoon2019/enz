<?php

namespace Tests\Feature\Modules\Frontend\News;

use App\Models\News\News;
use Tests\TestCase;

/**
 * Class NewsFeatureFrontendTest
 * @package Tests\Feature\Modules\Frontend\News
 */
class NewsFeatureFrontendTest extends TestCase
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
    public function newsRouteFrontShowExist()
    {
        $model = News::first();
        $this->get(route(News::ROUTE_FRONTEND_PATH . '.show', $model))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function newsRouteFrontIndexExist()
    {
        $this->get(route(News::ROUTE_FRONTEND_PATH . '.index'))
            ->assertStatus(200);
    }
}
