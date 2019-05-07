<?php

use App\Models\SubCourses\SubCourses;
use Illuminate\Database\Seeder;
use HalcyonLaravel\Base\Database\Traits\SeederHelper;

/**
 * Class SubCoursesTableSeeder
 */
class SubCoursesTableSeeder extends Seeder
{
    use DisableForeignKeys;
    use SeederHelper;
    use DomainSeederHelper;

    /**
     * Run the database seeds.
     *
     * @throws \ReflectionException
     */
    public function run()
    {
        $this->disableForeignKeys();

        $page = $this->modelPageSeeder(new SubCourses);
        $this->seedToDomainables($page, 'main');

        for ($i=1; $i <= 30; $i++) { 

            $num = $i / 5;

            if ($num < 1) {
                $id = 1;
            }elseif ($num <= 2) {
                $id = 2;
            }elseif ($num <= 3) {
                $id = 3;
            }elseif ($num <= 4) {
                $id = 4;
            }elseif ($num <= 5) {
                $id = 5;
            }else{
                $id = 6;
            }

            $data = [
                'course_id'   => $id,
                'title'       => 'Course ' . $i,
                'description' => 'Description',
            ];

            $model = SubCourses::create($data);

            $model->metaTag()->create([
                'title' => $model->title,
                'description' => $model->title,
                'keywords' => str_replace('-', ',', $model->slug),
            ]);
        }
        $this->enableForeignKeys();
    }
}
