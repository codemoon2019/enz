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
            'description' => '<p>ENZ Education Consultancy Services was established last October 2015. Initially founded in Manila, but due to the need to respond to different inquiries from different regions, the company realized to extend its services to other parts of the country. Our main office is now situated in the heart of Laoag City.</p>
                    <p>Due to our perseverance and sensitivity to the needs of future students, we were able to connect with vast network of educational institutions and carefully screen genuine students who wish to Study,Work and Live in Australia</p>',
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
            'description' => '<p>ENZ Education Consultancy Services was established last October 2015. Initially founded in Manila, but due to the need to respond to different inquiries from different regions, the company realized to extend its services to other parts of the country. Our main office is now situated in the heart of Laoag City.</p>
                <p>Due to our perseverance and sensitivity to the needs of future students, we were able to connect with vast network of educational institutions and carefully screen genuine students who wish to Study,Work and Live in Australia</p>',
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

        $model->metaTag()->create([
            'title' => 'Become Our Client',
            'description' => 'Become Our Client',
            'keywords' => 'Become Our Client',
        ]);

        $model->domains()->sync([1]);

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

    }
}
