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

        foreach ($data as $key => $value) {
            
            $model = Linkages::create($value);

        }

        $this->enableForeignKeys();
    }
}
