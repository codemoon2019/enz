<?php

use App\Models\Auth\User;
use Illuminate\Database\Seeder;

/**
 * Class UserTableSeeder.
 */
class UserTableSeeder extends Seeder
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

        // Add the master administrator, user id of 1
        User::create([
            'first_name' => 'System',
            'last_name' => 'Administrator',
            'email' => 'system@system.com',
            'password' => Hash::make(app()->environment() == 'staging' ? 'f#$Qsa4GA269' : '1234'),
            'confirmation_code' => md5(uniqid(mt_rand(), true)),
            'confirmed' => true,
        ]);

        User::create([
            'first_name' => 'ENZ Education',
            'last_name' => 'Administrator',
            'email' => 'admin@admin.com',
            'password' => Hash::make(app()->environment() == 'staging' ? '^2asdsdgA4W63749' : '1234'),
            'confirmation_code' => md5(uniqid(mt_rand(), true)),
            'confirmed' => true,
        ]);

        /* User::create([
            'first_name' => 'Anonymous',
            'last_name' => 'User',
            'email' => 'user@user.com',
            'password' => Hash::make('1234'),
            'confirmation_code' => md5(uniqid(mt_rand(), true)),
            'confirmed' => true,
        ]); */

        $this->enableForeignKeys();
    }
}
