<?php

use App\Models\Auth\User;
use App\Models\Details\Details;
use HalcyonLaravel\Base\Database\Traits\SeederHelper;
use Illuminate\Database\Seeder;

/**
 * Class DetailsPermissionTableSeeder
 */
class DetailsPermissionTableSeeder extends Seeder
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

        $this->seederPermission(new Details);

        $this->enableForeignKeys();
    }

}
