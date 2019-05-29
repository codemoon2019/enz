<?php

use App\Models\News\News;
use Illuminate\Database\Seeder;
use HalcyonLaravel\Base\Database\Traits\SeederHelper;

use App\Models\Content\Content;
use App\Models\TemplateProperty;


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

        $page->update(['description' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit explicabo consequatur maxime amet laborum! Magnam neque sapiente in quibusdam excepturi fuga tenetur quam harum magni, tempore aut dolorum dolores dolore reiciendis, tempora laborum esse. Officiis consequatur exercitationem voluptas quisquam nisi ea a soluta sit, ex, incidunt delectus rerum obcaecati veritatis!</p>']);

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

            $content = $model->contents()->save(new Content([
                'title'    => 'image', 
                'template' => 'image', 
                'body'     => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis, quaerat inventore atque iusto ex minima molestias quisquam incidunt, hic blanditiis, corrupti, mollitia sint facilis esse accusamus. Aspernatur ratione sit ut voluptatibus eligendi tempora enim obcaecati consequatur explicabo adipisci nemo similique itaque sapiente repudiandae dignissimos, ducimus quasi. Eos aliquam, neque culpa.</p>',
                'order'    => 1
            ]));

            $this->seederUploader($content, 'event/featured.jpg', null, 'images');

            $content->property()->save(new TemplateProperty(['image_align' => 'center']));

            $model->metaTag()->create([

                'title' => $model->title,
                
                'description' => $model->title,
                
                'keywords' => str_replace('-', ',', $model->slug),
            
            ]);
        }

        $this->enableForeignKeys();
    }
}
