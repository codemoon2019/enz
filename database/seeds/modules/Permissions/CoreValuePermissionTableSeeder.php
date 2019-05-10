<?php

use App\Models\Auth\User;
use App\Models\CoreValue\CoreValue;
use HalcyonLaravel\Base\Database\Traits\SeederHelper;
use Illuminate\Database\Seeder;

/**
 * Class CoreValuePermissionTableSeeder
 */
class CoreValuePermissionTableSeeder extends Seeder
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

        $this->seederPermission(new CoreValue);

        $this->enableForeignKeys();
    }

}
