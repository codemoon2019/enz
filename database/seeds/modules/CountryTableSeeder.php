<?php

use App\Models\Country\Country;
use Illuminate\Database\Seeder;
use HalcyonLaravel\Base\Database\Traits\SeederHelper;

/**
 * Class CountryTableSeeder
 */
class CountryTableSeeder extends Seeder
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

        $page = $this->modelPageSeeder(new Country);

        $this->seedToDomainables($page, 'main');

        $data = [
            [
                'title' => 'Australia',
                'description' => '',
            ],
            [
                'title' => 'Canada',
                'description' => '',
            ],
            [
                'title' => 'New Zealand',
                'description' => '',
            ],
        ];

        foreach ($data as $key => $value) {

            $model = Country::create($value);
            
            $model->metaTag()->create([
                'title' => $model->title,
                'description' => $model->title,
                'keywords' => str_replace('-', ',', $model->slug),
            ]);
        
        }

        $this->enableForeignKeys();
    }
}
