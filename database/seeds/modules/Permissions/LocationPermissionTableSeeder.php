<?php

use App\Models\Auth\User;
use App\Models\Location\Location;
use HalcyonLaravel\Base\Database\Traits\SeederHelper;
use Illuminate\Database\Seeder;

/**
 * Class LocationPermissionTableSeeder
 */
class LocationPermissionTableSeeder extends Seeder
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

        $this->seederPermission(new Location);

        $this->enableForeignKeys();
    }

}
