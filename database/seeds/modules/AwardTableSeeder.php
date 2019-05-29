<?php

use App\Models\Award\Award;
use Illuminate\Database\Seeder;
use HalcyonLaravel\Base\Database\Traits\SeederHelper;

/**
 * Class AwardTableSeeder
 */
class AwardTableSeeder extends Seeder
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

        $page = $this->modelPageSeeder(new Award);

        $page->update(['description' => '<p>With the outstanding service and assistance being extended to our clients, ENZ Education Consultancy Services is extremely honored and a proud recipient of three major awards:</p>']);


        $this->seedToDomainables($page, 'main');

        $data = [

            [
                'title' => 'Award 1',
                'description' => 'National Customers’ Choice Annual Awards for Business Excellence 2016 – Most Outstanding and Quality Education Consultancy Service Provider from the NATIONAL CUSTOMERS CHOICES AWARDS COUNCIL (Insert Logo Award)'
            ],

            [
                'title' => 'Award 2',
                'description' => 'Gold Seal of Quality 2016 Awardee – Best Education Consultancy Service Provider from the TOP CHOICE CONSUMERS AWARD Council and the NATIONAL CONSUMERS AFFAIRS FOUNDATION'
            ],

            [
                'title' => 'Award 3',
                'description' => 'Netizen\'s Best Choice Awardee – Netizen\'s Best Choice Education Consultancy Provider from the Netizen\'s Choice Magazine & Publishing INC.'
            ],

        ];

        foreach ($data as $key => $value) {

            $model = Award::create($value);

            $this->seederUploader($model, 'award/award'.($key+1).'.png', null, 'featured');

        }

        // foreach (factory(Award::class, 20)->create() as $model) {
        //     $model->metaTag()->create([
        //         'title' => $model->title,
        //         'description' => $model->title,
        //         'keywords' => str_replace('-', ',', $model->slug),
        //     ]);
        // }

        $this->enableForeignKeys();
    }
}
