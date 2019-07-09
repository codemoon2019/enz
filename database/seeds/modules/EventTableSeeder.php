<?php

use App\Models\Event\Event;
use Illuminate\Database\Seeder;
use HalcyonLaravel\Base\Database\Traits\SeederHelper;

use App\Models\Content\Content;
use App\Models\TemplateProperty;


/**
 * Class EventTableSeeder
 */
class EventTableSeeder extends Seeder
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

        $page = $this->modelPageSeeder(new Event);

        $page->update(['description' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit explicabo consequatur maxime amet laborum! Magnam neque sapiente in quibusdam excepturi fuga tenetur quam harum magni, tempore aut dolorum dolores dolore reiciendis, tempora laborum esse. Officiis consequatur exercitationem voluptas quisquam nisi ea a soluta sit, ex, incidunt delectus rerum obcaecati veritatis!</p>']);

        $this->seedToDomainables($page, 'main');

        $data = [
            [
                'title' => 'Community Services',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique animi voluptas aspernatur illo quasi exercitationem.',
                'status' => 'enable',
                'event_date' => now(),
                'event_time' => '1:00 PM - 4:00 PM',
                'event_location' => 'Sample Location',
            ],
            [
                'title' => 'Business , Management & Marketing',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique animi voluptas aspernatur illo quasi exercitationem.',
                'status' => 'enable',
                'event_date' => now(),
                'event_time' => '1:00 PM - 4:00 PM',
                'event_location' => 'Sample Location',
            ],
            [
                'title' => 'Hospitality and Cookery',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique animi voluptas aspernatur illo quasi exercitationem.',
                'status' => 'enable',
                'event_date' => now(),
                'event_time' => '1:00 PM - 4:00 PM',
                'event_location' => 'Sample Location',

            ],
            [
                'title' => 'Free Career Orientation in Candon City!',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique animi voluptas aspernatur illo quasi exercitationem.',
                'status' => 'enable',
                'event_date' => now(),
                'event_time' => '1:00 PM - 4:00 PM',
                'event_location' => 'Sample Location',

            ],
            [
                'title' => 'Initial Registration for Overseas Nurses',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique animi voluptas aspernatur illo quasi exercitationem.',
                'status' => 'enable',
                'event_date' => now(),
                'event_time' => '1:00 PM - 4:00 PM',
                'event_location' => 'Sample Location',

            ],
            [
                'title' => 'Free Event: Biggest Education Expo in Ilocos Norte!',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique animi voluptas aspernatur illo quasi exercitationem.',
                'status' => 'enable',
                'event_date' => now(),
                'event_time' => '1:00 PM - 4:00 PM',
                'event_location' => 'Sample Location',

            ],
        ];        

        foreach ($data as $key => $value) {

            $model = Event::create($value);

            $this->seederUploader($model, 'event/featured.jpg', null, 'featured');

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
