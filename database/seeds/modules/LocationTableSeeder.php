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
                'address' => 'HEAD OFFICE: G/F Natividad Bldg. II, Ablan Ave. cor. P. Lazaro St. Brgy. 4, Laoag City, Ilocos Norte', 
                'contact' => '+63 77 600 4200',
                'color' => 'green',
                'order' => 0,
            ],
            [
                'title' => 'Vigan', 
                'address' => 'HEAD OFFICE: G/F Natividad Bldg. II, Ablan Ave. cor. P. Lazaro St. Brgy. 4, Laoag City, Ilocos Norte', 
                'contact' => '+63 77 600 4200',
                'color' => 'orange',
                'order' => 1,
            ],
            [
                'title' => 'Manila', 
                'address' => 'HEAD OFFICE: G/F Natividad Bldg. II, Ablan Ave. cor. P. Lazaro St. Brgy. 4, Laoag City, Ilocos Norte', 
                'contact' => '+63 77 600 4200',
                'color' => 'red',
                'order' => 2,
            ],
            [
                'title' => 'Dumaguete', 
                'address' => 'HEAD OFFICE: G/F Natividad Bldg. II, Ablan Ave. cor. P. Lazaro St. Brgy. 4, Laoag City, Ilocos Norte', 
                'contact' => '+63 77 600 4200',
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
