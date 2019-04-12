<?php

use Illuminate\Database\Seeder;

/**
 * Class ModuleTableSeeder
 */
class ModuleTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seeders = [];
        foreach (include_files(__DIR__ . '/modules/', false) as $class) {
            $class = explode('/', $class);
            $class = $class[count($class) - 1];
            $seeders[] = str_replace('.php', '', $class);
        }

        $this->command->info('Module Seeders ...');
        $this->call($seeders);
        $this->command->info('Module Seeders done!');
    }
}
