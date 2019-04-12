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

        // End

        $model = Page::create([
            'title'       => 'Contact Us',
            'description' => '<h2>Thank you for your interest in Riviera Villas</h2><p>Riviera Villas is a quality project of Wyndhamm Realty Development Corp. We provide quality homes built with passion and at par with international standards. Wyndhamm’s projects range from single detached homes – Master Homes at the Riviera and serviced residences.
            </p>',
            'template'    => 'default'
        ]);

        $model->domains()->sync([1]);

    }
}
