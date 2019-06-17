<?php

use App\Models\Auth\User;
use App\Models\Application\Application;
use HalcyonLaravel\Base\Database\Traits\SeederHelper;
use Illuminate\Database\Seeder;

/**
 * Class ApplicationPermissionTableSeeder
 */
class ApplicationPermissionTableSeeder extends Seeder
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

        $this->seederPermission(new Application);

        $this->enableForeignKeys();
    }

}
