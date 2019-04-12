<?php

namespace Tests\Feature\Backend\User;

use App\Events\Backend\Auth\User\UserPermanentlyDeleted;
use App\Events\Backend\Auth\User\UserRestored;
use App\Models\Auth\User;
use Event;
use Tests\TestCase;

class DeleteUserTest extends TestCase
{

    /** @test */
    public function an_admin_can_access_deleted_users_page()
    {
        $this->loginAsSystem();

        $response = $this->get('/admin/auth/users/deleted');

        $response->assertStatus(200);
    }

    /** @test */
    public function a_user_must_be_soft_deleted_before_permanently_deleted()
    {
        $this->loginAsSystem();
        $user = factory(User::class)->create();

        $response = $this->get("/admin/auth/users/{$user->slug}/delete");

        $response->assertSessionHas(['flash_danger' => __('exceptions.backend.access.users.delete_first')]);
    }

    /** @test */
    public function an_admin_can_restore_users()
    {
        $this->loginAsSystem();
        $user = factory(User::class)->states('softDeleted')->create();
        Event::fake();

        $response = $this->get("/admin/auth/users/{$user->slug}/restore");
        $response->assertSessionHas(['flash_success' => 'The user was successfully restored.']);

        $this->assertNull($user->fresh()->deleted_at);
        Event::assertDispatched(UserRestored::class);
    }

    /** @test */
    public function a_user_can_be_permanently_deleted()
    {
        $this->loginAsSystem();
        $user = factory(User::class)->states('softDeleted')->create();
        Event::fake();

        $response = $this->get("/admin/auth/users/{$user->slug}/delete");

        $this->assertNull($user->fresh());
        $response->assertSessionHas(['flash_success' => __('alerts.backend.users.deleted_permanently')]);
        Event::assertDispatched(UserPermanentlyDeleted::class);
    }

    /** @test */
    public function a_not_deleted_user_cant_be_restored()
    {
        $this->loginAsSystem();
        $user = factory(User::class)->create();

        $response = $this->get("/admin/auth/users/{$user->slug}/restore");

        $response->assertSessionHas(['flash_danger' => __('exceptions.backend.access.users.cant_restore')]);
    }

    /** @test */
    public function a_user_can_be_deleted()
    {
        $this->loginAsSystem();
        $user = factory(User::class)->create();

        $response = $this->delete("/admin/auth/users/{$user->slug}");

        $response->assertSessionHas(['flash_success' => __('alerts.backend.users.deleted')]);
        $this->assertDatabaseMissing(config('access.table_names.users'), ['id' => $user->id, 'deleted_at' => null]);
    }
}
