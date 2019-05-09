<?php

use App\Models\StudentVisa\StudentVisa;
use Illuminate\Database\Seeder;
use HalcyonLaravel\Base\Database\Traits\SeederHelper;

/**
 * Class StudentVisaTableSeeder
 */
class StudentVisaTableSeeder extends Seeder
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

        $page = $this->modelPageSeeder(new StudentVisa);

        $this->seedToDomainables($page, 'main');

        $data = [
            [
                'title' => 'Orientation',
                'description' => '<p>ENZ provides FREE Orientation to all students.</p>',
                'order' => 0
            ],
            [
                'title' => 'Consultation',
                'description' => '<p>Via Skype, Face-to-face or Group.</p>',
                'order' => 0
            ],
            [
                'title' => 'Assesment',
                'description' => '<p>ENZ provides FREE assessment to determine the best study options.</p>',
                'order' => 0
            ],
            [
                'title' => 'Admissions',
                'description' => '<p>We organize your admission process and secure for your letter of offer.</p>',
                'order' => 0
            ],
            [
                'title' => 'Enrollment',
                'description' => '<p>We assist you in arranging your documents for enrolment and getting your confirmation of enrollment.</p>',
                'order' => 0
            ],
            [
                'title' => 'Visa Application',
                'description' => '<p>We will assist you in gathering all necessary documents needed on your student visa application and lodging.</p>',
                'order' => 0
            ],
        ];

        foreach ($data as $key => $value) {

            $model = StudentVisa::create($value);

            $model->metaTag()->create([
                'title' => $model->title,
                'description' => $model->title,
                'keywords' => str_replace('-', ',', $model->slug),
            ]);
        }

        $this->enableForeignKeys();
    }
}
