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

        $model->domains()->sync([1]);

        
        $model = Page::create([
            'title'       => 'Our Company',
            'description' => '',
            'template'    => 'default'
        ]);

        $model->domains()->sync([1]);

        
        $model = Page::create([
            'title'       => 'Vision and Mission',
            'description' => '',
            'template'    => 'default'
        ]);

        $model->domains()->sync([1]);

    }
}
