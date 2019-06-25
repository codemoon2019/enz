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
                'description' => 'ENZ is an education agency who helps their client on the application of student visa in Australia. ENZ was recommended by a friend, I went (with a friend) to their office and sir jhimuel was the one who talked to us and discussed briefly about Australia and applying for a student visa. It wasn’t easy for me to take a student visa at first but sir jhimuel motivated and help me so with the guidance of our Almighty God, I got my visa within 11 days! Nothing is imposible with ENZ! I will surely recommend ENZ to my friends and relatives. Again thank you ENZ for making my dream came true. Hoping for more clients and visa grantees to come! God bless and more power!',
                'status' => 'enable',
            ],
            [
                'title' => 'Kathleen Joy Tira',
                'position' => 'Registered Nurse',
                'address' => 'Pinili, Ilocos Norte',
                'description' => 'I want to thank the whole team of ENZ Education Consultancy Services for all the efforts and support and for making my dream into reality. Without this help, it would be difficult for me to go through all the process. I was highly impressed how ENZ staffs wonderfully guided me in preparing every step of my application. They made it so easy and relaxed for me and everything came out as success. To mam Edelyn, thankyou for the patience and kindness in giving out information and answering all my queries whenever i have something to ask and update. I am glad i made a right choice to join Enz and i would recommend this to anyone thinking of applying abroad for future education. Once again thankyou and more power ENZ! Godbless!',
                'status' => 'enable',
            ],
            [
                'title' => 'Nico Pamintuan',
                'position' => 'Private Employee, San Miguel Corp.',
                'address' => 'Porac, Pampanga',
                'description' => 'I just want to commend the agency for a job well done especially to Ms. Trizzia Singson who guided me through out the process. It took us almost a year as I was hesistant and busy with my work. Good thing she was so persisent and never gave up on me. She was so accomodating and professional. I had tons of queries and doubts through out the whole process because I was also doing my research, comparing things from google, youtube and other sites on the visa application process but she clarified all these things one by one. She was easy to communicate with and had a positive vibe that really helped me a lot. Even at times that I was really cranky due to the paper works, she was still so professional in answering all my questions. She showed confidence that I will be granted a visa even though I was doubting my application. As a matter of fact, I passed my resignation without any visa and just trusting her words that my visa will be granted on time. And it did, in just 7 days the visa was granted and here I am now booking my flight and preparing for my Australian journey. Truly, they uphold what they say “ We don’t only provide free services but we make sure you receive only the best & high-quality service” Trust them if you also want to go to Aus, they will not let you down.',
                'status' => 'enable',
            ],
        ];        

        $images = [
            'Kaxandra-Nazarene-Dela-Cuesta.jpg',
            'Marchi-Agustin.png',
            'Kathleen-Joy-Tira.png',
            'Nico-Pamintuan.png',
        ];

        foreach ($data as $key => $value) {

            $model = Testimonial::create($value);

            $this->seederUploader($model, 'testimonial/' . $images[$key], null, 'featured');

            // $model->metaTag()->create([
            //     'title' => $model->title,
            //     'description' => $model->title,
            //     'keywords' => str_replace('-', ',', $model->slug),
            // ]);

        }

        $data = [
            [
                'title' => 'Video 1',
                'youtube_key' => 'rKu016UxM4k',
                'status' => 'enable',
                'type' => 'video',
            ],
            [
                'title' => 'video 2',
                'youtube_key' => 'tUQpjPFJHuo',
                'status' => 'enable',
                'type' => 'video',
            ],
            [
                'title' => 'video 3',
                'youtube_key' => 'SIngyKB7wyU',
                'status' => 'enable',
                'type' => 'video',
            ],
            [
                'title' => 'video 4',
                'youtube_key' => '8I3rw8jqnbI',
                'status' => 'enable',
                'type' => 'video',
            ],
        ];        

        foreach ($data as $key => $value) {

            $model = Testimonial::create($value);

        }

        $this->enableForeignKeys();
    }
}
