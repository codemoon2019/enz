<?php

use App\Models\Auth\User;
use App\Models\Course\Course;
use HalcyonLaravel\Base\Database\Traits\SeederHelper;
use Illuminate\Database\Seeder;

/**
 * Class CoursePermissionTableSeeder
 */
class CoursePermissionTableSeeder extends Seeder
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

        $this->seederPermission(new Course);

        $this->enableForeignKeys();
    }

}
