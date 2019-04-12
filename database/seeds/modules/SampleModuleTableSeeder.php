<?php

use App\Models\SampleModule\SampleModule;
use Illuminate\Database\Seeder;
use HalcyonLaravel\Base\Database\Traits\SeederHelper;

/**
 * Class SampleModuleTableSeeder
 */
class SampleModuleTableSeeder extends Seeder
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

        $page = $this->modelPageSeeder(new SampleModule);
        $this->seedToDomainables($page, 'main');

        foreach (factory(SampleModule::class, 5)->create() as $model) {
            $model->metaTag()->create([
                'title' => $model->title,
                'description' => $model->title,
                'keywords' => str_replace('-', ',', $model->slug),
            ]);
        }

        $this->enableForeignKeys();
    }
}
