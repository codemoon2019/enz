<?php

use App\Models\Career\Career;
use Illuminate\Database\Seeder;
use HalcyonLaravel\Base\Database\Traits\SeederHelper;

/**
 * Class CareerTableSeeder
 */
class CareerTableSeeder extends Seeder
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

        $page = $this->modelPageSeeder(new Career);

        $this->seedToDomainables($page, 'main');

        $data = [
                [
                'title' => 'HR',
                'location' => 'Laoag City',
                'description' => '<ul>
                <li>College Graduate</li>
                <li>With good written and verbal communication skills</li>
                </ul>',
                'status' => 'enable',
                'order' => 0,
                ],
            [
                'title' => 'Manager',
                'location' => 'Pasig City',
                'description' => '<ul>
                <li>College Graduate</li>
                <li>With good written and verbal communication skills</li>
                </ul>',
                'status' => 'enable',
                'order' => 1,
            ],
        ];

        foreach ($data as $key => $value) {

            $model = Career::create($value);

            $model->metaTag()->create([
                'title' => $model->title,
                'description' => $model->title,
                'keywords' => str_replace('-', ',', $model->slug),
            ]);

        }

        $this->enableForeignKeys();

    }

}
