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
                'title' => 'Why Australia',
                'description' => 'Sample Description',
                'order' => 0,
            ],
            [
                'country_id' => 1,
                'title' => 'Entry Requirements',
                'description' => 'Sample Description',
                'order' => 1,
            ],
            [
                'country_id' => 1,
                'title' => 'Cost of Living',
                'description' => 'Sample Description',
                'order' => 2,
            ],
            [
                'country_id' => 1,
                'title' => 'Working while you study',
                'description' => 'Sample Description',
                'order' => 3,
            ],
            [
                'country_id' => 1,
                'title' => 'Education Facts',
                'description' => 'Sample Description',
                'order' => 4,
            ],
            [
                'country_id' => 1,
                'title' => 'Study Visa Options',
                'description' => 'Sample Description',
                'order' => 5,
            ],
            [
                'country_id' => 2,
                'title' => 'Why New Zealand',
                'description' => 'Sample Description',
                'order' => 0,
            ],
            [
                'country_id' => 2,
                'title' => 'Entry Requirements',
                'description' => 'Sample Description',
                'order' => 1,
            ],
            [
                'country_id' => 2,
                'title' => 'Cost of Living',
                'description' => 'Sample Description',
                'order' => 2,
            ],
            [
                'country_id' => 2,
                'title' => 'Working while you study',
                'description' => 'Sample Description',
                'order' => 3,
            ],
            [
                'country_id' => 2,
                'title' => 'Education Facts',
                'description' => 'Sample Description',
                'order' => 4,
            ],
            [
                'country_id' => 2,
                'title' => 'Study Visa Options',
                'description' => 'Sample Description',
                'order' => 5,
            ],
            [
                'country_id' => 3,
                'title' => 'Why Canada',
                'description' => 'Sample Description',
                'order' => 0,
            ],
            [
                'country_id' => 3,
                'title' => 'Entry Requirements',
                'description' => 'Sample Description',
                'order' => 1,
            ],
            [
                'country_id' => 3,
                'title' => 'Cost of Living',
                'description' => 'Sample Description',
                'order' => 2,
            ],
            [
                'country_id' => 3,
                'title' => 'Working while you study',
                'description' => 'Sample Description',
                'order' => 3,
            ],
            [
                'country_id' => 3,
                'title' => 'Education Facts',
                'description' => 'Sample Description',
                'order' => 4,
            ],
            [
                'country_id' => 3,
                'title' => 'Study Visa Options',
                'description' => 'Sample Description',
                'order' => 5,
            ],
        ];

        foreach ($data as $key => $value) {
            
            $model = CountryDetails::create($value);

        }

        $this->enableForeignKeys();
    }
}
