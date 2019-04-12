<?php

use Illuminate\Database\Seeder;

/**
 * Class PermissionRoleTableSeeder.
 */
class PermissionRoleTableSeeder extends Seeder
{
    use DisableForeignKeys;

    /**
     * Run the database seed.
     *
     * @return void
     */
    public function run()
    {
        $this->disableForeignKeys();

        $roleModel = resolve(config('permission.models.role'));

        // Create Roles
        $system = $roleModel::create(['name' => config('access.users.system_role')]);
        $admin = $roleModel::create(['name' => config('access.users.admin_role')]);
        // $user = $roleModel::create(['name' => config('access.users.default_role')]);

        // Create Permissions
        $viewBackend = resolve(config('permission.models.permission'))::create([
            'name' => config('access.users.default_permissions.back_end_view_permission'),
        ]);

        // ALWAYS GIVE SYSTEN ROLE ALL PERMISSIONS
        $system->givePermissionTo($viewBackend);

        // Assign Permissions to other Roles
        $admin->givePermissionTo($viewBackend);

        $this->enableForeignKeys();
    }
}
