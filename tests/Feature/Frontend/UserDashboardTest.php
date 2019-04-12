<?php

namespace Tests\Feature\Frontend;

use Tests\TestCase;

class UserDashboardTest extends TestCase
{

    /** @test */
    public function unauthenticated_users_cant_access_the_dashboard()
    {
        $this->get('/dashboard')->assertRedirect('/login');
    }
}
