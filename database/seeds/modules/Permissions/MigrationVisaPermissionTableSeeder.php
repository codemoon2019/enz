<?php

use App\Models\Auth\User;
use App\Models\MigrationVisa\MigrationVisa;
use HalcyonLaravel\Base\Database\Traits\SeederHelper;
use Illuminate\Database\Seeder;

/**
 * Class MigrationVisaPermissionTableSeeder
 */
class MigrationVisaPermissionTableSeeder extends Seeder
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

        $this->seederPermission(new MigrationVisa);

        $this->enableForeignKeys();
    }

}
