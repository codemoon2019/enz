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
                'title' => 'Creative Arts and Design',
                'description' => 'This course provides responsibilities involved in engaging children individually and in groups. The Certificate III in Early Childhood Education and Care addresses the skills and knowledge required to provide care for individuals and groups of children, and to plan activities facilitating their leisure and play, enabling them to achieve their developmental outcomes.',
                'order' => 0,

            ],
            [
                'title' => 'Business, Management & Marketing',
                'description' => 'Prepare yourself in the business world by studying business, management or marketing. Acquiring this tailored training qualification unlocks new opportunities within the fluctuating world of business.',
                'order' => 0,

            ],
            [
                'title' => 'Hospitality and Cookery',
                'description' => 'Improve your chances for a global career by studying Hospitality & Cookery courses abroad. The hospitality industry is one of the most expansive and diverse industry, which means you’ll never be limited in your job search. It will also give you the chance to see many new places.',
                'order' => 0,

            ],
            [
                'title' => 'Information Technology & Digital media',
                'description' => 'Information Technology & Digital media is incredibly diverse, fast-paced industry, which is constantly changing and evolving. One of the top reasons to study these courses is the increase of job opportunities around the world.',
                'order' => 0,

            ],
            [
                'title' => 'Healthcare',
                'description' => 'Boost your healthcare career while gaining hands on experience abroad! The advantage of studying abroad is it is recognized throughout the world. As a result, future health practitioners can expect to earn a higher salary globally and achieve better results for patients. Healthcare students who complete their education in Australia, New Zealand or Canada can look forward to more opportunities and higher earnings throughout their future career.',
                'order' => 0,

            ],
            [
                'title' => 'Agriculture and Environmental',
                'description' => 'Studying creative arts and design abroad is the perfect opportunity to develop your creativity and pursue artistic careers. The demand for web designers, app designers, software designers, graphic designers, digital illustrators, multimedia artists, video producers, online publishers, animation artists, game designers and many other digital careers is undergoing unprecedented growth. With this qualification, the range of occupations graduates can enter is vast.',
                'order' => 0,

            ],
            [
                'title' => 'Education and Language',
                'description' => '',
                'order' => 0,
            ],
            [
                'title' => 'Engineering and Architecture',
                'description' => '',
                'order' => 0,
            ],
            [
                'title' => 'Higher Education Degrees',
                'description' => '',
                'order' => 0,

            ],
            [
                'title' => 'Other Courses',
                'description' => 'Explore more courses that suits you best for your studies abroad.',
                'order' => 0,

            ],

        ];

        $images = [

            'Agriculture_and_Environmental.jpg',
            'business_and_management_0.jpg',
            'Hospitality_and_Cookery.jpg',
            'Information_Technology_&_Digital_media.jpg',
            'Healthcare.jpg',
            'Creative_Arts_and_Design.jpg',
            'Education_and_Language.jpg',
            'Engineering_and_Architecture.jpg',
            'Higher_Education_Degrees.jpg',
            'Other_courses.jpg',

        ];  

        foreach ($data as $key => $value) {

            $model = AreaOfStudy::create($value);
            
            $this->seederUploader($model, 'area_of_study/' . $images[$key], null, 'featured');

            $model->metaTag()->create([
                'title' => $model->title,
                'description' => $model->title,
                'keywords' => str_replace('-', ',', $model->slug),
            ]);

        }

        $this->enableForeignKeys();
    }
}
