<?php

use App\Models\Auth\User;
use App\Models\SampleModule\SampleModule;
use HalcyonLaravel\Base\Database\Traits\SeederHelper;
use Illuminate\Database\Seeder;

/**
 * Class SampleModulePermissionTableSeeder
 */
class SampleModulePermissionTableSeeder extends Seeder
{
    use DisableForeignKeys;
    use SeederHelper;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->disableForeignKeys();

        $this->seederPermission(new SampleModule);

        $this->enableForeignKeys();
    }

}
