<?php

namespace Tests\Feature\Backend\User;

use App\Models\Auth\User;
use Tests\TestCase;

class ImpersonateUserTest extends TestCase
{

    /** @test */
    public function an_admin_can_impersonate_other_users()
    {
        $user = factory(User::class)->create();
        $admin = $this->loginAsSystem();

        $this->assertAuthenticatedAs($admin);

        $this->get("/admin/auth/users/{$user->slug}/login-as");

        $this->assertAuthenticatedAs($user);
    }

    /** @test */
    public function an_admin_can_exit_an_impersonation()
    {
        $admin = $this->loginAsSystem();
        $user = factory(User::class)->create();

        $this->assertAuthenticatedAs($admin);

        $this->get("/admin/auth/users/{$user->slug}/login-as");

        $this->assertAuthenticatedAs($user);

        $this->get('/logout-as');

        $this->assertAuthenticatedAs($admin);
    }

    /** @test */
    public function impersonation_of_himself_does_not_work()
    {
        $admin = $this->loginAsSystem();

        $response = $this->get("/admin/auth/users/{$admin->slug}/login-as");

        $response->assertSessionHas(['flash_danger' => 'Do not try to login as yourself.']);
    }
}
