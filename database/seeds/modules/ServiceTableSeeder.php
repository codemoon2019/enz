<?php

use App\Models\Service\Service;
use Illuminate\Database\Seeder;
use HalcyonLaravel\Base\Database\Traits\SeederHelper;

/**
 * Class ServiceTableSeeder
 */
class ServiceTableSeeder extends Seeder
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

        $page = $this->modelPageSeeder(new Service);

        $data = [
            [
                'title' => 'Orientation',
                'description' => 'ENZ provides FREE Orientation to all students',
                'status' => 'enable',
                'order' => 0
            ],
            [
                'title' => 'Consultation',
                'description' => 'Via Skype, Face-to-face or Group.',
                'status' => 'enable',
                'order' => 1
            ],
            [
                'title' => 'Assessment',
                'description' => 'ENZ provides FREE assessment to determine the best study options',
                'status' => 'enable',
                'order' => 2

            ],
            [
                'title' => 'Admissions',
                'description' => 'We organize your admission process and secure for your letter of offer.',
                'status' => 'enable',
                'order' => 3

            ],
            [
                'title' => 'Enrollment',
                'description' => 'We assist you in arranging your documents for enrolment and getting your confirmation of enrollment.',
                'status' => 'enable',
                'order' => 4

            ],
            [
                'title' => 'Visa Application',
                'description' => 'We will assist you in gathering all necessary documents needed on your student visa application and lodging .Your visa application at the Department of Immigration and Border Protection',
                'status' => 'enable',
                'order' => 5

            ],
            [
                'title' => 'Pre-departure Orientation',
                'description' => 'We will assist you in gathering all necessary documents needed on your student visa application and lodging .Your visa application at the Department of Immigration and Border Protection',
                'status' => 'enable',
                'order' => 6

            ],
            [
                'title' => 'Accommodation',
                'description' => 'We arrange accommodation',
                'status' => 'enable',
                'order' => 7

            ],
            [
                'title' => 'Airport Pickup',
                'description' => 'We organize Airport-pick up',
                'status' => 'enable',
                'order' => 8

            ],
            [
                'title' => 'Showmoney Assistance Program',
                'description' => 'We assist you with your evidence of fund requirement with our showmoney assistance program.',
                'status' => 'enable',
                'order' => 9

            ],
        ];        

        foreach ($data as $key => $value) {

            $model = Service::create($value);

            $this->seederUploader($model, 'service/icon.png', null, 'featured');

            $model->metaTag()->create([
                'title' => $model->title,
                'description' => $model->title,
                'keywords' => str_replace('-', ',', $model->slug),
            ]);

        }

        $this->enableForeignKeys();
    }
}
