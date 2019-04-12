<?php

namespace Tests\Feature\Backend\Role;

use App\Events\Backend\Auth\Role\RoleDeleted;
use App\Models\Auth\Role;
use Event;
use Tests\TestCase;

class DeleteRoleTest extends TestCase
{

    /** @test */
    public function a_role_can_be_deleted()
    {
        $role = factory(Role::class)->create();
        $this->loginAsSystem();

        $this->assertDatabaseHas(config('permission.table_names.roles'), ['id' => $role->id]);

        $this->delete("/admin/auth/roles/{$role->id}");

        $this->assertDatabaseMissing(config('permission.table_names.roles'), ['id' => $role->id]);
    }

    /** @test */
    public function a_role_with_assigned_users_cant_be_deleted()
    {
        $this->loginAsSystem();

        $response = $this->delete('/admin/auth/roles/1');

        $response->assertSessionHas(['flash_danger' => __('exceptions.backend.access.roles.cant_delete_admin')]);
    }

    /** @test */
    public function an_event_gets_dispatched()
    {
        $role = factory(Role::class)->create();
        Event::fake();
        $this->loginAsSystem();

        $this->delete("/admin/auth/roles/{$role->id}");

        Event::assertDispatched(RoleDeleted::class);
    }
}
