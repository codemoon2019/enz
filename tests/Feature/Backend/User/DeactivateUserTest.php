<?php

namespace Tests\Backend\User;

use App\Events\Backend\Auth\User\UserDeactivated;
use App\Events\Backend\Auth\User\UserReactivated;
use App\Models\Auth\User;
use Event;
use Tests\TestCase;

class DeactivateUserTest extends TestCase
{

    /** @test */
    public function an_admin_can_access_deactivated_users_page()
    {
        $this->loginAsSystem();

        $response = $this->get('/admin/auth/users/deactivated');

        $response->assertStatus(200);
    }

    /** @test */
    public function an_admin_can_deactivate_users()
    {
        $this->loginAsSystem();
        $user = factory(User::class)->create();
        Event::fake();

        $this->get("/admin/auth/users/{$user->slug}/mark/0")
            ->assertStatus(302);

        $this->assertEquals(0, $user->fresh()->active);
        Event::assertDispatched(UserDeactivated::class);
    }

    /** @test */
    public function an_admin_can_reactivate_users()
    {
        $this->loginAsSystem();
        $user = factory(User::class)->states('inactive')->create();
        Event::fake();

        $this->get("/admin/auth/users/{$user->slug}/mark/1")
            ->assertStatus(302);

        $this->assertEquals(1, $user->fresh()->active);
        Event::assertDispatched(UserReactivated::class);
    }

    /** @test */
    public function an_admin_cant_deactivate_himself()
    {
        $admin = $this->loginAsSystem();

        $response = $this->get("/admin/auth/users/{$admin->slug}/mark/0");

        $response->assertSessionHas(['flash_danger' => __('exceptions.backend.access.users.cant_deactivate_self')]);
    }
}
