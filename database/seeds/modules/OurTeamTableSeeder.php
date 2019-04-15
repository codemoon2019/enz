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
        ];        

        foreach ($data as $key => $value) {

            $model = OurTeam::create($value);

            $this->seederUploader($model, 'our-team/person.png', null, 'featured');

            $model->metaTag()->create([
                'title' => $model->title,
                'description' => $model->title,
                'keywords' => str_replace('-', ',', $model->slug),
            ]);

        }

        $this->enableForeignKeys();
    }
}
