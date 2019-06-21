<?php

use App\Models\Auth\User;
use App\Models\Core\Page\Page;
use HalcyonLaravel\Base\Database\Traits\SeederHelper;
use Illuminate\Database\Seeder;
use App\Models\Content\Content;
use App\Models\TemplateProperty;

class PageTableSeeder extends Seeder
{
    use DisableForeignKeys;
    use SeederHelper;
    use CsvImportSeeder;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->disableForeignKeys();

        $this->_seedPages();
        
        $this->seederPermission(new Page);

        $this->enableForeignKeys();
    }


    public function _seedPages()
    {
        $user = User::skip(1)->first();

        $model = Page::create([
            'title'       => 'Contact Us',
            'description' => '',
            'template'    => 'default'
        ]);

        $model->metaTag()->create([
            'title' => 'Contact Us',
            'description' => 'Contact Us',
            'keywords' => 'Contact Us',
        ]);

        $model->domains()->sync([1]);

        $model = Page::create([
            'title'       => 'Company',
            'description' => '<p>ENZ Education Consultancy Services is a consultancy firm specializing in Student Visa assistance. We can help you with the best study options that will lead you to a pathway to working visa and permanent residency in Australia, New Zealand or Canada.</p>
                    <p>We offer assistance from consultation, enrollment and all the way up to submission of your visa applications and even after visa issuance, we are here to guide you all throughout your journey!</p>',
            'template'    => 'default'
        ]);

        $model->metaTag()->create([
            'title' => 'Company',
            'description' => 'Company',
            'keywords' => 'Company',
        ]);

        $model->domains()->sync([1]);

        $model = Page::create([
            'title'       => 'Tourist Visa',
            'description' => '<p>Is Australia, New Zealand or Canada in your bucket list to visit this year? But before you head off to these beautiful countries, you need to have a visitor’s visa. </p><p>ENZ is not only offering student visa, but we also cater tourist visa processing! </p><p>To know more how you can tick off these places from your list, fill up the sign up form below!</p>',
            'template'    => 'default'
        ]);

        $model->metaTag()->create([
            'title' => 'Tourist Visa',
            'description' => 'Tourist Visa',
            'keywords' => 'Tourist Visa',
        ]);

        $model->domains()->sync([1]);

        // $model = Page::create([
        //     'title'       => 'Become Our Client',
        //     'description' => '<p>ENZ Education Consultancy Services was established last October 2015. Initially founded in Manila, but due to the need to respond to different inquiries from different regions, the company realized to extend its services to other parts of the country. Our main office is now situated in the heart of Laoag City.</p>
        //         <p>Due to our perseverance and sensitivity to the needs of future students, we were able to connect with vast network of educational institutions and carefully screen genuine students who wish to Study,Work and Live in Australia</p>',
        //     'template'    => 'default'
        // ]);

        // $model->metaTag()->create([
        //     'title' => 'Become Our Client',
        //     'description' => 'Become Our Client',
        //     'keywords' => 'Become Our Client',
        // ]);

        // $model->domains()->sync([1]);







        $model = Page::create([
            'title'       => 'Be Part of Our Team',
            'description' => '<p>ENZ Education Consultancy Services was established last October 2015. Initially founded in Manila, but due to the need to respond to different inquiries from different regions, the company realized to extend its services to other parts of the country. Our main office is now situated in the heart of Laoag City.</p>
                <p>Due to our perseverance and sensitivity to the needs of future students, we were able to connect with vast network of educational institutions and carefully screen genuine students who wish to Study,Work and Live in Australia</p>',
            'template'    => 'default'
        ]);

        $model->metaTag()->create([
            'title' => 'Be Part of Our Team',
            'description' => 'Be Part of Our Team',
            'keywords' => 'Be Part of Our Team',
        ]);

        $model->domains()->sync([1]);








        $model = Page::create([
            'title'       => 'Expertise',
            'description' => '<p>ENZ Education Consultancy Services was established last October 2015. Initially founded in Manila, but due to the need to respond to different inquiries from different regions, the company realized to extend its services to other parts of the country. Our main office is now situated in the heart of Laoag City.</p>
                <p>Due to our perseverance and sensitivity to the needs of future students, we were able to connect with vast network of educational institutions and carefully screen genuine students who wish to Study,Work and Live in Australia</p>',
            'template'    => 'default'
        ]);

        $model->metaTag()->create([
            'title' => 'Expertise',
            'description' => 'Expertise',
            'keywords' => 'Expertise',
        ]);

        $model->domains()->sync([1]);








        $model = Page::create([
            'title'       => 'Customer Service',
            'description' => '<p>ENZ Education Consultancy Services was established last October 2015. Initially founded in Manila, but due to the need to respond to different inquiries from different regions, the company realized to extend its services to other parts of the country. Our main office is now situated in the heart of Laoag City.</p>
                <p>Due to our perseverance and sensitivity to the needs of future students, we were able to connect with vast network of educational institutions and carefully screen genuine students who wish to Study,Work and Live in Australia</p>',
            'template'    => 'default'
        ]);

        $model->metaTag()->create([
            'title' => 'Customer Service',
            'description' => 'Customer Service',
            'keywords' => 'Customer Service',
        ]);

        $model->domains()->sync([1]);






        $model = Page::create([
            'title'       => 'Payment Scheme',
            'description' => '<p>ENZ Education Consultancy Services was established last October 2015. Initially founded in Manila, but due to the need to respond to different inquiries from different regions, the company realized to extend its services to other parts of the country. Our main office is now situated in the heart of Laoag City.</p>
                <p>Due to our perseverance and sensitivity to the needs of future students, we were able to connect with vast network of educational institutions and carefully screen genuine students who wish to Study,Work and Live in Australia</p>',
            'template'    => 'default'
        ]);

        $model->metaTag()->create([
            'title' => 'Payment Scheme',
            'description' => 'Payment Scheme',
            'keywords' => 'Payment Scheme',
        ]);

        $model->domains()->sync([1]);





        $model = Page::create([
            'title'       => 'Read More',
            'description' => '
    <h1>Welcome to ENZ Education Consultancy Services</h1>
        <p>ENZ Education Consultancy Services, in considering its young age in the business arena, has grown in stature and reputation through its excellent service and high-quality assistance to Genuine International Students. Believing that consultancy services must effectively serve our hopeful and aspiring clienteles, the ENZ Education Consultancy Services with its team invests time and efforts added with the guiding core values towards an effective and goal driven services.</p><p>&nbsp;</p>
    <h2>At ENZ Education Consultancy Services,</h2>
    <ul>
        <li class="basic">we care for your dreams.</li>
        <li class="basic">we value your time.</li>
        <li class="basic">we assist you with compassion.</li>
        <li class="basic">we do what is right.</li>
        <li class="basic">we work with dignity.</li>
        <li class="basic">we keep our word.</li>
    </ul>
        <p>Because with us,<br />
            Your Education, Your Future is Our Motivation.<br />
            Talk to us. Be our client. Let\'s start pursuing your Study Abroad Dream!</p>',
            'template'    => 'default'
        ]);

        $model->metaTag()->create([
            'title' => 'Read More',
            'description' => 'Read More',
            'keywords' => 'Read More',
        ]);

        $model->domains()->sync([1]);

    }
}
