<?php

use App\Models\Auth\User;
use App\Models\StudentVisa\StudentVisa;
use HalcyonLaravel\Base\Database\Traits\SeederHelper;
use Illuminate\Database\Seeder;

/**
 * Class StudentVisaPermissionTableSeeder
 */
class StudentVisaPermissionTableSeeder extends Seeder
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

        $this->seederPermission(new StudentVisa);

        $this->enableForeignKeys();
    }

}
