<?php

use App\Models\ServicesOffered\ServicesOffered;
use Illuminate\Database\Seeder;
use HalcyonLaravel\Base\Database\Traits\SeederHelper;

/**
 * Class ServicesOfferedTableSeeder
 */
class ServicesOfferedTableSeeder extends Seeder
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

        $page = $this->modelPageSeeder(new ServicesOffered);
        $this->seedToDomainables($page, 'main');

        // foreach (factory(ServicesOffered::class, 20)->create() as $model) {
        //     $model->metaTag()->create([
        //         'title' => $model->title,
        //         'description' => $model->title,
        //         'keywords' => str_replace('-', ',', $model->slug),
        //     ]);
        // }

        $this->enableForeignKeys();
    }
}
