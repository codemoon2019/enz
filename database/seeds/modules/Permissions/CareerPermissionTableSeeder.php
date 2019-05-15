<?php

use App\Models\Auth\User;
use App\Models\Career\Career;
use HalcyonLaravel\Base\Database\Traits\SeederHelper;
use Illuminate\Database\Seeder;

/**
 * Class CareerPermissionTableSeeder
 */
class CareerPermissionTableSeeder extends Seeder
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

        $this->seederPermission(new Career);

        $this->enableForeignKeys();
    }

}
