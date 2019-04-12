<?php

use App\Models\MoreLife\MoreLife;
use Illuminate\Database\Seeder;
use HalcyonLaravel\Base\Database\Traits\SeederHelper;

/**
 * Class MoreLifeTableSeeder
 */
class MoreLifeTableSeeder extends Seeder
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

        $page = $this->modelPageSeeder(new MoreLife);
        $this->seedToDomainables($page, 'main');

        // $data = [
        //     [
        //         'title'       => 'Residential Cluster',
        //         'description' => 'A vibrant community that is accessible to the city, schools and so much more.',
        //         'order'       => 0,
        //     ],
        //     [
        //         'title'       => 'Corporate Headquarters',
        //         'description' => 'Enjoy a stress-free working environment here in City di Mare.',
        //         'order'       => 1,
        //     ],
        //     [
        //         'title'       => 'Leisure and Retail',
        //         'description' => 'A trendsetter\'s paradise set within a number of exceptional parks.',
        //         'order'       => 2,
        //     ]
        // ];

        $data = [
            [
                'title'       => 'Sanremo Oasis',
                'description' => 'A vibrant community that is accessible to the city, schools and so much more.',
                'order'       => 0,
            ],
            [
                'title'       => 'Amalfi',
                'description' => 'A trendsetter\'s paradise set within a number of exceptional parks.',
                'order'       => 1,
            ]
        ];

        foreach ($data as $key => $value) {

            $model = MoreLife::create($value);

            $model->metaTag()->create([
                'title' => $model->title,
                'description' => $model->title,
                'keywords' => str_replace('-', ',', $model->slug),
            ]);
        }

        $this->enableForeignKeys();
    }
}
