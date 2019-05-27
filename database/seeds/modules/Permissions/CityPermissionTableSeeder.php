<?php

use App\Models\Auth\User;
use App\Models\City\City;
use HalcyonLaravel\Base\Database\Traits\SeederHelper;
use Illuminate\Database\Seeder;

/**
 * Class CityPermissionTableSeeder
 */
class CityPermissionTableSeeder extends Seeder
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

        $this->seederPermission(new City);

        $this->enableForeignKeys();
    }

}
