<?php

use App\Models\Auth\User;
use App\Models\Institution\Institution;
use HalcyonLaravel\Base\Database\Traits\SeederHelper;
use Illuminate\Database\Seeder;

/**
 * Class InstitutionPermissionTableSeeder
 */
class InstitutionPermissionTableSeeder extends Seeder
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

        $this->seederPermission(new Institution);

        $this->enableForeignKeys();
    }

}
