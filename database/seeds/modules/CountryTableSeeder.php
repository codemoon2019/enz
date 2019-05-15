<?php

use App\Models\Country\Country;
use Illuminate\Database\Seeder;
use HalcyonLaravel\Base\Database\Traits\SeederHelper;

/**
 * Class CountryTableSeeder
 */
class CountryTableSeeder extends Seeder
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

        $page = $this->modelPageSeeder(new Country);

        $this->seedToDomainables($page, 'main');

        $data = [
            [
                'title' => 'Australia',
                'description' => '<p>Did you know Australia has the third highest number of international students in the world behind only the United Kingdom and the United States despite having a population of only 23 million? This isn\'t surprising when you consider Australia has seven of the top 100 universities in the world! In fact, with over 22,000 courses across 1,100 institutions, Australia sits above the likes of Germany, the Netherlands and Japan, ranking eighth in the Universitas 2012 U21 Ranking of National Higher Education Systems.</p>',
                'color' => 'teal',
            ],
            [
                'title' => 'Canada',
                'description' => '<p>Did you know Australia has the third highest number of international students in the world behind only the United Kingdom and the United States despite having a population of only 23 million? This isn\'t surprising when you consider Australia has seven of the top 100 universities in the world! In fact, with over 22,000 courses across 1,100 institutions, Australia sits above the likes of Germany, the Netherlands and Japan, ranking eighth in the Universitas 2012 U21 Ranking of National Higher Education Systems.</p>',
                'color' => 'red',
            ],
            [
                'title' => 'New Zealand',
                'description' => '<p>Did you know Australia has the third highest number of international students in the world behind only the United Kingdom and the United States despite having a population of only 23 million? This isn\'t surprising when you consider Australia has seven of the top 100 universities in the world! In fact, with over 22,000 courses across 1,100 institutions, Australia sits above the likes of Germany, the Netherlands and Japan, ranking eighth in the Universitas 2012 U21 Ranking of National Higher Education Systems.</p>',
                'color' => 'orange',
            ],
        ];

        $images = [
            ['slide1.jpg', 'slide2.jpg', 'slide3.jpg'],
            ['slide1.png', 'slide2.jpg', 'slide3.jpg'],
            ['slide1.jpg', 'slide2.jpg'],
        ];

        foreach ($data as $key => $value) {

            $model = Country::create($value);

            $this->seederUploader($model, 'country/featured/' . $model->slug . '.jpg', null, 'featured');

            foreach ($images[$key] as $image) {

                $this->seederUploader($model, 'country/slider/' . $model->slug . '/' . $image, null, 'slider');

            }
            
            $model->metaTag()->create([
                'title' => $model->title,
                'description' => $model->title,
                'keywords' => str_replace('-', ',', $model->slug),
            ]);
        
        }

        $this->enableForeignKeys();
    }
}
