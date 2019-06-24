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
            'description' => '<p>Our firm has proven that teamwork is one of the foundations of excellence and competence.</p>
<ul>
    <li>We Do The Right Thing.</li>
    <li>We Work Together.</li>
    <li>We keep Our Word.</li>
</ul>
<p>Meet the best team ever.</p>'
        ]);

        $this->seedToDomainables($page, 'main');

        $data = [
            [
                'title' => 'Zoren Johnmar M. Singson',
                'position' => 'General Manager / Senior Consultant',
                'email' => 'z.singson@enzconsultancy.com',
                'contact' => '(02) 689 7132',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores, necessitatibus! Molestiae natus optio aspernatur minima, impedit ducimus culpa iusto tempora reiciendis maiores itaque fuga? Obcaecati vel illum amet eveniet possimus sint dicta molestias facere asperiores! Impedit cupiditate aspernatur aut totam facere maxime, quasi pariatur, quia, fuga voluptas rem voluptates? Cupiditate.',
                'status' => 'enable',
            ],
            [
                'title' => 'Edelyn Garcia',
                'position' => 'Operations Head',
                'email' => 'edelyn@enzconsultancy.com',
                'contact' => '077 600 4200',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores, necessitatibus! Molestiae natus optio aspernatur minima, impedit ducimus culpa iusto tempora reiciendis maiores itaque fuga? Obcaecati vel illum amet eveniet possimus sint dicta molestias facere asperiores! Impedit cupiditate aspernatur aut totam facere maxime, quasi pariatur, quia, fuga voluptas rem voluptates? Cupiditate.',
                'status' => 'enable',
            ],
            [
                'title' => 'Trizzia Ellaine Singson',
                'position' => 'Marketing Manager / Sr. Consultant',
                'email' => 'trizzia@enzconsultancy.com',
                'contact' => '077 600 4200',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores, necessitatibus! Molestiae natus optio aspernatur minima, impedit ducimus culpa iusto tempora reiciendis maiores itaque fuga? Obcaecati vel illum amet eveniet possimus sint dicta molestias facere asperiores! Impedit cupiditate aspernatur aut totam facere maxime, quasi pariatur, quia, fuga voluptas rem voluptates? Cupiditate.',
                'status' => 'enable',
            ],
            [
                'title' => 'Marie Stella Gaspar',
                'position' => 'International Relations Officer',
                'email' => 'stella@enzconsultancy.com',
                'contact' => '077 600 4200',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores, necessitatibus! Molestiae natus optio aspernatur minima, impedit ducimus culpa iusto tempora reiciendis maiores itaque fuga? Obcaecati vel illum amet eveniet possimus sint dicta molestias facere asperiores! Impedit cupiditate aspernatur aut totam facere maxime, quasi pariatur, quia, fuga voluptas rem voluptates? Cupiditate.',
                'status' => 'enable',
            ],
            [
                'title' => 'Jhonas Romero Bermus',
                'position' => 'Social Media & Website Administrator',
                'email' => 'jhonas@enzconsultancy.com',
                'contact' => '077 600 4200',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores, necessitatibus! Molestiae natus optio aspernatur minima, impedit ducimus culpa iusto tempora reiciendis maiores itaque fuga? Obcaecati vel illum amet eveniet possimus sint dicta molestias facere asperiores! Impedit cupiditate aspernatur aut totam facere maxime, quasi pariatur, quia, fuga voluptas rem voluptates? Cupiditate.',
                'status' => 'enable',
            ],
            [
                'title' => 'Jerlyn Mae Carreon',
                'position' => 'Social Media Analyst',
                'email' => 'jerlyn@enzconsultancy.com',
                'contact' => '077 600 4200',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores, necessitatibus! Molestiae natus optio aspernatur minima, impedit ducimus culpa iusto tempora reiciendis maiores itaque fuga? Obcaecati vel illum amet eveniet possimus sint dicta molestias facere asperiores! Impedit cupiditate aspernatur aut totam facere maxime, quasi pariatur, quia, fuga voluptas rem voluptates? Cupiditate.',
                'status' => 'enable',
            ],
            [
                'title' => 'Giancarl Raguindin',
                'position' => 'Marketing Officer / Jr. Consultant',
                'email' => 'gian@enzconsultancy.com',
                'contact' => '(077) 604 5432',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores, necessitatibus! Molestiae natus optio aspernatur minima, impedit ducimus culpa iusto tempora reiciendis maiores itaque fuga? Obcaecati vel illum amet eveniet possimus sint dicta molestias facere asperiores! Impedit cupiditate aspernatur aut totam facere maxime, quasi pariatur, quia, fuga voluptas rem voluptates? Cupiditate.',
                'status' => 'enable',
            ],
            [
                'title' => 'Cherylle Mae Tambio',
                'position' => 'Marketing Officer / Jr. Consultant',
                'email' => 'cherylle@enzconsultancy.com',
                'contact' => '(02) 689 7132',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores, necessitatibus! Molestiae natus optio aspernatur minima, impedit ducimus culpa iusto tempora reiciendis maiores itaque fuga? Obcaecati vel illum amet eveniet possimus sint dicta molestias facere asperiores! Impedit cupiditate aspernatur aut totam facere maxime, quasi pariatur, quia, fuga voluptas rem voluptates? Cupiditate.',
                'status' => 'enable',
            ],
            [
                'title' => 'Mark Kevin Ayson',
                'position' => 'Marketing Officer / Jr. Consultant',
                'email' => 'mark@enzconsultancy.com',
                'contact' => '(077) 604 5432',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores, necessitatibus! Molestiae natus optio aspernatur minima, impedit ducimus culpa iusto tempora reiciendis maiores itaque fuga? Obcaecati vel illum amet eveniet possimus sint dicta molestias facere asperiores! Impedit cupiditate aspernatur aut totam facere maxime, quasi pariatur, quia, fuga voluptas rem voluptates? Cupiditate.',
                'status' => 'enable',
            ],
            [
                'title' => 'Hannah Daryl Ruizan',
                'position' => 'Marketing Officer / Jr. Consultant',
                'email' => 'hannah@enzconsultancy.com',
                'contact' => '+63 77 604 5432',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores, necessitatibus! Molestiae natus optio aspernatur minima, impedit ducimus culpa iusto tempora reiciendis maiores itaque fuga? Obcaecati vel illum amet eveniet possimus sint dicta molestias facere asperiores! Impedit cupiditate aspernatur aut totam facere maxime, quasi pariatur, quia, fuga voluptas rem voluptates? Cupiditate.',
                'status' => 'enable',
            ],
            [
                'title' => 'Jaycel Padaca',
                'position' => 'Admin Assistant',
                'email' => '',
                'contact' => '',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores, necessitatibus! Molestiae natus optio aspernatur minima, impedit ducimus culpa iusto tempora reiciendis maiores itaque fuga? Obcaecati vel illum amet eveniet possimus sint dicta molestias facere asperiores! Impedit cupiditate aspernatur aut totam facere maxime, quasi pariatur, quia, fuga voluptas rem voluptates? Cupiditate.',
                'status' => 'enable',
            ],
            [
                'title' => 'Cara Dadis',
                'position' => 'Admin Assistant',
                'email' => '',
                'contact' => '',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores, necessitatibus! Molestiae natus optio aspernatur minima, impedit ducimus culpa iusto tempora reiciendis maiores itaque fuga? Obcaecati vel illum amet eveniet possimus sint dicta molestias facere asperiores! Impedit cupiditate aspernatur aut totam facere maxime, quasi pariatur, quia, fuga voluptas rem voluptates? Cupiditate.',
                'status' => 'enable',
            ],
            [
                'title' => 'Sheree Monique Malapit',
                'position' => 'Marketing Assistant',
                'email' => '',
                'contact' => '',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores, necessitatibus! Molestiae natus optio aspernatur minima, impedit ducimus culpa iusto tempora reiciendis maiores itaque fuga? Obcaecati vel illum amet eveniet possimus sint dicta molestias facere asperiores! Impedit cupiditate aspernatur aut totam facere maxime, quasi pariatur, quia, fuga voluptas rem voluptates? Cupiditate.',
                'status' => 'enable',
            ],
            [
                'title' => 'Jessah Lavina Balbas',
                'position' => 'Marketing Assistant',
                'email' => '',
                'contact' => '',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores, necessitatibus! Molestiae natus optio aspernatur minima, impedit ducimus culpa iusto tempora reiciendis maiores itaque fuga? Obcaecati vel illum amet eveniet possimus sint dicta molestias facere asperiores! Impedit cupiditate aspernatur aut totam facere maxime, quasi pariatur, quia, fuga voluptas rem voluptates? Cupiditate.',
                'status' => 'enable',
            ],
            [
                'title' => 'Jeizzel Parungao',
                'position' => 'Student Support Officer - Australia',
                'email' => 'parungaojeizzel@gmail.com',
                'contact' => '+61 405 050 409',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores, necessitatibus! Molestiae natus optio aspernatur minima, impedit ducimus culpa iusto tempora reiciendis maiores itaque fuga? Obcaecati vel illum amet eveniet possimus sint dicta molestias facere asperiores! Impedit cupiditate aspernatur aut totam facere maxime, quasi pariatur, quia, fuga voluptas rem voluptates? Cupiditate.',
                'status' => 'enable',
            ],
            [
                'title' => 'Blessinda Balagtas',
                'position' => 'Marketing Representative - NCR',
                'email' => 'bless@enzconsultancy.com',
                'contact' => '077 600 4200',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores, necessitatibus! Molestiae natus optio aspernatur minima, impedit ducimus culpa iusto tempora reiciendis maiores itaque fuga? Obcaecati vel illum amet eveniet possimus sint dicta molestias facere asperiores! Impedit cupiditate aspernatur aut totam facere maxime, quasi pariatur, quia, fuga voluptas rem voluptates? Cupiditate.',
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
