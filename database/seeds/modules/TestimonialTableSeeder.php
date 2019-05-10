<?php

use App\Models\Testimonial\Testimonial;
use Illuminate\Database\Seeder;
use HalcyonLaravel\Base\Database\Traits\SeederHelper;

/**
 * Class TestimonialTableSeeder
 */
class TestimonialTableSeeder extends Seeder
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

        $page = $this->modelPageSeeder(new Testimonial);

        $page->update([
            'description' => '<p>ENZ Education Consultancy Services was established last October 2015. Initially founded in Manila, but due to the need to respond to different inquiries from different regions, the company realized to extend its services to other parts of the country. Our main office is now situated in the heart of Laoag City.</p>
                    <p>Due to our perseverance and sensitivity to the needs of future students, we were able to connect with vast network of educational institutions and carefully screen genuine students who wish to Study,Work and Live in Australia</p>'
        ]);


        $this->seedToDomainables($page, 'main');

        $data = [
            [
                'title' => 'Kaxandra Nazarene Dela Cuesta',
                'position' => 'Food and Beverage Attendant',
                'address' => 'Sarrat, Ilocos Norte',
                'description' => 'I just want to extend my sincerest gratitude to ENZ Education Consultancy Services for their outstanding service. Your expertise has been invaluable in the process of starting my Australian dream into reality. Thank you for the support, patience, guidance and encouragements you provided. I can say that my application was a roller coaster because of my changing decisions. However, I never thought that my visa will be granted in just one day without presenting any supporting documents for my show money. I’m still at awe thinking back the whole procedure and having my visa granted right after I got my Confirmation of Enrollment from Queensford College. You have been more than just a consultant to me, since you also made your services available even after office hours which shows your very accomodating nature. Thus, I certainly would recommend ENZ Education Consultancy Services to anyone desiring to go to Australia. I thank and doff my hat because of your excellent service!!!',
                'status' => 'enable',
            ],
            [
                'title' => 'Marchi Agustin',
                'position' => 'Registered Nurse',
                'address' => 'Laoag City, Ilocos Norte',
                'description' => 'ENZ is an education agency who helps their client on the application of student visa in Australia. ENZ was recommended by a friend, I went (with a friend) to their office and sir jhimuel was the one who talked to us and discussed briefly about Australia and applying for a student visa. It wasn’t easy for me to take a student visa at first but sir jhimuel motivated and help me so with the guidance of our Almighty God, I got my visa within 11 days! Nothing is imposible with ENZ! I will surely recommend ENZ to my friends and relatives. Again thank you ENZ for making my dream came true. Hoping for more clients and visa grantees to come! God bless and more power! ',
                'status' => 'enable',
            ],
        ];        

        foreach ($data as $key => $value) {

            $model = Testimonial::create($value);

            $this->seederUploader($model, 'testimonial/person.jpg', null, 'featured');

            $model->metaTag()->create([
                'title' => $model->title,
                'description' => $model->title,
                'keywords' => str_replace('-', ',', $model->slug),
            ]);

        }

        $this->enableForeignKeys();
    }
}
