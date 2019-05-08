<?php

use App\Models\CountryDetails\CountryDetails;
use Illuminate\Database\Seeder;
use HalcyonLaravel\Base\Database\Traits\SeederHelper;

/**
 * Class CountryDetailsTableSeeder
 */
class CountryDetailsTableSeeder extends Seeder
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

        $page = $this->modelPageSeeder(new CountryDetails);

        $this->seedToDomainables($page, 'main');

                $data = [
            [
                'country_id' => 1,
                'title' => 'Melbourne',
                'description' => 'Sample Description',
                'order' => 0,
            ],
            [
                'country_id' => 1,
                'title' => 'Sydney',
                'description' => 'Sample Description',
                'order' => 1,
            ],
            [
                'country_id' => 1,
                'title' => 'Brisbane',
                'description' => 'Sample Description',
                'order' => 2,
            ],
            [
                'country_id' => 1,
                'title' => 'Perth',
                'description' => 'Sample Description',
                'order' => 3,
            ],
            [
                'country_id' => 1,
                'title' => 'Goldcoast',
                'description' => 'Sample Description',
                'order' => 4,
            ],
            [
                'country_id' => 1,
                'title' => 'Adelaide',
                'description' => 'Sample Description',
                'order' => 5,
            ],
            [
                'country_id' => 2,
                'title' => 'Ontario',
                'description' => 'Sample Description',
                'order' => 0,
            ],
            [
                'country_id' => 2,
                'title' => 'Alberta',
                'description' => 'Sample Description',
                'order' => 1,
            ],
            [
                'country_id' => 2,
                'title' => 'British Columbia',
                'description' => 'Sample Description',
                'order' => 2,
            ],
            [
                'country_id' => 2,
                'title' => 'Monitoba',
                'description' => 'Sample Description',
                'order' => 3,
            ],
            [
                'country_id' => 2,
                'title' => 'Newfoundland',
                'description' => 'Sample Description',
                'order' => 4,
            ],
            [
                'country_id' => 2,
                'title' => 'New Brunswick',
                'description' => 'Sample Description',
                'order' => 5,
            ],
            [
                'country_id' => 2,
                'title' => 'Nova Scotia',
                'description' => 'Sample Description',
                'order' => 6,
            ],
            [
                'country_id' => 3,
                'title' => 'Wellington',
                'description' => 'Sample Description',
                'order' => 0,
            ],
            [
                'country_id' => 3,
                'title' => 'Auckland',
                'description' => 'Sample Description',
                'order' => 2,
            ],
            [
                'country_id' => 3,
                'title' => 'New Plymounth',
                'description' => 'Sample Description',
                'order' => 3,
            ],
            [
                'country_id' => 3,
                'title' => 'Westland',
                'description' => 'Sample Description',
                'order' => 4,
            ],
            [
                'country_id' => 3,
                'title' => 'Southland',
                'description' => 'Sample Description',
                'order' => 5,
            ],
            [
                'country_id' => 3,
                'title' => 'Canterbury',
                'description' => 'Sample Description',
                'order' => 6,
            ],
        ];

        foreach ($data as $key => $value) {
            
            $model = CountryDetails::create($value);

        }

        $this->enableForeignKeys();
    }
}
