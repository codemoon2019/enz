<?php

use App\Models\News\News;
use Illuminate\Database\Seeder;
use HalcyonLaravel\Base\Database\Traits\SeederHelper;

/**
 * Class NewsTableSeeder
 */
class NewsTableSeeder extends Seeder
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

        $page = $this->modelPageSeeder(new News);

        $this->seedToDomainables($page, 'main');

        $data = [
            [
                'title' => 'Sample News 1',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique animi voluptas aspernatur illo quasi exercitationem.',
                'status' => 'enable',
                'published_at' => now(),
            ],
            [
                'title' => 'Sample News 2',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique animi voluptas aspernatur illo quasi exercitationem.',
                'status' => 'enable',
                'published_at' => now(),
            ],
            [
                'title' => 'Sample News 3',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique animi voluptas aspernatur illo quasi exercitationem.',
                'status' => 'enable',
                'published_at' => now(),
                'featured' => 'enable',

            ],
            [
                'title' => 'Sample News 4',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique animi voluptas aspernatur illo quasi exercitationem.',
                'status' => 'enable',
                'published_at' => now(),
                'featured' => 'enable',

            ],
            [
                'title' => 'Sample News 5',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique animi voluptas aspernatur illo quasi exercitationem.',
                'status' => 'enable',
                'published_at' => now(),
                'featured' => 'enable',

            ],
        ];


        foreach ($data as $key => $value) {

            $model = News::create($value);

            $this->seederUploader($model, 'news/featured.jpg', null, 'featured');

            $model->metaTag()->create([

                'title' => $model->title,
                
                'description' => $model->title,
                
                'keywords' => str_replace('-', ',', $model->slug),
            
            ]);
        }

        $this->enableForeignKeys();
    }
}
