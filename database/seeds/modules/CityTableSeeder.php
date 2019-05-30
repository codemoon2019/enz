<?php

use App\Models\City\City;
use Illuminate\Database\Seeder;
use HalcyonLaravel\Base\Database\Traits\SeederHelper;

/**
 * Class CityTableSeeder
 */
class CityTableSeeder extends Seeder
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

        $page = $this->modelPageSeeder(new City);

        // $this->seedToDomainables($page, 'main');


        $data = [
            [
                'country_id' => 1,
                'title' => 'Brisbane',
                'order' => 0,
                'color' => 'teal',
            ],
            [
                'country_id' => 1,
                'title' => 'Sydney',
                'order' => 1,
                'color' => 'red',
            ],
            [
                'country_id' => 1,
                'title' => 'Melbourne',
                'order' => 2,
                'color' => 'yellow',
            ],
            [
                'country_id' => 1,
                'title' => 'Perth',
                'order' => 3,
                'color' => 'orange',
            ],
            [
                'country_id' => 1,
                'title' => 'Adelaide',
                'order' => 4,
                'color' => 'teal',
            ],
            [
                'country_id' => 1,
                'title' => 'Canberra',
                'order' => 5,
                'color' => 'red',
            ],
            [
                'country_id' => 2,
                'title' => 'Montreal',
                'order' => 0,
                'color' => 'yellow',
            ],
            [
                'country_id' => 2,
                'title' => 'Toronto',
                'order' => 1,
                'color' => 'teal',
            ],
            [
                'country_id' => 2,
                'title' => 'Vancouver',
                'order' => 2,
                'color' => 'teal',
            ],
            [
                'country_id' => 2,
                'title' => 'Ottawa',
                'order' => 3,
                'color' => 'teal',
            ],
            [
                'country_id' => 2,
                'title' => 'Quebec',
                'order' => 4,
                'color' => 'teal',
            ],
            [
                'country_id' => 2,
                'title' => 'Alberta',
                'order' => 5,
                'color' => 'teal',
            ],
            [
                'country_id' => 3,
                'title' => 'Auckland',
                'order' => 0,
                'color' => 'teal',
            ],
            [
                'country_id' => 3,
                'title' => 'Christchurch',
                'order' => 1,
                'color' => 'teal',
            ],
            [
                'country_id' => 3,
                'title' => 'Wellington',
                'order' => 2,
                'color' => 'teal',
            ],
            [
                'country_id' => 3,
                'title' => 'Hamilton',
                'order' => 3,
                'color' => 'teal',
            ],
            [
                'country_id' => 3,
                'title' => 'Dunedin',
                'order' => 4,
                'color' => 'teal',
            ],
            [
                'country_id' => 3,
                'title' => 'New Plymouth',
                'order' => 5,
                'color' => 'teal',
            ],
        ];


        foreach ($data as $key => $value) {

            City::create($value);

        }

        $this->enableForeignKeys();
    }
}
