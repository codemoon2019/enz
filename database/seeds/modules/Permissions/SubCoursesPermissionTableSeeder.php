<?php

use App\Models\Auth\User;
use App\Models\SubCourses\SubCourses;
use HalcyonLaravel\Base\Database\Traits\SeederHelper;
use Illuminate\Database\Seeder;

/**
 * Class SubCoursesPermissionTableSeeder
 */
class SubCoursesPermissionTableSeeder extends Seeder
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

        $this->seederPermission(new SubCourses);

        $this->enableForeignKeys();
    }

}
