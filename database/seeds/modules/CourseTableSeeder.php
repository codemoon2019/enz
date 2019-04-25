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
                'title' => 'Community Services',
                'description' => 'This course provides responsibilities involved in engaging children individually and in groups. The Certificate III in Early Childhood Education and Care addresses the skills and knowledge required to provide care for individuals and groups of children, and to plan activities facilitating their leisure and play, enabling them to achieve their developmental outcomes.',
                'status' => 'enable',
            ],
            [
                'title' => 'Business , Management & Marketing',
                'description' => 'Diploma of Business unlocks new opportunities within the fluctuating world of business by acquiring this tailored training qualification. This course will see you discover business fundamentals in project management and human resources to ignite your potential career goals.',
                'status' => 'enable',
            ],
            [
                'title' => 'Hospitality and Cookery',
                'description' => 'The Certificate IV in Patisserie reflects the role of pastry chefs who have a supervisory or team leading role in the kitchen. They operate independently or with limited guidance from others and use discretion to solve non-routine problems. This qualification provides a pathway to work in various organisations where patisserie products are prepared and served, including patisseries, restaurants, hotels, catering operations, clubs, pubs, cafés, and coffee shops.',
                'status' => 'enable',

            ],
            [
                'title' => 'Information & Technology',
                'description' => 'Administer and manage information and communications technology (ICT) support in small-to-medium enterprises (SMEs) using a wide range of general ICT technologies. This level will provide a broader rather than specialized ICT support function, applying a wide range of higher level technical skills in ICT areas such as networking, IT support, database development, programming and web development. Career Opportunities: Help Desk Network Support Technician Systems Administrator Assistant IT Manager',
                'status' => 'enable',

            ],
            [
                'title' => 'Initial Registration for Overseas Nurses',
                'description' => 'Have your overseas nursing qualification recognised and register with the Australian Health Practitioner Regulation Agency (AHPRA). Learn about the nursing profession in Australia and become part of it! The IRON program is a quality bridging program for nurses entering Australia. This course is designed to provide you with the knowledge, skills and understanding to practice safely and competently in a variety of health care settings. On successful completion of this course, graduates will be eligible to apply to the Australian Health Practitioner Regulation Agency (AHPRA) for registration as a Registered Nurse.',
                'status' => 'enable',

            ],
            [
                'title' => 'Other Courses',
                'description' => 'This program is designed for international students wanting to gain the qualification required to work in the Dental Technology industry. This qualification reflect the role of a dental technician responsible for construction and repair of dentures and other dental appliances including crowns, bridges, partial dentures, pre- and post-oral and maxillofacial surgical devices and orthodontic appliances.',
                'status' => 'enable',

            ],
        ];        

        foreach ($data as $key => $value) {

            $model = Course::create($value);

            $this->seederUploader($model, 'course/course1.jpg', null, 'featured');

            $model->metaTag()->create([
                'title' => $model->title,
                'description' => $model->title,
                'keywords' => str_replace('-', ',', $model->slug),
            ]);

        }

        $this->enableForeignKeys();
    }
}
