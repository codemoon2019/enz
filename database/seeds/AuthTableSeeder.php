<?php

use Illuminate\Database\Seeder;

/**
 * Class AuthTableSeeder
 */
class AuthTableSeeder extends Seeder
{
    use DisableForeignKeys;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->disableForeignKeys();

        $this->command->info('Auth Seeders ...');
        $this->call([
            PermissionRoleTableSeeder::class,
            UserTableSeeder::class,
            UserRoleTableSeeder::class,
        ]);
        $this->command->info('Auth Seeders done!');

        $this->enableForeignKeys();
    }
}
