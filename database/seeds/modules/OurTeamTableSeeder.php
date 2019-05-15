<?php

use App\Models\OurTeam\OurTeam;
use Illuminate\Database\Seeder;
use HalcyonLaravel\Base\Database\Traits\SeederHelper;

/**
 * Class OurTeamTableSeeder
 */
class OurTeamTableSeeder extends Seeder
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

        $page = $this->modelPageSeeder(new OurTeam);

        
        $page->update([
            'description' => '<p>ENZ Education Consultancy Services was established last October 2015. Initially founded in Manila, but due to the need to respond to different inquiries from different regions, the company realized to extend its services to other parts of the country. Our main office is now situated in the heart of Laoag City.</p>
                    <p>Due to our perseverance and sensitivity to the needs of future students, we were able to connect with vast network of educational institutions and carefully screen genuine students who wish to Study,Work and Live in Australia</p>'
        ]);

        $this->seedToDomainables($page, 'main');

        $data = [
            [
                'title' => 'Zoren Johnmar M. Singson',
                'position' => 'General Manager / Senior Consultant',
                'email' => 'z.singson@enzconsultancy.com',
                'contact' => '(02) 689 7132',
                'status' => 'enable',
            ],
            [
                'title' => 'Edelyn Garcia',
                'position' => 'Operations Head',
                'email' => 'edelyn@enzconsultancy.com',
                'contact' => '077 600 4200',
                'status' => 'enable',
            ],
            [
                'title' => 'Trizzia Ellaine Singson',
                'position' => 'Marketing Manager / Sr. Consultant',
                'email' => 'trizzia@enzconsultancy.com',
                'contact' => '077 600 4200',
                'status' => 'enable',
            ],
            [
                'title' => 'Marie Stella Gaspar',
                'position' => 'International Relations Officer',
                'email' => 'stella@enzconsultancy.com',
                'contact' => '077 600 4200',
                'status' => 'enable',
            ],
            [
                'title' => 'Jhonas Romero Bermus',
                'position' => 'Social Media & Website Administrator',
                'email' => 'jhonas@enzconsultancy.com',
                'contact' => '077 600 4200',
                'status' => 'enable',
            ],
            [
                'title' => 'Jerlyn Mae Carreon',
                'position' => 'Social Media Analyst',
                'email' => 'jerlyn@enzconsultancy.com',
                'contact' => '077 600 4200',
                'status' => 'enable',
            ],
            [
                'title' => 'Giancarl Raguindin',
                'position' => 'Marketing Officer / Jr. Consultant',
                'email' => 'gian@enzconsultancy.com',
                'contact' => '(077) 604 5432',
                'status' => 'enable',
            ],
            [
                'title' => 'Cherylle Mae Tambio',
                'position' => 'Marketing Officer / Jr. Consultant',
                'email' => 'cherylle@enzconsultancy.com',
                'contact' => '(02) 689 7132',
                'status' => 'enable',
            ],
            [
                'title' => 'Mark Kevin Ayson',
                'position' => 'Marketing Officer / Jr. Consultant',
                'email' => 'mark@enzconsultancy.com',
                'contact' => '(077) 604 5432',
                'status' => 'enable',
            ],
            [
                'title' => 'Hannah Daryl Ruizan',
                'position' => 'Marketing Officer / Jr. Consultant',
                'email' => 'hannah@enzconsultancy.com',
                'contact' => '+63 77 604 5432',
                'status' => 'enable',
            ],
            [
                'title' => 'Jaycel Padaca',
                'position' => 'Admin Assistant',
                'email' => '',
                'contact' => '',
                'status' => 'enable',
            ],
            [
                'title' => 'Cara Dadis',
                'position' => 'Admin Assistant',
                'email' => '',
                'contact' => '',
                'status' => 'enable',
            ],
            [
                'title' => 'Sheree Monique Malapit',
                'position' => 'Marketing Assistant',
                'email' => '',
                'contact' => '',
                'status' => 'enable',
            ],
            [
                'title' => 'Jessah Lavina Balbas',
                'position' => 'Marketing Assistant',
                'email' => '',
                'contact' => '',
                'status' => 'enable',
            ],
            [
                'title' => 'Jeizzel Parungao',
                'position' => 'Student Support Officer - Australia',
                'email' => 'parungaojeizzel@gmail.com',
                'contact' => '+61 405 050 409',
                'status' => 'enable',
            ],
            [
                'title' => 'Blessinda Balagtas',
                'position' => 'Marketing Representative - NCR',
                'email' => 'bless@enzconsultancy.com',
                'contact' => '077 600 4200',
                'status' => 'enable',
            ],
        ];        

        foreach ($data as $key => $value) {

            $model = OurTeam::create($value);

            $this->seederUploader($model, 'our-team/' . $value['title'] . '.jpg', null, 'featured');

            $model->metaTag()->create([
                'title' => $model->title,
                'description' => $model->title,
                'keywords' => str_replace('-', ',', $model->slug),
            ]);

        }

        $this->enableForeignKeys();
    }
}
