<?php

use App\Models\Auth\User;
use App\Models\Country\Country;
use HalcyonLaravel\Base\Database\Traits\SeederHelper;
use Illuminate\Database\Seeder;

/**
 * Class CountryPermissionTableSeeder
 */
class CountryPermissionTableSeeder extends Seeder
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

        $this->seederPermission(new Country);

        $this->enableForeignKeys();
    }

}
