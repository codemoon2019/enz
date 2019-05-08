<?php

use App\Models\Auth\User;
use App\Models\CountryDetails\CountryDetails;
use HalcyonLaravel\Base\Database\Traits\SeederHelper;
use Illuminate\Database\Seeder;

/**
 * Class CountryDetailsPermissionTableSeeder
 */
class CountryDetailsPermissionTableSeeder extends Seeder
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

        $this->seederPermission(new CountryDetails);

        $this->enableForeignKeys();
    }

}
