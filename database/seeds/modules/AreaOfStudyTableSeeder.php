<?php

use App\Models\AreaOfStudy\AreaOfStudy;
use Illuminate\Database\Seeder;
use HalcyonLaravel\Base\Database\Traits\SeederHelper;

/**
 * Class AreaOfStudyTableSeeder
 */
class AreaOfStudyTableSeeder extends Seeder
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

        $page = $this->modelPageSeeder(new AreaOfStudy);

        $this->seedToDomainables($page, 'main');

                $data = [
            [
                'title' => 'Agriculture and Environmental',
                'description' => '',
            ],
            [
                'title' => 'Architecture and Building',
                'description' => '',
            ],
            [
                'title' => 'HosBusiness and Management',
                'description' => '',

            ],
            [
                'title' => 'Creative Arts and Design',
                'description' => '',

            ],
            [
                'title' => 'Education and Language',
                'description' => '',

            ],
            [
                'title' => 'Engineering and Technology',
                'description' => '',

            ],
        ];  

        foreach ($data as $key => $value) {

            $model = AreaOfStudy::create($value);

            $model->metaTag()->create([
                'title' => $model->title,
                'description' => $model->title,
                'keywords' => str_replace('-', ',', $model->slug),
            ]);

        }

        $this->enableForeignKeys();
    }
}
