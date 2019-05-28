<?php

use App\Models\Linkages\Linkages;
use Illuminate\Database\Seeder;
use HalcyonLaravel\Base\Database\Traits\SeederHelper;

/**
 * Class LinkagesTableSeeder
 */
class LinkagesTableSeeder extends Seeder
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

        $page = $this->modelPageSeeder(new Linkages);
        
        $this->seedToDomainables($page, 'main');

        $page->metaTag()->create([
                'title' => $page->title,
                'description' => $page->title,
                'keywords' => str_replace('-', ',', $page->slug),
        ]);

        $data = [
            [
                'title' => 'Melbourne',
                'country_id' => 1,
                'order' => 0,
            ],
            [
                'title' => 'Sydney',
                'country_id' => 1,
                'order' => 1,
            ],
            [
                'title' => 'Brisbane',
                'country_id' => 1,
                'order' => 2,
            ],
            [
                'title' => 'Perth',
                'country_id' => 1,
                'order' => 3,
            ],
            [
                'title' => 'Goldcoast',
                'country_id' => 1,
                'order' => 4,
            ],
            [
                'title' => 'Adelaide',
                'country_id' => 1,
                'order' => 5,
            ],
            [
                'title' => 'Ontario',
                'country_id' => 2,
                'order' => 0,
            ],
            [
                'title' => 'Alberta',
                'country_id' => 2,
                'order' => 1,
            ],
            [
                'title' => 'British Columbia',
                'country_id' => 2,
                'order' => 2,
            ],
            [
                'title' => 'Monitoba',
                'country_id' => 2,
                'order' => 3,
            ],
            [
                'title' => 'Newfoundland',
                'country_id' => 2,
                'order' => 4,
            ],
            [
                'title' => 'New Brunswick',
                'country_id' => 2,
                'order' => 5,
            ],
            [
                'title' => 'Nova Scotia',
                'country_id' => 2,
                'order' => 6,
            ],
            [
                'title' => 'Wellington',
                'country_id' => 3,
                'order' => 0,
            ],
            [
                'title' => 'Auckland',
                'country_id' => 3,
                'order' => 2,
            ],
            [
                'title' => 'New Plymounth',
                'country_id' => 3,
                'order' => 3,
            ],
            [
                'title' => 'Westland',
                'country_id' => 3,
                'order' => 4,
            ],
            [
                'title' => 'Southland',
                'country_id' => 3,
                'order' => 5,
            ],
            [
                'title' => 'Canterbury',
                'country_id' => 3,
                'order' => 6,
            ],
        ];

        $linkages = [
            [
                'Academia International.png',
                'Australian Center of Further Education.jpg',
                'Central Queensland University.png',
                'Danford College.png',
                'Education Training and Employment Australia.png',
                'Institute of Health and Nursing Australia.png',
                'Job Training Institute.png',
                'Kent Institute.png',
                'Original Campus.png',
                'PAX Institute.png',
                'RGIT.png',
                'TMG College.png',
                'Ultimate Institute of Australia.png',
                'Victorian Institute of Technology.jpg',
            ],
            [
                'Australian Institute of Professional Pathways.png',
                'Australian Skills Management Institute.jpg',
                'Australian Vocational Learning Centre.jpg',
                'Australis Institute of Technology and Education.jpg',
                'Central Queensland University.png',
                'Envirotech College.jpg',
                'Institute of Health and Nursing Australia.png',
                'Kent Institute.png',
                'Kingsford International Institute.png',
                'Queensford College.jpg',
                'Sydney City College of Management.png',
                'Victorian Institute of Technology.jpg',
            ],
            [
                'Academia International.png',
                'Australian Skills Management Institute.jpg',
                'Australian Skills Group.jpg',
                'Australis Institute of Technology and Education.jpg',
                'Axis Institute.png',
                'Central Queensland University.png',
                'EDUCare College.jpg',
                'Elite Training Institute Australia.png',
                'Everthought College of Construction.png',
                'Imagine Education.jpg',
                'James Cook University.jpg',
                'Queensford College.jpg',
                'Russo Business School.png',
                'Sarina Russo Institute.png',
                'Vibe College.png',
            ],
            [
                'Central Queensland University.png',
                'Everthought College of Construction.png',
                'Institute of Health and Nursing Australia.png',
                'Skills Australia Institute.png',
                'Stanley College.jpg',
            ],
            [
                'Australis Institute of Technology and Education.jpg',
                'EDUCare College.jpg',
                'Imagine Education.jpg',
            ],
            [
                'Central Queensland University.png',
                'Sheffield College.png',
                'Skills Australia Institute.png',
            ],
            [
                'Niagara College Canada.png',
                'Lambton College.jpg',
                'Canadore College.png',
                'Cambrian College.png',
            ],
            [],
            [
                'Stenberg College.jpg',
                'Sprott Shaw College.jpg',
                'Kwantlen Polytechnic University.jpg',
            ],
            [],
            [],
            [],
            [],
            [],
            [
                'International College of Auckland.png',
                'Aspire2 International.png',
            ],
            [],
            [],
            [],
            [],
            [],
            [],
            [],
            [],
            [],
            [],
            [],
            [],
            [],
            [],
            [],
            [],
            [],

        ];

        foreach ($data as $key => $value) {
            
            $model = Linkages::create($value);

            foreach ($linkages[$key] as $key1 => $value1) {

                switch ($value['country_id']) {

                    case 1: $folder = 'australia'; break;

                    case 2: $folder = 'canada'; break;
                    
                    default: $folder = 'new_zealand'; break;
                
                }

                $this->seederUploader($model, 'country/school_partners/' . $folder. '/' . $value1, null, 'featured');

            }

        }

        $this->enableForeignKeys();
    }
}
