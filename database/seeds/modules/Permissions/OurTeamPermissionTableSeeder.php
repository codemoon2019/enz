<?php

use App\Models\Auth\User;
use App\Models\OurTeam\OurTeam;
use HalcyonLaravel\Base\Database\Traits\SeederHelper;
use Illuminate\Database\Seeder;

/**
 * Class OurTeamPermissionTableSeeder
 */
class OurTeamPermissionTableSeeder extends Seeder
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

        $this->seederPermission(new OurTeam);

        $this->enableForeignKeys();
    }

}
