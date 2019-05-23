<?php

use App\Models\Institution\Institution;
use Illuminate\Database\Seeder;
use HalcyonLaravel\Base\Database\Traits\SeederHelper;

/**
 * Class InstitutionTableSeeder
 */
class InstitutionTableSeeder extends Seeder
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

        $page = $this->modelPageSeeder(new Institution);

        $this->seedToDomainables($page, 'main');

        $data = [
            ['title' => 'Australian Centre of Further Education', 'country_id' => 1 , 'order' => 0, 'status' => 'enable'],
            ['title' => 'Australian Institute of Advanced Studies', 'country_id' => 1 , 'order' => 1, 'status' => 'enable'],
            ['title' => 'Cairns College of English and Business', 'country_id' => 1 , 'order' => 2, 'status' => 'enable'],
            ['title' => 'Central Queensland University', 'country_id' => 1 , 'order' => 3, 'status' => 'enable'],
            ['title' => 'Danford College', 'country_id' => 4 , 'order' => 4, 'status' => 'enable'],
            ['title' => 'Elite_Training Institute Australia', 'country_id' => 5 , 'order' => 5, 'status' => 'enable'],
            ['title' => 'Envirotech College', 'country_id' => 1 , 'order' => 6, 'status' => 'enable'],
            ['title' => 'Education Training and Employment Australia', 'country_id' => 1 , 'order' => 7, 'status' => 'enable'],
            ['title' => 'Everthought College of Construction', 'country_id' => 1 , 'order' => 8, 'status' => 'enable'],
            ['title' => 'Institute of Health and Nursing Australia & IHM', 'country_id' => 1 , 'order' => 9, 'status' => 'enable'],
            ['title' => 'James Cook University', 'country_id' => 1 , 'order' => 10, 'status' => 'enable'],
            ['title' => 'Kent Institute', 'country_id' => 1 , 'order' => 11, 'status' => 'enable'],
            ['title' => 'Kingsford International Institute', 'country_id' => 1 , 'order' => 12, 'status' => 'enable'],
            ['title' => 'Queensford College', 'country_id' => 1 , 'order' => 13, 'status' => 'enable'],
            ['title' => 'Sarina Russo Institute', 'country_id' => 1 , 'order' => 14, 'status' => 'enable'],
            ['title' => 'Sheffield College', 'country_id' => 1 , 'order' => 15, 'status' => 'enable'],
            ['title' => 'Skills Australia Institute', 'country_id' => 1 , 'order' => 16, 'status' => 'enable'],
            ['title' => 'Stanley College', 'country_id' => 1 , 'order' => 17, 'status' => 'enable'],
            ['title' => 'TMG College', 'country_id' => 1 , 'order' => 18, 'status' => 'enable'],
            ['title' => 'Ultimate Institute of Australia', 'country_id' => 1 , 'order' => 19, 'status' => 'enable'],
            ['title' => 'Vibe College', 'country_id' => 1 , 'order' => 20, 'status' => 'enable'],
            ['title' => 'Academia', 'country_id' => 1 , 'order' => 21, 'status' => 'enable'],
            ['title' => 'The Hotel School', 'country_id' => 1 , 'order' => 22, 'status' => 'enable'],
            ['title' => 'Canberra Institute ', 'country_id' => 1 , 'order' => 23, 'status' => 'enable'],
            ['title' => 'PAX Institute', 'country_id' => 1 , 'order' => 24, 'status' => 'enable'],
            ['title' => 'Original Campus', 'country_id' => 1 , 'order' => 25, 'status' => 'enable'],
            ['title' => 'AITE', 'country_id' => 1 , 'order' => 26, 'status' => 'enable'],
            ['title' => 'RGIT', 'country_id' => 1 , 'order' => 27, 'status' => 'enable'],
        ];

        $images = [

            'ACFE.jpg',
            'Australian_Institute_of_Advanced_Studies.jpg',
            'Cairns_College_of_English_and_Business.png',
            'Central_Queensland_University.png',
            'Danford_College.jpg',
            'Elite_Training_Institute_Australia.png',
            'Envirotech_College.jpg',
            'Education_Training_and_Employment_Australia.png',
            'Everthought_College_of_Construction.png',
            'Institute_of_Health_and_Nursing_Australia.png',
            'James_Cook_University.png',
            'Kent_Institute.png',
            'Kingsford_International_Institute.jpg',
            'Queensford_College.jpeg',
            'Sarina_Russo_Institute.png',
            'Sheffield_College.png',
            'Skills_Australia_Institute.png',
            'Stanley_College.png',
            'TMG_College.png',
            'Ultimate_Institute_of_Australia.png',
            'Vibe_College.png',
            'RGIT.png',
            'RGIT.png',
            'RGIT.png',
            'RGIT.png',
            'RGIT.png',
            'RGIT.png',
            'RGIT.png',

        ];

        foreach($data as $key => $value){

            $model = Institution::create($value);            

            $this->seederUploader($model, 'institution/australia/' . $images[$key], null, 'featured');

        }

        $this->enableForeignKeys();
    }
}
