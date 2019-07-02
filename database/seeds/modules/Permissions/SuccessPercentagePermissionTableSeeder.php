<?php

use App\Models\Auth\User;
use App\Models\SuccessPercentage\SuccessPercentage;
use HalcyonLaravel\Base\Database\Traits\SeederHelper;
use Illuminate\Database\Seeder;

/**
 * Class SuccessPercentagePermissionTableSeeder
 */
class SuccessPercentagePermissionTableSeeder extends Seeder
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

        $this->seederPermission(new SuccessPercentage);

        $this->enableForeignKeys();
    }

}
