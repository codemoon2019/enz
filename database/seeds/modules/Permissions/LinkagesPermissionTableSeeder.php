<?php

use App\Models\Auth\User;
use App\Models\Linkages\Linkages;
use HalcyonLaravel\Base\Database\Traits\SeederHelper;
use Illuminate\Database\Seeder;

/**
 * Class LinkagesPermissionTableSeeder
 */
class LinkagesPermissionTableSeeder extends Seeder
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

        $this->seederPermission(new Linkages);

        $this->enableForeignKeys();
    }

}
