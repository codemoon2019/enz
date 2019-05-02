<?php

use App\Models\Event\Event;
use Illuminate\Database\Seeder;
use HalcyonLaravel\Base\Database\Traits\SeederHelper;

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

        $this->seedToDomainables($page, 'main');

        $data = [
            [
                'title' => 'Community Services',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique animi voluptas aspernatur illo quasi exercitationem.',
                'status' => 'enable',
                'event_date' => now(),
            ],
            [
                'title' => 'Business , Management & Marketing',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique animi voluptas aspernatur illo quasi exercitationem.',
                'status' => 'enable',
                'event_date' => now(),
            ],
            [
                'title' => 'Hospitality and Cookery',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique animi voluptas aspernatur illo quasi exercitationem.',
                'status' => 'enable',
                'event_date' => now(),

            ],
            [
                'title' => 'Free Career Orientation in Candon City!',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique animi voluptas aspernatur illo quasi exercitationem.',
                'status' => 'enable',
                'event_date' => now(),

            ],
            [
                'title' => 'Initial Registration for Overseas Nurses',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique animi voluptas aspernatur illo quasi exercitationem.',
                'status' => 'enable',
                'event_date' => now(),

            ],
            [
                'title' => 'Free Event: Biggest Education Expo in Ilocos Norte!',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique animi voluptas aspernatur illo quasi exercitationem.',
                'status' => 'enable',
                'event_date' => now(),

            ],
        ];        

        foreach ($data as $key => $value) {

            $model = Event::create($value);

            // $this->seederUploader($model, 'event/featured.jpg', null, 'featured');

            $model->metaTag()->create([
                'title' => $model->title,
                'description' => $model->title,
                'keywords' => str_replace('-', ',', $model->slug),
            ]);

        }

        $this->enableForeignKeys();
    }
}
