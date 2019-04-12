<?php

namespace Tests\Feature\Frontend;

use Tests\TestCase;

class BaseUrlTest extends TestCase
{

    /** @test */
    public function the_base_url_exists()
    {
        $this->prepareSlider();
        $this->preparePages(false);
        $this->prepareMenu(false);
        $r = $this->get('/');
        // dd($r);
        $r->assertStatus(200);
    }
}
