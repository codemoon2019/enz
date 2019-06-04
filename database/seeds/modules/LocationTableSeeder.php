<?php

use App\Models\Location\Location;
use Illuminate\Database\Seeder;
use HalcyonLaravel\Base\Database\Traits\SeederHelper;

/**
 * Class LocationTableSeeder
 */
class LocationTableSeeder extends Seeder
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

        $page = $this->modelPageSeeder(new Location);

        $this->seedToDomainables($page, 'main');

        $data = [

            [
                'title' => 'Laoag', 
                'address' => 'HEAD OFFICE: 2B Natividad Bldg. II, Ablan Ave. cor. P. Lazaro St. Brgy. 4, Laoag City, Ilocos Norte 2900', 
                'contact' => '<p>Telephone: (077) 600 4200</p>
                              <p>GLOBE: 0917- 779 - 0152</p>
                              <p>SMART: 0998 - 853-2428</p>',
                'color' => 'green',
                'order' => 0,
            ],
            [
                'title' => 'Vigan', 
                'address' => 'Level 3 , Room 4 , P. Square Building, 65 Boquig Bantay, Ilocos Sur  2727', 
                'contact' => '<p>Telephone: (077) 604 - 5432</p>
                              <p>GLOBE: 0917 - 779- 0145</p>
                              <p>SMART: 0919-973-7722</p>',
                'color' => 'orange',
                'order' => 1,
            ],
            [
                'title' => 'Manila', 
                'address' => 'Level 29 Joy-Nostalg Centre, 17 ADB Avenue Ortigas Center, Pasig City 1600', 
                'contact' => '<p>Telephone: (02) 689 7132</p>
                              <p>GLOBE: 0917- 779 - 0153</p>
                              <p>SMART: 0999 - 983-9670</p>',
                'color' => 'red',
                'order' => 2,
            ],
            [
                'title' => 'Dumaguete', 
                'address' => 'Unit 303 EBT Bldg. Rizal Boulevard, Poblacion 4, Dumaguete City Negros Oriental 6200', 
                'contact' => '<p>Telephone: (035) 420 4231</p>
                              <p>GLOBE: 0917-182 -7217</p>',
                'color' => 'yellow',
                'order' => 3,
            ],

        ];

        $images = ['australia.jpg', 'canada.jpg', 'new-zealand.jpg', 'australia.jpg'];

        foreach ($data as $key => $value) {

            $model = Location::create($value);

            $this->seederUploader($model, 'location/featured/'. $images[$key] , null, 'featured');

        }

        $this->enableForeignKeys();
    }
}
