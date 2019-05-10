<?php

use App\Models\CoreValue\CoreValue;
use Illuminate\Database\Seeder;
use HalcyonLaravel\Base\Database\Traits\SeederHelper;

/**
 * Class CoreValueTableSeeder
 */
class CoreValueTableSeeder extends Seeder
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

        $page = $this->modelPageSeeder(new CoreValue);

        $this->seedToDomainables($page, 'main');

        $data = [
            [
                'title' => 'Integrity',
                'description' => 'We do the right thing',
                'color' => 'red',
                'order' => 0
            ],
            [
                'title' => 'Teamwork',
                'description' => 'We Work Together',
                'color' => 'yellow',
                'order' => 1
            ],
            [
                'title' => 'Honesty',
                'description' => 'We keep our Word',
                'color' => 'green',
                'order' => 2
            ],
        ];

        foreach ($data as $key => $value) {

            $model = CoreValue::create($value);

            $this->seederUploader($model, 'core_values/'. $model->slug .'.png', null, 'featured');


        }

        $this->enableForeignKeys();
    }
}
