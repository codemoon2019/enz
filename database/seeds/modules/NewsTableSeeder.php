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
                'title' => 'The best jobs in Australia for 2018',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique animi voluptas aspernatur illo quasi exercitationem.',
                'status' => 'enable',
                'published_at' => now(),
            ],
            [
                'title' => 'Nursing in Australia vs. UK',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique animi voluptas aspernatur illo quasi exercitationem.',
                'status' => 'enable',
                'published_at' => now(),
            ],
            [
                'title' => 'Why Study in Australia?',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique animi voluptas aspernatur illo quasi exercitationem.',
                'status' => 'enable',
                'published_at' => now(),
                'featured' => 'enable',

            ],
            [
                'title' => '3 Australian Cities in Top 10 Most Livable Cities in the World',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique animi voluptas aspernatur illo quasi exercitationem.',
                'status' => 'enable',
                'published_at' => now(),
                'featured' => 'enable',

            ],
        ];


        foreach ($data as $key => $value) {

            $model = News::create($value);

            $this->seederUploader($model, 'news/news'.($key+1).'.jpg', null, 'featured');

            $model->metaTag()->create([

                'title' => $model->title,
                
                'description' => $model->title,
                
                'keywords' => str_replace('-', ',', $model->slug),
            
            ]);
        }

        $this->enableForeignKeys();
    }
}
