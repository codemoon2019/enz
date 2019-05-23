<?php

use App\Models\BecomeOurClientInquiry\BecomeOurClientInquiry;
use Illuminate\Database\Seeder;
use HalcyonLaravel\Base\Database\Traits\SeederHelper;

/**
 * Class BecomeOurClientInquiryTableSeeder
 */
class BecomeOurClientInquiryTableSeeder extends Seeder
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

        $page = $this->modelPageSeeder(new BecomeOurClientInquiry);
        $this->seedToDomainables($page, 'main');

        // foreach (factory(BecomeOurClientInquiry::class, 20)->create() as $model) {
        //     $model->metaTag()->create([
        //         'title' => $model->title,
        //         'description' => $model->title,
        //         'keywords' => str_replace('-', ',', $model->slug),
        //     ]);
        // }

        $this->enableForeignKeys();
    }
}
