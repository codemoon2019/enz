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




            [
                'title' => 'Bachelor of Accounting',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus temporibus minus enim dolore nisi ab in laboriosam, odio iusto maxime incidunt porro ea ipsam distinctio accusantium, amet corrupti velit, natus quae? Iste labore, voluptatem veritatis quam pariatur maiores, temporibus quae perferendis eligendi, accusamus aspernatur praesentium repellendus tempore culpa maxime quis.',
                'status' => 'enable',
                'institution_id' => 4,
                'area_of_study_id' => 2,
                'career_opportunities' => 'Enrolled Nurse (DIV2)',
                'duration' => '58 Weeks',
                'availability' => 'Melbourne, Perth, Sydney',

            ],
            [
                'title' => 'Bachelor of Accounting / Bachelor of Business',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus temporibus minus enim dolore nisi ab in laboriosam, odio iusto maxime incidunt porro ea ipsam distinctio accusantium, amet corrupti velit, natus quae? Iste labore, voluptatem veritatis quam pariatur maiores, temporibus quae perferendis eligendi, accusamus aspernatur praesentium repellendus tempore culpa maxime quis.',
                'status' => 'enable',
                'institution_id' => 4,
                'area_of_study_id' => 2,
                'career_opportunities' => 'Enrolled Nurse (DIV2)',
                'duration' => '58 Weeks',
                'availability' => 'Melbourne, Perth, Sydney',

            ],
            [
                'title' => 'Diploma of Business Studies',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus temporibus minus enim dolore nisi ab in laboriosam, odio iusto maxime incidunt porro ea ipsam distinctio accusantium, amet corrupti velit, natus quae? Iste labore, voluptatem veritatis quam pariatur maiores, temporibus quae perferendis eligendi, accusamus aspernatur praesentium repellendus tempore culpa maxime quis.',
                'status' => 'enable',
                'institution_id' => 4,
                'area_of_study_id' => 2,
                'career_opportunities' => 'Enrolled Nurse (DIV2)',
                'duration' => '58 Weeks',
                'availability' => 'Melbourne, Perth, Sydney',

            ],
            [
                'title' => 'Diploma of Business Studies',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus temporibus minus enim dolore nisi ab in laboriosam, odio iusto maxime incidunt porro ea ipsam distinctio accusantium, amet corrupti velit, natus quae? Iste labore, voluptatem veritatis quam pariatur maiores, temporibus quae perferendis eligendi, accusamus aspernatur praesentium repellendus tempore culpa maxime quis.',
                'status' => 'enable',
                'institution_id' => 4,
                'area_of_study_id' => 2,
                'career_opportunities' => 'Enrolled Nurse (DIV2)',
                'duration' => '58 Weeks',
                'availability' => 'Melbourne, Perth, Sydney',

            ],
            [
                'title' => 'Bachelor of Business (Specialization)',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus temporibus minus enim dolore nisi ab in laboriosam, odio iusto maxime incidunt porro ea ipsam distinctio accusantium, amet corrupti velit, natus quae? Iste labore, voluptatem veritatis quam pariatur maiores, temporibus quae perferendis eligendi, accusamus aspernatur praesentium repellendus tempore culpa maxime quis.',
                'status' => 'enable',
                'institution_id' => 4,
                'area_of_study_id' => 2,
                'career_opportunities' => 'Enrolled Nurse (DIV2)',
                'duration' => '58 Weeks',
                'availability' => 'Melbourne, Perth, Sydney',

            ],
            [
                'title' => 'Bachelor of Arts / Bachelor of Business',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus temporibus minus enim dolore nisi ab in laboriosam, odio iusto maxime incidunt porro ea ipsam distinctio accusantium, amet corrupti velit, natus quae? Iste labore, voluptatem veritatis quam pariatur maiores, temporibus quae perferendis eligendi, accusamus aspernatur praesentium repellendus tempore culpa maxime quis.',
                'status' => 'enable',
                'institution_id' => 4,
                'area_of_study_id' => 2,
                'career_opportunities' => 'Enrolled Nurse (DIV2)',
                'duration' => '58 Weeks',
                'availability' => 'Melbourne, Perth, Sydney',

            ],
            [
                'title' => 'Business of Business / Bachelor of Professional Communication',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus temporibus minus enim dolore nisi ab in laboriosam, odio iusto maxime incidunt porro ea ipsam distinctio accusantium, amet corrupti velit, natus quae? Iste labore, voluptatem veritatis quam pariatur maiores, temporibus quae perferendis eligendi, accusamus aspernatur praesentium repellendus tempore culpa maxime quis.',
                'status' => 'enable',
                'institution_id' => 4,
                'area_of_study_id' => 2,
                'career_opportunities' => 'Enrolled Nurse (DIV2)',
                'duration' => '58 Weeks',
                'availability' => 'Melbourne, Perth, Sydney',

            ],
            [
                'title' => 'Bachelor of Professional Communication',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus temporibus minus enim dolore nisi ab in laboriosam, odio iusto maxime incidunt porro ea ipsam distinctio accusantium, amet corrupti velit, natus quae? Iste labore, voluptatem veritatis quam pariatur maiores, temporibus quae perferendis eligendi, accusamus aspernatur praesentium repellendus tempore culpa maxime quis.',
                'status' => 'enable',
                'institution_id' => 4,
                'area_of_study_id' => 2,
                'career_opportunities' => 'Enrolled Nurse (DIV2)',
                'duration' => '58 Weeks',
                'availability' => 'Melbourne, Perth, Sydney',

            ],
            [
                'title' => 'Graduate Certificate in Professional Accounting',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus temporibus minus enim dolore nisi ab in laboriosam, odio iusto maxime incidunt porro ea ipsam distinctio accusantium, amet corrupti velit, natus quae? Iste labore, voluptatem veritatis quam pariatur maiores, temporibus quae perferendis eligendi, accusamus aspernatur praesentium repellendus tempore culpa maxime quis.',
                'status' => 'enable',
                'institution_id' => 4,
                'area_of_study_id' => 2,
                'career_opportunities' => 'Enrolled Nurse (DIV2)',
                'duration' => '58 Weeks',
                'availability' => 'Melbourne, Perth, Sydney',

            ],
            [
                'title' => 'Graduate Diploma of Professional Accounting',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus temporibus minus enim dolore nisi ab in laboriosam, odio iusto maxime incidunt porro ea ipsam distinctio accusantium, amet corrupti velit, natus quae? Iste labore, voluptatem veritatis quam pariatur maiores, temporibus quae perferendis eligendi, accusamus aspernatur praesentium repellendus tempore culpa maxime quis.',
                'status' => 'enable',
                'institution_id' => 4,
                'area_of_study_id' => 2,
                'career_opportunities' => 'Enrolled Nurse (DIV2)',
                'duration' => '58 Weeks',
                'availability' => 'Melbourne, Perth, Sydney',

            ],
            [
                'title' => 'Master of Professional Accounting',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus temporibus minus enim dolore nisi ab in laboriosam, odio iusto maxime incidunt porro ea ipsam distinctio accusantium, amet corrupti velit, natus quae? Iste labore, voluptatem veritatis quam pariatur maiores, temporibus quae perferendis eligendi, accusamus aspernatur praesentium repellendus tempore culpa maxime quis.',
                'status' => 'enable',
                'institution_id' => 4,
                'area_of_study_id' => 2,
                'career_opportunities' => 'Enrolled Nurse (DIV2)',
                'duration' => '58 Weeks',
                'availability' => 'Melbourne, Perth, Sydney',

            ],
            [
                'title' => 'Graduate Certificate in Management',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus temporibus minus enim dolore nisi ab in laboriosam, odio iusto maxime incidunt porro ea ipsam distinctio accusantium, amet corrupti velit, natus quae? Iste labore, voluptatem veritatis quam pariatur maiores, temporibus quae perferendis eligendi, accusamus aspernatur praesentium repellendus tempore culpa maxime quis.',
                'status' => 'enable',
                'institution_id' => 4,
                'area_of_study_id' => 2,
                'career_opportunities' => 'Enrolled Nurse (DIV2)',
                'duration' => '58 Weeks',
                'availability' => 'Melbourne, Perth, Sydney',

            ],
            [
                'title' => 'Graduate Certificate in Business Administration',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus temporibus minus enim dolore nisi ab in laboriosam, odio iusto maxime incidunt porro ea ipsam distinctio accusantium, amet corrupti velit, natus quae? Iste labore, voluptatem veritatis quam pariatur maiores, temporibus quae perferendis eligendi, accusamus aspernatur praesentium repellendus tempore culpa maxime quis.',
                'status' => 'enable',
                'institution_id' => 4,
                'area_of_study_id' => 2,
                'career_opportunities' => 'Enrolled Nurse (DIV2)',
                'duration' => '58 Weeks',
                'availability' => 'Melbourne, Perth, Sydney',

            ],
            [
                'title' => 'Graduate Diploma in Business Administration',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus temporibus minus enim dolore nisi ab in laboriosam, odio iusto maxime incidunt porro ea ipsam distinctio accusantium, amet corrupti velit, natus quae? Iste labore, voluptatem veritatis quam pariatur maiores, temporibus quae perferendis eligendi, accusamus aspernatur praesentium repellendus tempore culpa maxime quis.',
                'status' => 'enable',
                'institution_id' => 4,
                'area_of_study_id' => 2,
                'career_opportunities' => 'Enrolled Nurse (DIV2)',
                'duration' => '58 Weeks',
                'availability' => 'Melbourne, Perth, Sydney',

            ],
            [
                'title' => 'Master of Business Administration',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus temporibus minus enim dolore nisi ab in laboriosam, odio iusto maxime incidunt porro ea ipsam distinctio accusantium, amet corrupti velit, natus quae? Iste labore, voluptatem veritatis quam pariatur maiores, temporibus quae perferendis eligendi, accusamus aspernatur praesentium repellendus tempore culpa maxime quis.',
                'status' => 'enable',
                'institution_id' => 4,
                'area_of_study_id' => 2,
                'career_opportunities' => 'Enrolled Nurse (DIV2)',
                'duration' => '58 Weeks',
                'availability' => 'Melbourne, Perth, Sydney',

            ],
            [
                'title' => 'Master of Business Management',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus temporibus minus enim dolore nisi ab in laboriosam, odio iusto maxime incidunt porro ea ipsam distinctio accusantium, amet corrupti velit, natus quae? Iste labore, voluptatem veritatis quam pariatur maiores, temporibus quae perferendis eligendi, accusamus aspernatur praesentium repellendus tempore culpa maxime quis.',
                'status' => 'enable',
                'institution_id' => 4,
                'area_of_study_id' => 2,
                'career_opportunities' => 'Enrolled Nurse (DIV2)',
                'duration' => '58 Weeks',
                'availability' => 'Melbourne, Perth, Sydney',

            ],
            [
                'title' => 'Graduate Diploma of Human Resources Management',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus temporibus minus enim dolore nisi ab in laboriosam, odio iusto maxime incidunt porro ea ipsam distinctio accusantium, amet corrupti velit, natus quae? Iste labore, voluptatem veritatis quam pariatur maiores, temporibus quae perferendis eligendi, accusamus aspernatur praesentium repellendus tempore culpa maxime quis.',
                'status' => 'enable',
                'institution_id' => 4,
                'area_of_study_id' => 2,
                'career_opportunities' => 'Enrolled Nurse (DIV2)',
                'duration' => '58 Weeks',
                'availability' => 'Melbourne, Perth, Sydney',

            ],
            [
                'title' => 'Master of Human Resource Management',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus temporibus minus enim dolore nisi ab in laboriosam, odio iusto maxime incidunt porro ea ipsam distinctio accusantium, amet corrupti velit, natus quae? Iste labore, voluptatem veritatis quam pariatur maiores, temporibus quae perferendis eligendi, accusamus aspernatur praesentium repellendus tempore culpa maxime quis.',
                'status' => 'enable',
                'institution_id' => 4,
                'area_of_study_id' => 2,
                'career_opportunities' => 'Enrolled Nurse (DIV2)',
                'duration' => '58 Weeks',
                'availability' => 'Melbourne, Perth, Sydney',

            ],
            [
                'title' => 'Master of  Management for Engineers',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus temporibus minus enim dolore nisi ab in laboriosam, odio iusto maxime incidunt porro ea ipsam distinctio accusantium, amet corrupti velit, natus quae? Iste labore, voluptatem veritatis quam pariatur maiores, temporibus quae perferendis eligendi, accusamus aspernatur praesentium repellendus tempore culpa maxime quis.',
                'status' => 'enable',
                'institution_id' => 4,
                'area_of_study_id' => 2,
                'career_opportunities' => 'Enrolled Nurse (DIV2)',
                'duration' => '58 Weeks',
                'availability' => 'Melbourne, Perth, Sydney',

            ],
            [
                'title' => 'Graduate Certificate in Project Management',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus temporibus minus enim dolore nisi ab in laboriosam, odio iusto maxime incidunt porro ea ipsam distinctio accusantium, amet corrupti velit, natus quae? Iste labore, voluptatem veritatis quam pariatur maiores, temporibus quae perferendis eligendi, accusamus aspernatur praesentium repellendus tempore culpa maxime quis.',
                'status' => 'enable',
                'institution_id' => 4,
                'area_of_study_id' => 2,
                'career_opportunities' => 'Enrolled Nurse (DIV2)',
                'duration' => '58 Weeks',
                'availability' => 'Melbourne, Perth, Sydney',

            ],
            [
                'title' => 'Graduate Diploma in Project Management',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus temporibus minus enim dolore nisi ab in laboriosam, odio iusto maxime incidunt porro ea ipsam distinctio accusantium, amet corrupti velit, natus quae? Iste labore, voluptatem veritatis quam pariatur maiores, temporibus quae perferendis eligendi, accusamus aspernatur praesentium repellendus tempore culpa maxime quis.',
                'status' => 'enable',
                'institution_id' => 4,
                'area_of_study_id' => 2,
                'career_opportunities' => 'Enrolled Nurse (DIV2)',
                'duration' => '58 Weeks',
                'availability' => 'Melbourne, Perth, Sydney',

            ],
            [
                'title' => 'Master of Project Management',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus temporibus minus enim dolore nisi ab in laboriosam, odio iusto maxime incidunt porro ea ipsam distinctio accusantium, amet corrupti velit, natus quae? Iste labore, voluptatem veritatis quam pariatur maiores, temporibus quae perferendis eligendi, accusamus aspernatur praesentium repellendus tempore culpa maxime quis.',
                'status' => 'enable',
                'institution_id' => 4,
                'area_of_study_id' => 2,
                'career_opportunities' => 'Enrolled Nurse (DIV2)',
                'duration' => '58 Weeks',
                'availability' => 'Melbourne, Perth, Sydney',

            ],
            [
                'title' => 'Graduate Certificate in Financial Planning',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus temporibus minus enim dolore nisi ab in laboriosam, odio iusto maxime incidunt porro ea ipsam distinctio accusantium, amet corrupti velit, natus quae? Iste labore, voluptatem veritatis quam pariatur maiores, temporibus quae perferendis eligendi, accusamus aspernatur praesentium repellendus tempore culpa maxime quis.',
                'status' => 'enable',
                'institution_id' => 4,
                'area_of_study_id' => 2,
                'career_opportunities' => 'Enrolled Nurse (DIV2)',
                'duration' => '58 Weeks',
                'availability' => 'Melbourne, Perth, Sydney',

            ],
            [
                'title' => 'Graduate Diploma of Financial Planning',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus temporibus minus enim dolore nisi ab in laboriosam, odio iusto maxime incidunt porro ea ipsam distinctio accusantium, amet corrupti velit, natus quae? Iste labore, voluptatem veritatis quam pariatur maiores, temporibus quae perferendis eligendi, accusamus aspernatur praesentium repellendus tempore culpa maxime quis.',
                'status' => 'enable',
                'institution_id' => 4,
                'area_of_study_id' => 2,
                'career_opportunities' => 'Enrolled Nurse (DIV2)',
                'duration' => '58 Weeks',
                'availability' => 'Melbourne, Perth, Sydney',

            ],
            [
                'title' => 'Master of Financial Planning',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus temporibus minus enim dolore nisi ab in laboriosam, odio iusto maxime incidunt porro ea ipsam distinctio accusantium, amet corrupti velit, natus quae? Iste labore, voluptatem veritatis quam pariatur maiores, temporibus quae perferendis eligendi, accusamus aspernatur praesentium repellendus tempore culpa maxime quis.',
                'status' => 'enable',
                'institution_id' => 4,
                'area_of_study_id' => 2,
                'career_opportunities' => 'Enrolled Nurse (DIV2)',
                'duration' => '58 Weeks',
                'availability' => 'Melbourne, Perth, Sydney',

            ],
            [
                'title' => 'Graduate Certificate in Research',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus temporibus minus enim dolore nisi ab in laboriosam, odio iusto maxime incidunt porro ea ipsam distinctio accusantium, amet corrupti velit, natus quae? Iste labore, voluptatem veritatis quam pariatur maiores, temporibus quae perferendis eligendi, accusamus aspernatur praesentium repellendus tempore culpa maxime quis.',
                'status' => 'enable',
                'institution_id' => 4,
                'area_of_study_id' => 2,
                'career_opportunities' => 'Enrolled Nurse (DIV2)',
                'duration' => '58 Weeks',
                'availability' => 'Melbourne, Perth, Sydney',

            ],


            [
                'title' => 'Bachelor of Creative Arts',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus temporibus minus enim dolore nisi ab in laboriosam, odio iusto maxime incidunt porro ea ipsam distinctio accusantium, amet corrupti velit, natus quae? Iste labore, voluptatem veritatis quam pariatur maiores, temporibus quae perferendis eligendi, accusamus aspernatur praesentium repellendus tempore culpa maxime quis.',
                'status' => 'enable',
                'institution_id' => 4,
                'area_of_study_id' => 6,
                'career_opportunities' => 'Enrolled Nurse (DIV2)',
                'duration' => '58 Weeks',
                'availability' => 'Melbourne, Perth, Sydney',

            ],
            [
                'title' => 'Diploma of Music',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus temporibus minus enim dolore nisi ab in laboriosam, odio iusto maxime incidunt porro ea ipsam distinctio accusantium, amet corrupti velit, natus quae? Iste labore, voluptatem veritatis quam pariatur maiores, temporibus quae perferendis eligendi, accusamus aspernatur praesentium repellendus tempore culpa maxime quis.',
                'status' => 'enable',
                'institution_id' => 4,
                'area_of_study_id' => 6,
                'career_opportunities' => 'Enrolled Nurse (DIV2)',
                'duration' => '58 Weeks',
                'availability' => 'Melbourne, Perth, Sydney',

            ],
            [
                'title' => 'Bachelor of Music (Specialisation)',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus temporibus minus enim dolore nisi ab in laboriosam, odio iusto maxime incidunt porro ea ipsam distinctio accusantium, amet corrupti velit, natus quae? Iste labore, voluptatem veritatis quam pariatur maiores, temporibus quae perferendis eligendi, accusamus aspernatur praesentium repellendus tempore culpa maxime quis.',
                'status' => 'enable',
                'institution_id' => 4,
                'area_of_study_id' => 6,
                'career_opportunities' => 'Enrolled Nurse (DIV2)',
                'duration' => '58 Weeks',
                'availability' => 'Melbourne, Perth, Sydney',

            ],
            [
                'title' => 'Bachelor of Theatre (Specialisation)',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus temporibus minus enim dolore nisi ab in laboriosam, odio iusto maxime incidunt porro ea ipsam distinctio accusantium, amet corrupti velit, natus quae? Iste labore, voluptatem veritatis quam pariatur maiores, temporibus quae perferendis eligendi, accusamus aspernatur praesentium repellendus tempore culpa maxime quis.',
                'status' => 'enable',
                'institution_id' => 4,
                'area_of_study_id' => 6,
                'career_opportunities' => 'Enrolled Nurse (DIV2)',
                'duration' => '58 Weeks',
                'availability' => 'Melbourne, Perth, Sydney',

            ],


            [
                'title' => 'Bachelor of Education (Early Childhood)',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus temporibus minus enim dolore nisi ab in laboriosam, odio iusto maxime incidunt porro ea ipsam distinctio accusantium, amet corrupti velit, natus quae? Iste labore, voluptatem veritatis quam pariatur maiores, temporibus quae perferendis eligendi, accusamus aspernatur praesentium repellendus tempore culpa maxime quis.',
                'status' => 'enable',
                'institution_id' => 4,
                'area_of_study_id' => 7,
                'career_opportunities' => 'Enrolled Nurse (DIV2)',
                'duration' => '58 Weeks',
                'availability' => 'Melbourne, Perth, Sydney',

            ],


            [
                'title' => 'Bachelor of Education (Primary)',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus temporibus minus enim dolore nisi ab in laboriosam, odio iusto maxime incidunt porro ea ipsam distinctio accusantium, amet corrupti velit, natus quae? Iste labore, voluptatem veritatis quam pariatur maiores, temporibus quae perferendis eligendi, accusamus aspernatur praesentium repellendus tempore culpa maxime quis.',
                'status' => 'enable',
                'institution_id' => 4,
                'area_of_study_id' => 7,
                'career_opportunities' => 'Enrolled Nurse (DIV2)',
                'duration' => '58 Weeks',
                'availability' => 'Melbourne, Perth, Sydney',

            ],


            [
                'title' => 'Bachelor of Education (Secondary)',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus temporibus minus enim dolore nisi ab in laboriosam, odio iusto maxime incidunt porro ea ipsam distinctio accusantium, amet corrupti velit, natus quae? Iste labore, voluptatem veritatis quam pariatur maiores, temporibus quae perferendis eligendi, accusamus aspernatur praesentium repellendus tempore culpa maxime quis.',
                'status' => 'enable',
                'institution_id' => 4,
                'area_of_study_id' => 7,
                'career_opportunities' => 'Enrolled Nurse (DIV2)',
                'duration' => '58 Weeks',
                'availability' => 'Melbourne, Perth, Sydney',

            ],


            [
                'title' => 'Diploma of Arts',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus temporibus minus enim dolore nisi ab in laboriosam, odio iusto maxime incidunt porro ea ipsam distinctio accusantium, amet corrupti velit, natus quae? Iste labore, voluptatem veritatis quam pariatur maiores, temporibus quae perferendis eligendi, accusamus aspernatur praesentium repellendus tempore culpa maxime quis.',
                'status' => 'enable',
                'institution_id' => 4,
                'area_of_study_id' => 7,
                'career_opportunities' => 'Enrolled Nurse (DIV2)',
                'duration' => '58 Weeks',
                'availability' => 'Melbourne, Perth, Sydney',

            ],


            [
                'title' => 'Bachelor of Arts',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus temporibus minus enim dolore nisi ab in laboriosam, odio iusto maxime incidunt porro ea ipsam distinctio accusantium, amet corrupti velit, natus quae? Iste labore, voluptatem veritatis quam pariatur maiores, temporibus quae perferendis eligendi, accusamus aspernatur praesentium repellendus tempore culpa maxime quis.',
                'status' => 'enable',
                'institution_id' => 4,
                'area_of_study_id' => 7,
                'career_opportunities' => 'Enrolled Nurse (DIV2)',
                'duration' => '58 Weeks',
                'availability' => 'Melbourne, Perth, Sydney',

            ],




            [
                'title' => 'Bachelor of Engineering (Honours)',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus temporibus minus enim dolore nisi ab in laboriosam, odio iusto maxime incidunt porro ea ipsam distinctio accusantium, amet corrupti velit, natus quae? Iste labore, voluptatem veritatis quam pariatur maiores, temporibus quae perferendis eligendi, accusamus aspernatur praesentium repellendus tempore culpa maxime quis.',
                'status' => 'enable',
                'institution_id' => 4,
                'area_of_study_id' => 8,
                'career_opportunities' => 'Enrolled Nurse (DIV2)',
                'duration' => '58 Weeks',
                'availability' => 'Melbourne, Perth, Sydney',

            ],
            [
                'title' => 'Bachelor of Engineering (Honours) and Diploma of Professional Pracice (Co-op Engineering)',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus temporibus minus enim dolore nisi ab in laboriosam, odio iusto maxime incidunt porro ea ipsam distinctio accusantium, amet corrupti velit, natus quae? Iste labore, voluptatem veritatis quam pariatur maiores, temporibus quae perferendis eligendi, accusamus aspernatur praesentium repellendus tempore culpa maxime quis.',
                'status' => 'enable',
                'institution_id' => 4,
                'area_of_study_id' => 8,
                'career_opportunities' => 'Enrolled Nurse (DIV2)',
                'duration' => '58 Weeks',
                'availability' => 'Melbourne, Perth, Sydney',

            ],
            [
                'title' => 'Master of Engineering',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus temporibus minus enim dolore nisi ab in laboriosam, odio iusto maxime incidunt porro ea ipsam distinctio accusantium, amet corrupti velit, natus quae? Iste labore, voluptatem veritatis quam pariatur maiores, temporibus quae perferendis eligendi, accusamus aspernatur praesentium repellendus tempore culpa maxime quis.',
                'status' => 'enable',
                'institution_id' => 4,
                'area_of_study_id' => 8,
                'career_opportunities' => 'Enrolled Nurse (DIV2)',
                'duration' => '58 Weeks',
                'availability' => 'Melbourne, Perth, Sydney',

            ],
            [
                'title' => 'Graduate Certificate in Asset and Maintenance Management',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus temporibus minus enim dolore nisi ab in laboriosam, odio iusto maxime incidunt porro ea ipsam distinctio accusantium, amet corrupti velit, natus quae? Iste labore, voluptatem veritatis quam pariatur maiores, temporibus quae perferendis eligendi, accusamus aspernatur praesentium repellendus tempore culpa maxime quis.',
                'status' => 'enable',
                'institution_id' => 4,
                'area_of_study_id' => 8,
                'career_opportunities' => 'Enrolled Nurse (DIV2)',
                'duration' => '58 Weeks',
                'availability' => 'Melbourne, Perth, Sydney',

            ],
            [
                'title' => 'Graduate Diploma of Asset and Maintenance Management',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus temporibus minus enim dolore nisi ab in laboriosam, odio iusto maxime incidunt porro ea ipsam distinctio accusantium, amet corrupti velit, natus quae? Iste labore, voluptatem veritatis quam pariatur maiores, temporibus quae perferendis eligendi, accusamus aspernatur praesentium repellendus tempore culpa maxime quis.',
                'status' => 'enable',
                'institution_id' => 4,
                'area_of_study_id' => 8,
                'career_opportunities' => 'Enrolled Nurse (DIV2)',
                'duration' => '58 Weeks',
                'availability' => 'Melbourne, Perth, Sydney',

            ],
            [
                'title' => 'Master of Asset and Maintenance Management',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus temporibus minus enim dolore nisi ab in laboriosam, odio iusto maxime incidunt porro ea ipsam distinctio accusantium, amet corrupti velit, natus quae? Iste labore, voluptatem veritatis quam pariatur maiores, temporibus quae perferendis eligendi, accusamus aspernatur praesentium repellendus tempore culpa maxime quis.',
                'status' => 'enable',
                'institution_id' => 4,
                'area_of_study_id' => 8,
                'career_opportunities' => 'Enrolled Nurse (DIV2)',
                'duration' => '58 Weeks',
                'availability' => 'Melbourne, Perth, Sydney',

            ],



            [
                'title' => 'Bachelor of Science (Chiropractic)',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus temporibus minus enim dolore nisi ab in laboriosam, odio iusto maxime incidunt porro ea ipsam distinctio accusantium, amet corrupti velit, natus quae? Iste labore, voluptatem veritatis quam pariatur maiores, temporibus quae perferendis eligendi, accusamus aspernatur praesentium repellendus tempore culpa maxime quis.',
                'status' => 'enable',
                'institution_id' => 4,
                'area_of_study_id' => 5,
                'career_opportunities' => 'Enrolled Nurse (DIV2)',
                'duration' => '58 Weeks',
                'availability' => 'Melbourne, Perth, Sydney',

            ],
            [   
                'title' => 'Bachelor of Medical Science',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus temporibus minus enim dolore nisi ab in laboriosam, odio iusto maxime incidunt porro ea ipsam distinctio accusantium, amet corrupti velit, natus quae? Iste labore, voluptatem veritatis quam pariatur maiores, temporibus quae perferendis eligendi, accusamus aspernatur praesentium repellendus tempore culpa maxime quis.',
                'status' => 'enable',
                'institution_id' => 4,
                'area_of_study_id' => 5,
                'career_opportunities' => 'Enrolled Nurse (DIV2)',
                'duration' => '58 Weeks',
                'availability' => 'Melbourne, Perth, Sydney',

            ],
            [   
                'title' => 'Bachelor of Allied Health',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus temporibus minus enim dolore nisi ab in laboriosam, odio iusto maxime incidunt porro ea ipsam distinctio accusantium, amet corrupti velit, natus quae? Iste labore, voluptatem veritatis quam pariatur maiores, temporibus quae perferendis eligendi, accusamus aspernatur praesentium repellendus tempore culpa maxime quis.',
                'status' => 'enable',
                'institution_id' => 4,
                'area_of_study_id' => 5,
                'career_opportunities' => 'Enrolled Nurse (DIV2)',
                'duration' => '58 Weeks',
                'availability' => 'Melbourne, Perth, Sydney',

            ],
            [   
                'title' => 'Bachelor of Occupational Theapy (Honours)',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus temporibus minus enim dolore nisi ab in laboriosam, odio iusto maxime incidunt porro ea ipsam distinctio accusantium, amet corrupti velit, natus quae? Iste labore, voluptatem veritatis quam pariatur maiores, temporibus quae perferendis eligendi, accusamus aspernatur praesentium repellendus tempore culpa maxime quis.',
                'status' => 'enable',
                'institution_id' => 4,
                'area_of_study_id' => 5,
                'career_opportunities' => 'Enrolled Nurse (DIV2)',
                'duration' => '58 Weeks',
                'availability' => 'Melbourne, Perth, Sydney',

            ],
            [   
                'title' => 'Bachelor of Physiotherapy',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus temporibus minus enim dolore nisi ab in laboriosam, odio iusto maxime incidunt porro ea ipsam distinctio accusantium, amet corrupti velit, natus quae? Iste labore, voluptatem veritatis quam pariatur maiores, temporibus quae perferendis eligendi, accusamus aspernatur praesentium repellendus tempore culpa maxime quis.',
                'status' => 'enable',
                'institution_id' => 4,
                'area_of_study_id' => 5,
                'career_opportunities' => 'Enrolled Nurse (DIV2)',
                'duration' => '58 Weeks',
                'availability' => 'Melbourne, Perth, Sydney',

            ],
            [   
                'title' => 'Bachelor of Podiatry Practice (Honours)',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus temporibus minus enim dolore nisi ab in laboriosam, odio iusto maxime incidunt porro ea ipsam distinctio accusantium, amet corrupti velit, natus quae? Iste labore, voluptatem veritatis quam pariatur maiores, temporibus quae perferendis eligendi, accusamus aspernatur praesentium repellendus tempore culpa maxime quis.',
                'status' => 'enable',
                'institution_id' => 4,
                'area_of_study_id' => 5,
                'career_opportunities' => 'Enrolled Nurse (DIV2)',
                'duration' => '58 Weeks',
                'availability' => 'Melbourne, Perth, Sydney',

            ],
            [   
                'title' => 'Bachelor of Exercise and Sport Sciences',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus temporibus minus enim dolore nisi ab in laboriosam, odio iusto maxime incidunt porro ea ipsam distinctio accusantium, amet corrupti velit, natus quae? Iste labore, voluptatem veritatis quam pariatur maiores, temporibus quae perferendis eligendi, accusamus aspernatur praesentium repellendus tempore culpa maxime quis.',
                'status' => 'enable',
                'institution_id' => 4,
                'area_of_study_id' => 5,
                'career_opportunities' => 'Enrolled Nurse (DIV2)',
                'duration' => '58 Weeks',
                'availability' => 'Melbourne, Perth, Sydney',

            ],
            [   
                'title' => 'Bachelor of Nursing',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus temporibus minus enim dolore nisi ab in laboriosam, odio iusto maxime incidunt porro ea ipsam distinctio accusantium, amet corrupti velit, natus quae? Iste labore, voluptatem veritatis quam pariatur maiores, temporibus quae perferendis eligendi, accusamus aspernatur praesentium repellendus tempore culpa maxime quis.',
                'status' => 'enable',
                'institution_id' => 4,
                'area_of_study_id' => 5,
                'career_opportunities' => 'Enrolled Nurse (DIV2)',
                'duration' => '58 Weeks',
                'availability' => 'Melbourne, Perth, Sydney',

            ],
            [   
                'title' => 'Graduate Certificate in Nursing (IRNE)',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus temporibus minus enim dolore nisi ab in laboriosam, odio iusto maxime incidunt porro ea ipsam distinctio accusantium, amet corrupti velit, natus quae? Iste labore, voluptatem veritatis quam pariatur maiores, temporibus quae perferendis eligendi, accusamus aspernatur praesentium repellendus tempore culpa maxime quis.',
                'status' => 'enable',
                'institution_id' => 4,
                'area_of_study_id' => 5,
                'career_opportunities' => 'Enrolled Nurse (DIV2)',
                'duration' => '58 Weeks',
                'availability' => 'Melbourne, Perth, Sydney',

            ],
            [   
                'title' => 'Graduate Diploma of Paramedic Science (Critical Care',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus temporibus minus enim dolore nisi ab in laboriosam, odio iusto maxime incidunt porro ea ipsam distinctio accusantium, amet corrupti velit, natus quae? Iste labore, voluptatem veritatis quam pariatur maiores, temporibus quae perferendis eligendi, accusamus aspernatur praesentium repellendus tempore culpa maxime quis.',
                'status' => 'enable',
                'institution_id' => 4,
                'area_of_study_id' => 5,
                'career_opportunities' => 'Enrolled Nurse (DIV2)',
                'duration' => '58 Weeks',
                'availability' => 'Melbourne, Perth, Sydney',

            ],
            [   
                'title' => 'Graduate Certificate in Clinical Ultrasound (Specialisation)',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus temporibus minus enim dolore nisi ab in laboriosam, odio iusto maxime incidunt porro ea ipsam distinctio accusantium, amet corrupti velit, natus quae? Iste labore, voluptatem veritatis quam pariatur maiores, temporibus quae perferendis eligendi, accusamus aspernatur praesentium repellendus tempore culpa maxime quis.',
                'status' => 'enable',
                'institution_id' => 4,
                'area_of_study_id' => 5,
                'career_opportunities' => 'Enrolled Nurse (DIV2)',
                'duration' => '58 Weeks',
                'availability' => 'Melbourne, Perth, Sydney',

            ],
            [   
                'title' => 'Master of Paramedic Science (Paramedic Practitioner)',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus temporibus minus enim dolore nisi ab in laboriosam, odio iusto maxime incidunt porro ea ipsam distinctio accusantium, amet corrupti velit, natus quae? Iste labore, voluptatem veritatis quam pariatur maiores, temporibus quae perferendis eligendi, accusamus aspernatur praesentium repellendus tempore culpa maxime quis.',
                'status' => 'enable',
                'institution_id' => 4,
                'area_of_study_id' => 5,
                'career_opportunities' => 'Enrolled Nurse (DIV2)',
                'duration' => '58 Weeks',
                'availability' => 'Melbourne, Perth, Sydney',

            ],
            [   
                'title' => 'Bachelor of Oral Health',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus temporibus minus enim dolore nisi ab in laboriosam, odio iusto maxime incidunt porro ea ipsam distinctio accusantium, amet corrupti velit, natus quae? Iste labore, voluptatem veritatis quam pariatur maiores, temporibus quae perferendis eligendi, accusamus aspernatur praesentium repellendus tempore culpa maxime quis.',
                'status' => 'enable',
                'institution_id' => 4,
                'area_of_study_id' => 5,
                'career_opportunities' => 'Enrolled Nurse (DIV2)',
                'duration' => '58 Weeks',
                'availability' => 'Melbourne, Perth, Sydney',

            ],
            [   
                'title' => 'Master of Mental Health Nursing',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus temporibus minus enim dolore nisi ab in laboriosam, odio iusto maxime incidunt porro ea ipsam distinctio accusantium, amet corrupti velit, natus quae? Iste labore, voluptatem veritatis quam pariatur maiores, temporibus quae perferendis eligendi, accusamus aspernatur praesentium repellendus tempore culpa maxime quis.',
                'status' => 'enable',
                'institution_id' => 4,
                'area_of_study_id' => 5,
                'career_opportunities' => 'Enrolled Nurse (DIV2)',
                'duration' => '58 Weeks',
                'availability' => 'Melbourne, Perth, Sydney',

            ],
            [   
                'title' => 'Bachelor of Speech Pathology (Honours)',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus temporibus minus enim dolore nisi ab in laboriosam, odio iusto maxime incidunt porro ea ipsam distinctio accusantium, amet corrupti velit, natus quae? Iste labore, voluptatem veritatis quam pariatur maiores, temporibus quae perferendis eligendi, accusamus aspernatur praesentium repellendus tempore culpa maxime quis.',
                'status' => 'enable',
                'institution_id' => 4,
                'area_of_study_id' => 5,
                'career_opportunities' => 'Enrolled Nurse (DIV2)',
                'duration' => '58 Weeks',
                'availability' => 'Melbourne, Perth, Sydney',

            ],
            [   
                'title' => 'Graduate Certificate in Tactical Medicine',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus temporibus minus enim dolore nisi ab in laboriosam, odio iusto maxime incidunt porro ea ipsam distinctio accusantium, amet corrupti velit, natus quae? Iste labore, voluptatem veritatis quam pariatur maiores, temporibus quae perferendis eligendi, accusamus aspernatur praesentium repellendus tempore culpa maxime quis.',
                'status' => 'enable',
                'institution_id' => 4,
                'area_of_study_id' => 5,
                'career_opportunities' => 'Enrolled Nurse (DIV2)',
                'duration' => '58 Weeks',
                'availability' => 'Melbourne, Perth, Sydney',

            ],
            [   
                'title' => 'Graduate Certificate in Dementia Studies',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus temporibus minus enim dolore nisi ab in laboriosam, odio iusto maxime incidunt porro ea ipsam distinctio accusantium, amet corrupti velit, natus quae? Iste labore, voluptatem veritatis quam pariatur maiores, temporibus quae perferendis eligendi, accusamus aspernatur praesentium repellendus tempore culpa maxime quis.',
                'status' => 'enable',
                'institution_id' => 4,
                'area_of_study_id' => 5,
                'career_opportunities' => 'Enrolled Nurse (DIV2)',
                'duration' => '58 Weeks',
                'availability' => 'Melbourne, Perth, Sydney',

            ],
            [   
                'title' => 'Graduate Diploma in Dementia Studies',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus temporibus minus enim dolore nisi ab in laboriosam, odio iusto maxime incidunt porro ea ipsam distinctio accusantium, amet corrupti velit, natus quae? Iste labore, voluptatem veritatis quam pariatur maiores, temporibus quae perferendis eligendi, accusamus aspernatur praesentium repellendus tempore culpa maxime quis.',
                'status' => 'enable',
                'institution_id' => 4,
                'area_of_study_id' => 5,
                'career_opportunities' => 'Enrolled Nurse (DIV2)',
                'duration' => '58 Weeks',
                'availability' => 'Melbourne, Perth, Sydney',

            ],
            [   
                'title' => 'Graduate Certificate in Healthy Ageing',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus temporibus minus enim dolore nisi ab in laboriosam, odio iusto maxime incidunt porro ea ipsam distinctio accusantium, amet corrupti velit, natus quae? Iste labore, voluptatem veritatis quam pariatur maiores, temporibus quae perferendis eligendi, accusamus aspernatur praesentium repellendus tempore culpa maxime quis.',
                'status' => 'enable',
                'institution_id' => 4,
                'area_of_study_id' => 5,
                'career_opportunities' => 'Enrolled Nurse (DIV2)',
                'duration' => '58 Weeks',
                'availability' => 'Melbourne, Perth, Sydney',

            ],
            [   
                'title' => 'Graduate Diploma of Healthy Ageing',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus temporibus minus enim dolore nisi ab in laboriosam, odio iusto maxime incidunt porro ea ipsam distinctio accusantium, amet corrupti velit, natus quae? Iste labore, voluptatem veritatis quam pariatur maiores, temporibus quae perferendis eligendi, accusamus aspernatur praesentium repellendus tempore culpa maxime quis.',
                'status' => 'enable',
                'institution_id' => 4,
                'area_of_study_id' => 5,
                'career_opportunities' => 'Enrolled Nurse (DIV2)',
                'duration' => '58 Weeks',
                'availability' => 'Melbourne, Perth, Sydney',

            ],
            [   
                'title' => 'Master of Medical Ultrasound',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus temporibus minus enim dolore nisi ab in laboriosam, odio iusto maxime incidunt porro ea ipsam distinctio accusantium, amet corrupti velit, natus quae? Iste labore, voluptatem veritatis quam pariatur maiores, temporibus quae perferendis eligendi, accusamus aspernatur praesentium repellendus tempore culpa maxime quis.',
                'status' => 'enable',
                'institution_id' => 4,
                'area_of_study_id' => 5,
                'career_opportunities' => 'Enrolled Nurse (DIV2)',
                'duration' => '58 Weeks',
                'availability' => 'Melbourne, Perth, Sydney',

            ],
            [   
                'title' => 'Master of Public Health',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus temporibus minus enim dolore nisi ab in laboriosam, odio iusto maxime incidunt porro ea ipsam distinctio accusantium, amet corrupti velit, natus quae? Iste labore, voluptatem veritatis quam pariatur maiores, temporibus quae perferendis eligendi, accusamus aspernatur praesentium repellendus tempore culpa maxime quis.',
                'status' => 'enable',
                'institution_id' => 4,
                'area_of_study_id' => 5,
                'career_opportunities' => 'Enrolled Nurse (DIV2)',
                'duration' => '58 Weeks',
                'availability' => 'Melbourne, Perth, Sydney',

            ]




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
