<?php

namespace Tests\Feature\Backend\Role;

use App\Events\Backend\Auth\Role\RoleCreated;
use App\Models\Auth\Role;
use Event;
use Tests\TestCase;

class CreateRoleTest extends TestCase
{
    /** @test */
    public function an_admin_can_access_the_create_role_page()
    {
        $this->loginAsSystem();

        $this->get('/admin/auth/roles/create')->assertStatus(200);
    }

    /** @test */
    public function the_name_is_required()
    {
        $this->loginAsSystem();

        $response = $this->post('/admin/auth/roles', ['name' => '']);

        $response->assertSessionHasErrors('name');
    }

    /** @test */
    public function the_name_must_be_unique()
    {
        $this->loginAsSystem();

        $response = $this->post('/admin/auth/roles', ['name' => config('access.users.system_role')]);

        $response->assertSessionHasErrors('name');
    }

    /** @test */
    public function at_least_one_permission_is_required()
    {
        $this->loginAsSystem();

        $response = $this->post('/admin/auth/roles', ['name' => 'new role']);

        $response->assertSessionHas(['flash_danger' => __('exceptions.backend.access.roles.needs_permission')]);
    }

    /** @test */
    public function a_role_can_be_created()
    {
        $this->loginAsSystem();

        $this->post('/admin/auth/roles', [
            'name' => 'new role',
            'permissions' => [config('access.users.default_permissions.back_end_view_permission')]
        ]);

        $role = Role::where(['name' => 'new role'])->first();

        $this->assertTrue($role->hasPermissionTo(config('access.users.default_permissions.back_end_view_permission')));
    }

    /** @test */
    public function an_event_gets_dispatched()
    {
        $this->loginAsSystem();
        Event::fake();

        $this->post('/admin/auth/roles', [
            'name' => 'new role',
            'permissions' => [config('access.users.default_permissions.back_end_view_permission')]
        ]);

        Event::assertDispatched(RoleCreated::class);
    }
}
