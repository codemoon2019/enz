<?php

use App\Models\Auth\User;
use App\Models\AreaOfStudy\AreaOfStudy;
use HalcyonLaravel\Base\Database\Traits\SeederHelper;
use Illuminate\Database\Seeder;

/**
 * Class AreaOfStudyPermissionTableSeeder
 */
class AreaOfStudyPermissionTableSeeder extends Seeder
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

        $this->seederPermission(new AreaOfStudy);

        $this->enableForeignKeys();
    }

}
