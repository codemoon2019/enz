<?php

use App\Models\Gallery\Gallery;
use Illuminate\Database\Seeder;
use HalcyonLaravel\Base\Database\Traits\SeederHelper;

/**
 * Class GalleryTableSeeder
 */
class GalleryTableSeeder extends Seeder
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

        $page = $this->modelPageSeeder(new Gallery);

        $this->seedToDomainables($page, 'main');

        $data = [
            ['title' => 'Australian Expo May 13 2017'],
            ['title' => 'Info Sessions'],
            ['title' => 'Students in Australia'],
            ['title' => 'Visa Grantees'],
        ];


        $images = [
            [
                'samplegallery1.jpg',
                'australian_expo_9.jpg',
                'australian_expo_8.jpg',
                'australian_expo_7.jpg',
            ],
            [
                '1.jpg',
                '2.jpg',
                '3.jpg',
                '4.jpg',
            ],
            [
                '1.jpg',
                '2.jpg',
                '3.jpg',
                '4.jpg',
            ],
            [
                '1 - CEDRIC LEE CORDERO 04OCT2017.jpg',
                '1 - MAE HARMONY LUTAP 13OCT2017.jpg',
                '1 - PATRICK JOHN PABUSTAN 13OCT2017.jpg',
                '2 - ANA LORRAINE BRUNO 18SEPT2017.jpg',
            ],

        ];

        foreach ($data as $key => $value) {

            $model = Gallery::create($value);

            foreach ($images[$key] as $value1) {
                
                $this->seederUploader($model, 'gallery/gallery'.($key+1).'/' . $value1, null, 'featured');

            }
        
        }

        $this->enableForeignKeys();
    }
}
