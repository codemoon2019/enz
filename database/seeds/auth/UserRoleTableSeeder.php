<?php

use App\Models\Auth\User;
use Illuminate\Database\Seeder;

/**
 * Class UserRoleTableSeeder.
 */
class UserRoleTableSeeder extends Seeder
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

        User::where('email', 'system@system.com')->first()->assignRole(config('access.users.system_role'));
        User::where('email', 'admin@admin.com')->first()->assignRole(config('access.users.admin_role'));
        // User::where('email', 'user@user.com')->first()->assignRole(config('access.users.default_role'));

        $this->enableForeignKeys();
    }
}
