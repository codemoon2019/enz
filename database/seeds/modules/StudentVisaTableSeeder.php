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

        $page->update([
            'description' => '<p>Studying abroad is life-changing, but it can be a confusing process. But don\'t worry because ENZ is here to help you get to your study destination! Whether you dream of studying in Australia, New Zealand or Canada, our visa experts will guide you step-by-step through the whole application process! Our team aims to help students reach their goal. This is made possible through the expertise of our professionally trained and experienced consultants. We are always committed to give you full assistance & high quality service to make your dreams a reality. Our priority is to help you that\'s why we provide free services to fast track your success!</p>'
        ]);

        $this->seedToDomainables($page, 'main');

        $data = [
            [
                'title' => 'Orientation',
                'description' => 'ENZ provides FREE Orientation to all students.',
                'order' => 0
            ],
            [
                'title' => 'Consultation',
                'description' => 'Via Skype, Face-to-face or Group.',
                'order' => 0
            ],
            [
                'title' => 'Assesment',
                'description' => 'ENZ provides FREE assessment to determine the best study options.',
                'order' => 0
            ],
            [
                'title' => 'Admissions',
                'description' => 'We organize your admission process and secure for your letter of offer.',
                'order' => 0
            ],
            [
                'title' => 'Enrollment',
                'description' => 'We assist you in arranging your documents for enrolment and getting your confirmation of enrollment.',
                'order' => 0
            ],
            [
                'title' => 'Visa Application',
                'description' => 'We will assist you in gathering all necessary documents needed on your student visa application and lodging.',
                'order' => 0
            ],
            [
                'title' => 'Pre-departure Orientation',
                'description' => 'We provide orientation to students prior to thier departures.',
                'order' => 0
            ],
            [
                'title' => 'Accommodation',
                'description' => 'We arrange accommodation.',
                'order' => 0
            ],
            [
                'title' => 'Airport Pickup',
                'description' => 'We organize Airport-pick up.',
                'order' => 0
            ],
            [
                'title' => 'Showmoney Assistance Program',
                'description' => 'We assist you with your evidence of fund requirement with our showmoney assistance program.',
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
