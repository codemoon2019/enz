<?php

use App\Models\Core\Domain\Domain;
use HalcyonLaravel\Base\Database\Traits\SeederHelper;
use Illuminate\Database\Seeder;

class DomainTableSeeder extends Seeder
{
    use DisableForeignKeys, SeederHelper;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->disableForeignKeys();

        $mainDomain = factory(Domain::class)->create([
            'title' => config('app.name'),
            'machine_name' => 'main',
            'domain' => parse_url(config('app.url'))['host'],
        ]);

        $this->seederUploader($mainDomain, "logo.png", null, 'loader_image');

//        $envName = function ($name, $tl) {
//
//            if (app()->environment('local', 'staging')) {
//                $suffix = env('DEV_URL_SUFFIX', 'test');
//                return "$name.$suffix";
//            }
//            return "$name.$tl";
//        };

        /* foreach (range(1, 3) as $index) {
            $domain = factory(Domain::class)->create([
                'title' => 'Test ' . $index,
                'machine_name' => 'test-' . $index,
                'domain' => "test-{$index}-" . parse_url(config('app.url'))['host'],
            ]);
            $this->seederUploader($domain, "logo.png", null, 'loader_image');
        } */

        $this->seederPermission(new Domain);

        $this->enableForeignKeys();
    }

}
