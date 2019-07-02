<?php

use App\Models\SuccessPercentage\SuccessPercentage;
use Illuminate\Database\Seeder;
use HalcyonLaravel\Base\Database\Traits\SeederHelper;

/**
 * Class SuccessPercentageTableSeeder
 */
class SuccessPercentageTableSeeder extends Seeder
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

        // $page = $this->modelPageSeeder(new SuccessPercentage);
        // $this->seedToDomainables($page, 'main');

        $data = [
            ['title' => 'Student Visa', 'percentage' => 97.43, 'order' => 0 ],
            ['title' => 'Dependent Visa', 'percentage' => 85.7, 'order' => 1 ],
            ['title' => 'Tourist Visa', 'percentage' => 97.36, 'order' => 2 ],
            ['title' => 'Overall Success Rate', 'percentage' => 96.63, 'order' => 3 ],
        ];

        foreach ($data as $key => $value) {
            
            SuccessPercentage::create($value);

        }


        // foreach (factory(SuccessPercentage::class, 20)->create() as $model) {
        //     $model->metaTag()->create([
        //         'title' => $model->title,
        //         'description' => $model->title,
        //         'keywords' => str_replace('-', ',', $model->slug),
        //     ]);
        // }

        $this->enableForeignKeys();
    }
}
