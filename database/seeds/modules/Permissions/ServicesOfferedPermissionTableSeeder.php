<?php

use App\Models\Auth\User;
use App\Models\ServicesOffered\ServicesOffered;
use HalcyonLaravel\Base\Database\Traits\SeederHelper;
use Illuminate\Database\Seeder;

/**
 * Class ServicesOfferedPermissionTableSeeder
 */
class ServicesOfferedPermissionTableSeeder extends Seeder
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

        $this->seederPermission(new ServicesOffered);

        $this->enableForeignKeys();
    }

}
