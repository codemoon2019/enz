<?php

use App\Models\Details\Details;
use Illuminate\Database\Seeder;
use HalcyonLaravel\Base\Database\Traits\SeederHelper;

/**
 * Class DetailsTableSeeder
 */
class DetailsTableSeeder extends Seeder
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

        $page = $this->modelPageSeeder(new Details);

        $this->seedToDomainables($page, 'main');

        $data = [
            [
                'title' => 'Home Tagline',
                'description' => '<h2>Welcome to ENZ Education Consultancy Services</h2>
                
                <p>With the outstanding services and assistance being extended to our clients, ENZ Education Consultancy Services is extremely honored and a proud recipient of two major awards: The National Customers&rsquo; Choice Annual Awards for Business Excellence 2016</p>',
            ],
            [
                'title' => 'Location',
                'description' => 'HEAD OFFICE: G/F Natividad Bldg. II, Ablan Ave. cor. P. Lazaro St. Brgy. 4, Laoag City, Ilocos Norte',
            ],
            [
                'title' => 'Contact',
                'description' => '+63 77 600 4200',
            ],
            [
                'title' => 'Vision',
                'description' => '"To become one of the leading educational consultancy firm in the country in providing high-quality service and assistance to genuine international students."',
            ],
            [
                'title' => 'Mission',
                'description' => 'Our mission is to provide meaningful accomplishments of International Students aiming for an Australian Education and Qualifications through a goal-driven and service-oriented assistance"',
            ],
        ];

        foreach ($data as $key => $value) {

            $model = Details::create($value);


        
        }

        $this->enableForeignKeys();
    }
}
