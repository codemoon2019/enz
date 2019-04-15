<?php

use App\Models\Auth\User;
use App\Models\Service\Service;
use HalcyonLaravel\Base\Database\Traits\SeederHelper;
use Illuminate\Database\Seeder;

/**
 * Class ServicePermissionTableSeeder
 */
class ServicePermissionTableSeeder extends Seeder
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

        $this->seederPermission(new Service);

        $this->enableForeignKeys();
    }

}
