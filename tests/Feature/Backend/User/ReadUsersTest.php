<?php

namespace Tests\Feature\Backend\User;

use App\Models\Auth\User;
use Tests\TestCase;

class ReadUsersTest extends TestCase
{

    /** @test */
    public function an_admin_can_access_active_users_page()
    {
        $this->loginAsSystem();

        $response = $this->get('/admin/auth/users/create');

        $response->assertStatus(200);
    }

    /** @test */
    public function an_admin_can_view_single_user_page()
    {
        $this->loginAsSystem();
        $user = factory(User::class)->create();

        $response = $this->get("/admin/auth/users/{$user->slug}");

        $response->assertStatus(200);
    }
}
