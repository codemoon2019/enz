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

            foreach ($variable as $key => $value) {

                $model = Gallery::create($value);
                
                $this->seederUploader($model, 'gallery/samplegallery1.jpg', null, 'featured');
            
            }

        $this->enableForeignKeys();
    }
}
