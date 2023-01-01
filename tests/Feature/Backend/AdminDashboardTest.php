<?php

namespace Tests\Feature\Backend;

use App\Models\Auth\User;
use Tests\TestCase;

/**
 * Class AdminDashboardTest.
 */
class AdminDashboardTest extends TestCase
{

    /** @test */
    public function unauthenticated_users_cant_access_admin_dashboard()
    {
        $this->get('/admin/dashboard')->assertRedirect('/login');
    }

    /** @test */
    public function not_authorized_users_cant_access_admin_dashboard()
    {
        $this->actingAs(factory(User::class)->create());

        $response = $this->get('/admin/dashboard');

        $response->assertRedirect('/dashboard');
    }

    /** @test */
    public function admin_can_access_admin_dashboard()
    {
        $this->loginAsSystem();

        $this->get('/admin/dashboard')->assertStatus(200);
    }
}
