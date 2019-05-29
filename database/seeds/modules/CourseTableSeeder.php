<?php

use App\Models\Course\Course;
use Illuminate\Database\Seeder;
use HalcyonLaravel\Base\Database\Traits\SeederHelper;

/**
 * Class CourseTableSeeder
 */
class CourseTableSeeder extends Seeder
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

        $page = $this->modelPageSeeder(new Course);

        $this->seedToDomainables($page, 'main');

        $data = [
            [
                'title' => 'Certificate III in Ageing Support',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus temporibus minus enim dolore nisi ab in laboriosam, odio iusto maxime incidunt porro ea ipsam distinctio accusantium, amet corrupti velit, natus quae? Iste labore, voluptatem veritatis quam pariatur maiores, temporibus quae perferendis eligendi, accusamus aspernatur praesentium repellendus tempore culpa maxime quis.',
                'status' => 'enable',
                'institution_id' => 1,
                'area_of_study_id' => 5,
                'career_opportunities' => 'Enrolled Nurse (DIV2)',
                'duration' => '58 Weeks',
                'availability' => 'Melbourne, Perth, Sydney',
            ],
            [
                'title' => 'Certificate IV in Ageing Support',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus temporibus minus enim dolore nisi ab in laboriosam, odio iusto maxime incidunt porro ea ipsam distinctio accusantium, amet corrupti velit, natus quae? Iste labore, voluptatem veritatis quam pariatur maiores, temporibus quae perferendis eligendi, accusamus aspernatur praesentium repellendus tempore culpa maxime quis.',
                'status' => 'enable',
                'institution_id' => 1,
                'area_of_study_id' => 5,
                'career_opportunities' => 'Enrolled Nurse (DIV2)',
                'duration' => '58 Weeks',
                'availability' => 'Melbourne, Perth, Sydney',
            ],
            [
                'title' => 'Diploma of Dental Technology',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus temporibus minus enim dolore nisi ab in laboriosam, odio iusto maxime incidunt porro ea ipsam distinctio accusantium, amet corrupti velit, natus quae? Iste labore, voluptatem veritatis quam pariatur maiores, temporibus quae perferendis eligendi, accusamus aspernatur praesentium repellendus tempore culpa maxime quis.',
                'status' => 'enable',
                'institution_id' => 1,
                'area_of_study_id' => 5,
                'career_opportunities' => 'Enrolled Nurse (DIV2)',
                'duration' => '58 Weeks',
                'availability' => 'Melbourne, Perth, Sydney',

            ],
            [
                'title' => 'Diploma of Nursing',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus temporibus minus enim dolore nisi ab in laboriosam, odio iusto maxime incidunt porro ea ipsam distinctio accusantium, amet corrupti velit, natus quae? Iste labore, voluptatem veritatis quam pariatur maiores, temporibus quae perferendis eligendi, accusamus aspernatur praesentium repellendus tempore culpa maxime quis.',
                'status' => 'enable',
                'institution_id' => 1,
                'area_of_study_id' => 5,
                'career_opportunities' => 'Enrolled Nurse (DIV2)',
                'duration' => '58 Weeks',
                'availability' => 'Melbourne, Perth, Sydney',

            ],
            [
                'title' => 'Diploma of Leadership and Management',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus temporibus minus enim dolore nisi ab in laboriosam, odio iusto maxime incidunt porro ea ipsam distinctio accusantium, amet corrupti velit, natus quae? Iste labore, voluptatem veritatis quam pariatur maiores, temporibus quae perferendis eligendi, accusamus aspernatur praesentium repellendus tempore culpa maxime quis.',
                'status' => 'enable',
                'institution_id' => 1,
                'area_of_study_id' => 2,
                'career_opportunities' => 'Enrolled Nurse (DIV2)',
                'duration' => '58 Weeks',
                'availability' => 'Melbourne, Perth, Sydney',

            ],
            [
                'title' => 'Advanced Diploma of Engineering',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus temporibus minus enim dolore nisi ab in laboriosam, odio iusto maxime incidunt porro ea ipsam distinctio accusantium, amet corrupti velit, natus quae? Iste labore, voluptatem veritatis quam pariatur maiores, temporibus quae perferendis eligendi, accusamus aspernatur praesentium repellendus tempore culpa maxime quis.',
                'status' => 'enable',
                'institution_id' => 2,
                'area_of_study_id' => 8,
                'career_opportunities' => 'Enrolled Nurse (DIV2)',
                'duration' => '58 Weeks',
                'availability' => 'Melbourne, Perth, Sydney',

            ],
            [
                'title' => 'Certificate III in Design Fundamentals',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus temporibus minus enim dolore nisi ab in laboriosam, odio iusto maxime incidunt porro ea ipsam distinctio accusantium, amet corrupti velit, natus quae? Iste labore, voluptatem veritatis quam pariatur maiores, temporibus quae perferendis eligendi, accusamus aspernatur praesentium repellendus tempore culpa maxime quis.',
                'status' => 'enable',
                'institution_id' => 2,
                'area_of_study_id' => 4,
                'career_opportunities' => 'Enrolled Nurse (DIV2)',
                'duration' => '58 Weeks',
                'availability' => 'Melbourne, Perth, Sydney',

            ],
            [
                'title' => 'Diploma of Graphic Design',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus temporibus minus enim dolore nisi ab in laboriosam, odio iusto maxime incidunt porro ea ipsam distinctio accusantium, amet corrupti velit, natus quae? Iste labore, voluptatem veritatis quam pariatur maiores, temporibus quae perferendis eligendi, accusamus aspernatur praesentium repellendus tempore culpa maxime quis.',
                'status' => 'enable',
                'institution_id' => 1,
                'area_of_study_id' => 4,
                'career_opportunities' => 'Enrolled Nurse (DIV2)',
                'duration' => '58 Weeks',
                'availability' => 'Melbourne, Perth, Sydney',

            ],
            [
                'title' => 'Diploma of Screen and Media',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus temporibus minus enim dolore nisi ab in laboriosam, odio iusto maxime incidunt porro ea ipsam distinctio accusantium, amet corrupti velit, natus quae? Iste labore, voluptatem veritatis quam pariatur maiores, temporibus quae perferendis eligendi, accusamus aspernatur praesentium repellendus tempore culpa maxime quis.',
                'status' => 'enable',
                'institution_id' => 1,
                'area_of_study_id' => 4,
                'career_opportunities' => 'Enrolled Nurse (DIV2)',
                'duration' => '58 Weeks',
                'availability' => 'Melbourne, Perth, Sydney',

            ],
            [
                'title' => 'Certificate III in Individual Support',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus temporibus minus enim dolore nisi ab in laboriosam, odio iusto maxime incidunt porro ea ipsam distinctio accusantium, amet corrupti velit, natus quae? Iste labore, voluptatem veritatis quam pariatur maiores, temporibus quae perferendis eligendi, accusamus aspernatur praesentium repellendus tempore culpa maxime quis.',
                'status' => 'enable',
                'institution_id' => 2,
                'area_of_study_id' => 5,
                'career_opportunities' => 'Enrolled Nurse (DIV2)',
                'duration' => '58 Weeks',
                'availability' => 'Melbourne, Perth, Sydney',

            ],
            [
                'title' => 'Certificate IV in Ageing Support',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus temporibus minus enim dolore nisi ab in laboriosam, odio iusto maxime incidunt porro ea ipsam distinctio accusantium, amet corrupti velit, natus quae? Iste labore, voluptatem veritatis quam pariatur maiores, temporibus quae perferendis eligendi, accusamus aspernatur praesentium repellendus tempore culpa maxime quis.',
                'status' => 'enable',
                'institution_id' => 2,
                'area_of_study_id' => 5,
                'career_opportunities' => 'Enrolled Nurse (DIV2)',
                'duration' => '58 Weeks',
                'availability' => 'Melbourne, Perth, Sydney',

            ],
            [
                'title' => 'Certificate III in Business Administration',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus temporibus minus enim dolore nisi ab in laboriosam, odio iusto maxime incidunt porro ea ipsam distinctio accusantium, amet corrupti velit, natus quae? Iste labore, voluptatem veritatis quam pariatur maiores, temporibus quae perferendis eligendi, accusamus aspernatur praesentium repellendus tempore culpa maxime quis.',
                'status' => 'enable',
                'institution_id' => 2,
                'area_of_study_id' => 2,
                'career_opportunities' => 'Enrolled Nurse (DIV2)',
                'duration' => '58 Weeks',
                'availability' => 'Melbourne, Perth, Sydney',

            ],
            [
                'title' => 'Diploma of Business',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus temporibus minus enim dolore nisi ab in laboriosam, odio iusto maxime incidunt porro ea ipsam distinctio accusantium, amet corrupti velit, natus quae? Iste labore, voluptatem veritatis quam pariatur maiores, temporibus quae perferendis eligendi, accusamus aspernatur praesentium repellendus tempore culpa maxime quis.',
                'status' => 'enable',
                'institution_id' => 2,
                'area_of_study_id' => 2,
                'career_opportunities' => 'Enrolled Nurse (DIV2)',
                'duration' => '58 Weeks',
                'availability' => 'Melbourne, Perth, Sydney',

            ],
            [
                'title' => 'Certificate IV in Business',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus temporibus minus enim dolore nisi ab in laboriosam, odio iusto maxime incidunt porro ea ipsam distinctio accusantium, amet corrupti velit, natus quae? Iste labore, voluptatem veritatis quam pariatur maiores, temporibus quae perferendis eligendi, accusamus aspernatur praesentium repellendus tempore culpa maxime quis.',
                'status' => 'enable',
                'institution_id' => 3,
                'area_of_study_id' => 2,
                'career_opportunities' => 'Enrolled Nurse (DIV2)',
                'duration' => '58 Weeks',
                'availability' => 'Melbourne, Perth, Sydney',

            ],
            [
                'title' => 'Diploma of Business',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus temporibus minus enim dolore nisi ab in laboriosam, odio iusto maxime incidunt porro ea ipsam distinctio accusantium, amet corrupti velit, natus quae? Iste labore, voluptatem veritatis quam pariatur maiores, temporibus quae perferendis eligendi, accusamus aspernatur praesentium repellendus tempore culpa maxime quis.',
                'status' => 'enable',
                'institution_id' => 3,
                'area_of_study_id' => 2,
                'career_opportunities' => 'Enrolled Nurse (DIV2)',
                'duration' => '58 Weeks',
                'availability' => 'Melbourne, Perth, Sydney',

            ],
            [
                'title' => 'Diploma of Human Resources Management',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus temporibus minus enim dolore nisi ab in laboriosam, odio iusto maxime incidunt porro ea ipsam distinctio accusantium, amet corrupti velit, natus quae? Iste labore, voluptatem veritatis quam pariatur maiores, temporibus quae perferendis eligendi, accusamus aspernatur praesentium repellendus tempore culpa maxime quis.',
                'status' => 'enable',
                'institution_id' => 3,
                'area_of_study_id' => 2,
                'career_opportunities' => 'Enrolled Nurse (DIV2)',
                'duration' => '58 Weeks',
                'availability' => 'Melbourne, Perth, Sydney',

            ],
            [
                'title' => 'Diploma of Leadership and Management',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus temporibus minus enim dolore nisi ab in laboriosam, odio iusto maxime incidunt porro ea ipsam distinctio accusantium, amet corrupti velit, natus quae? Iste labore, voluptatem veritatis quam pariatur maiores, temporibus quae perferendis eligendi, accusamus aspernatur praesentium repellendus tempore culpa maxime quis.',
                'status' => 'enable',
                'institution_id' => 3,
                'area_of_study_id' => 2,
                'career_opportunities' => 'Enrolled Nurse (DIV2)',
                'duration' => '58 Weeks',
                'availability' => 'Melbourne, Perth, Sydney',

            ],
            [
                'title' => 'Advanced Diploma of Leadership and Management',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus temporibus minus enim dolore nisi ab in laboriosam, odio iusto maxime incidunt porro ea ipsam distinctio accusantium, amet corrupti velit, natus quae? Iste labore, voluptatem veritatis quam pariatur maiores, temporibus quae perferendis eligendi, accusamus aspernatur praesentium repellendus tempore culpa maxime quis.',
                'status' => 'enable',
                'institution_id' => 3,
                'area_of_study_id' => 2,
                'career_opportunities' => 'Enrolled Nurse (DIV2)',
                'duration' => '58 Weeks',
                'availability' => 'Melbourne, Perth, Sydney',

            ],
            [
                'title' => 'Certificate IV in TESOL',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus temporibus minus enim dolore nisi ab in laboriosam, odio iusto maxime incidunt porro ea ipsam distinctio accusantium, amet corrupti velit, natus quae? Iste labore, voluptatem veritatis quam pariatur maiores, temporibus quae perferendis eligendi, accusamus aspernatur praesentium repellendus tempore culpa maxime quis.',
                'status' => 'enable',
                'institution_id' => 3,
                'area_of_study_id' => 2,
                'career_opportunities' => 'Enrolled Nurse (DIV2)',
                'duration' => '58 Weeks',
                'availability' => 'Melbourne, Perth, Sydney',

            ],
            [
                'title' => 'Diploma of TESOL',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus temporibus minus enim dolore nisi ab in laboriosam, odio iusto maxime incidunt porro ea ipsam distinctio accusantium, amet corrupti velit, natus quae? Iste labore, voluptatem veritatis quam pariatur maiores, temporibus quae perferendis eligendi, accusamus aspernatur praesentium repellendus tempore culpa maxime quis.',
                'status' => 'enable',
                'institution_id' => 3,
                'area_of_study_id' => 2,
                'career_opportunities' => 'Enrolled Nurse (DIV2)',
                'duration' => '58 Weeks',
                'availability' => 'Melbourne, Perth, Sydney',

            ],
            [
                'title' => 'Certificate III in Tourism',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus temporibus minus enim dolore nisi ab in laboriosam, odio iusto maxime incidunt porro ea ipsam distinctio accusantium, amet corrupti velit, natus quae? Iste labore, voluptatem veritatis quam pariatur maiores, temporibus quae perferendis eligendi, accusamus aspernatur praesentium repellendus tempore culpa maxime quis.',
                'status' => 'enable',
                'institution_id' => 3,
                'area_of_study_id' => 3,
                'career_opportunities' => 'Enrolled Nurse (DIV2)',
                'duration' => '58 Weeks',
                'availability' => 'Melbourne, Perth, Sydney',

            ],
            [
                'title' => 'Diploma of Travel and Tourism Management',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus temporibus minus enim dolore nisi ab in laboriosam, odio iusto maxime incidunt porro ea ipsam distinctio accusantium, amet corrupti velit, natus quae? Iste labore, voluptatem veritatis quam pariatur maiores, temporibus quae perferendis eligendi, accusamus aspernatur praesentium repellendus tempore culpa maxime quis.',
                'status' => 'enable',
                'institution_id' => 3,
                'area_of_study_id' => 3,
                'career_opportunities' => 'Enrolled Nurse (DIV2)',
                'duration' => '58 Weeks',
                'availability' => 'Melbourne, Perth, Sydney',

            ],
            [
                'title' => 'Certificate III in Hospitality',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus temporibus minus enim dolore nisi ab in laboriosam, odio iusto maxime incidunt porro ea ipsam distinctio accusantium, amet corrupti velit, natus quae? Iste labore, voluptatem veritatis quam pariatur maiores, temporibus quae perferendis eligendi, accusamus aspernatur praesentium repellendus tempore culpa maxime quis.',
                'status' => 'enable',
                'institution_id' => 3,
                'area_of_study_id' => 3,
                'career_opportunities' => 'Enrolled Nurse (DIV2)',
                'duration' => '58 Weeks',
                'availability' => 'Melbourne, Perth, Sydney',

            ],
            [
                'title' => 'Diploma of Hospitality Management',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus temporibus minus enim dolore nisi ab in laboriosam, odio iusto maxime incidunt porro ea ipsam distinctio accusantium, amet corrupti velit, natus quae? Iste labore, voluptatem veritatis quam pariatur maiores, temporibus quae perferendis eligendi, accusamus aspernatur praesentium repellendus tempore culpa maxime quis.',
                'status' => 'enable',
                'institution_id' => 3,
                'area_of_study_id' => 3,
                'career_opportunities' => 'Enrolled Nurse (DIV2)',
                'duration' => '58 Weeks',
                'availability' => 'Melbourne, Perth, Sydney',

            ],
            [
                'title' => 'Certificate III in Early Childhood Education and Care',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus temporibus minus enim dolore nisi ab in laboriosam, odio iusto maxime incidunt porro ea ipsam distinctio accusantium, amet corrupti velit, natus quae? Iste labore, voluptatem veritatis quam pariatur maiores, temporibus quae perferendis eligendi, accusamus aspernatur praesentium repellendus tempore culpa maxime quis.',
                'status' => 'enable',
                'institution_id' => 3,
                'area_of_study_id' => 5,
                'career_opportunities' => 'Enrolled Nurse (DIV2)',
                'duration' => '58 Weeks',
                'availability' => 'Melbourne, Perth, Sydney',

            ],
            [
                'title' => 'Diploma of Early Childhood Education and Care',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus temporibus minus enim dolore nisi ab in laboriosam, odio iusto maxime incidunt porro ea ipsam distinctio accusantium, amet corrupti velit, natus quae? Iste labore, voluptatem veritatis quam pariatur maiores, temporibus quae perferendis eligendi, accusamus aspernatur praesentium repellendus tempore culpa maxime quis.',
                'status' => 'enable',
                'institution_id' => 3,
                'area_of_study_id' => 5,
                'career_opportunities' => 'Enrolled Nurse (DIV2)',
                'duration' => '58 Weeks',
                'availability' => 'Melbourne, Perth, Sydney',

            ],
        ];        

        foreach ($data as $key => $value) {

            $model = Course::create($value);

            // $this->seederUploader($model, 'course/' . $model->slug . '.png', null, 'featured');

            $model->metaTag()->create([
                'title' => $model->title,
                'description' => $model->title,
                'keywords' => str_replace('-', ',', $model->slug),
            ]);

        }

        $this->enableForeignKeys();
    }
}
