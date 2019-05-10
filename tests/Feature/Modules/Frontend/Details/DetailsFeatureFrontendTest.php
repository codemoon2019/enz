<?php

namespace Tests\Feature\Modules\Frontend\Details;

use App\Models\Details\Details;
use Tests\TestCase;

/**
 * Class DetailsFeatureFrontendTest
 * @package Tests\Feature\Modules\Frontend\Details
 */
class DetailsFeatureFrontendTest extends TestCase
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
    public function detailsRouteFrontShowExist()
    {
        $model = Details::first();
        $this->get(route(Details::ROUTE_FRONTEND_PATH . '.show', $model))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function detailsRouteFrontIndexExist()
    {
        $this->get(route(Details::ROUTE_FRONTEND_PATH . '.index'))
            ->assertStatus(200);
    }
}
