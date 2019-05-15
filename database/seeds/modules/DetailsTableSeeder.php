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
            [
                'title' => 'Gallery',
                'description' => '',
            ],

            [
                'title'       => 'Our Company',
                'description' => '<p>ENZ Education Consultancy Services was established last October 2015. Initially founded in Manila, but due to the need to respond to different inquiries from different regions, the company realized to extend its services to other parts of the country. Our main office is now situated in the heart of Laoag City.</p>
                <p>Due to our perseverance and sensitivity to the needs of future students, we were able to connect with vast network of educational institutions and carefully screen genuine students who wish to Study,Work and Live in Australia</p>
                <p>With sound connections to different Australian Educational Providers, our company has sent numbers of students and now they are able to achieve their dreams and aspirations. It is in our mandate to offer the best services and essentially deliver the quality assistance that our clients need.</p>',
            ],

            [
                'title' => 'Registration',
                'description' => '<ul>
                <li>We are duly registered at the Department of Trade and Industry with License No. 03756207 with a validity until 05 October 2020.</li>
                <li>We are duly registered at the Bereau of Internal Revenue with Certificate of Registration No. 4RC0000989406 with Tax Identification Number 400-257-392-000</li>
                <li>We are duly registered at the City Government of Laoag to operate the business with Permit No. 2017-0000654.</li>
                </ul>',
            ],

            [
                'title' => 'Professional Membership',
                'description' => '<ul>
                <li>Professional International Education Resources - License No. L440&nbsp;<strong>(http://eatc.com/qualified_agents)</strong></li>
                </ul>',
            ],
        ];

        foreach ($data as $key => $value) {

            $model = Details::create($value);

            if ($value['title'] == 'Gallery') {

                $images = ['samplegallery1.jpg', 'samplegallery2.jpg', 'samplegallery3.jpg'];

                foreach ($images as $image) {
                    
                    $this->seederUploader($model, 'gallery/' . $image, null, 'images');

                }

            }

        }

        $this->enableForeignKeys();
    }
}
