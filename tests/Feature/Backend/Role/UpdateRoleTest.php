<?php

namespace Tests\Feature\Backend\Role;

use App\Events\Backend\Auth\Role\RoleUpdated;
use App\Models\Auth\Role;
use Event;
use Tests\TestCase;

class UpdateRoleTest extends TestCase
{

    /** @test */
    public function an_admin_can_access_the_edit_role_page()
    {
        $role = factory(Role::class)->create();
        $this->loginAsSystem();

        $this->get("/admin/auth/roles/{$role->id}/edit")->assertStatus(200);
    }

    /** @test */
    public function name_is_required()
    {
        $role = factory(Role::class)->create();
        $this->loginAsSystem();

        $response = $this->patch("/admin/auth/roles/{$role->id}", ['name' => '']);

        $response->assertSessionHasErrors('name');
    }

    /** @test */
    public function at_least_one_permission_is_required()
    {
        $role = factory(Role::class)->create();
        $this->loginAsSystem();

        $response = $this->patch("/admin/auth/roles/{$role->id}", ['name' => 'new role']);

        $response->assertSessionHas(['flash_danger' => __('exceptions.backend.access.roles.needs_permission')]);
    }

    /** @test */
    public function a_role_name_can_be_updated()
    {
        $role = factory(Role::class)->create();
        $this->loginAsSystem();

        $this->patch("/admin/auth/roles/{$role->id}", [
            'name' => 'new name',
            'permissions' => [config('access.users.default_permissions.back_end_view_permission')]
        ]);

        $this->assertEquals('new name', $role->fresh()->name);
    }

    /** @test */
    public function an_event_gets_dispatched()
    {
        $role = factory(Role::class)->create();
        Event::fake();
        $this->loginAsSystem();

        $this->patch("/admin/auth/roles/{$role->id}", [
            'name' => 'new name',
            'permissions' => [config('access.users.default_permissions.back_end_view_permission')]
        ]);

        Event::assertDispatched(RoleUpdated::class);
    }
}
