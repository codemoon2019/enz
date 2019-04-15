<?php

use App\Models\Auth\User;
use App\Models\Why\Why;
use HalcyonLaravel\Base\Database\Traits\SeederHelper;
use Illuminate\Database\Seeder;

/**
 * Class WhyPermissionTableSeeder
 */
class WhyPermissionTableSeeder extends Seeder
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

        $this->seederPermission(new Why);

        $this->enableForeignKeys();
    }

}
