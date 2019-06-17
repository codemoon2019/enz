<?php

use App\Models\Application\Application;
use Illuminate\Database\Seeder;
use HalcyonLaravel\Base\Database\Traits\SeederHelper;

/**
 * Class ApplicationTableSeeder
 */
class ApplicationTableSeeder extends Seeder
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

        $page = $this->modelPageSeeder(new Application);
        $this->seedToDomainables($page, 'main');

        // foreach (factory(Application::class, 20)->create() as $model) {
        //     $model->metaTag()->create([
        //         'title' => $model->title,
        //         'description' => $model->title,
        //         'keywords' => str_replace('-', ',', $model->slug),
        //     ]);
        // }

        $this->enableForeignKeys();
    }
}
