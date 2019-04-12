<?php

use App\Models\Auth\User;
use App\Models\MoreLife\MoreLife;
use HalcyonLaravel\Base\Database\Traits\SeederHelper;
use Illuminate\Database\Seeder;

/**
 * Class MoreLifePermissionTableSeeder
 */
class MoreLifePermissionTableSeeder extends Seeder
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

        $this->seederPermission(new MoreLife);

        $this->enableForeignKeys();
    }

}
