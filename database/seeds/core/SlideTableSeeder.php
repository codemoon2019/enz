<?php

use App\Models\Auth\User;
use App\Models\Core\Domain\Domain;
use App\Models\Core\Slide\Slide;
use HalcyonLaravel\Base\Database\Traits\SeederHelper;
use Illuminate\Database\Seeder;

class SlideTableSeeder extends Seeder
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

        $user = User::skip(1)->first();

        $homeSlide = factory(Slide::class)->create([
            'title' => 'Home Banner',
            'machine_name' => 'home-banner',
            'collection_name' => 'banner',
            'template' => 'banner',
            'status' => 'enable',
        ]);

        $sliders = ['banner.jpg'];

        // foreach ($sliders as $key => $slider) {
            
        //     $this->seederUploader($homeSlide, 'banner/' . $slider, null, 'banner');

        // }

        // foreach ($this->imagesData($homeSlide->title) as $imageData) {
        //     $this->seederUploader($homeSlide, "core/slider/{$imageData['file']}", $imageData['custom'],
        //         $homeSlide->collection_name);
        // }

        // History::created($homeSlide, $user);

        $mainDomain = Domain::where('machine_name', 'main')->first();

        $homeSlide->domains()->save($mainDomain);


        // $model = factory(Slide::class)->create([
        //     'title' => 'Sports Club Amenities',
        //     'machine_name' => 'sport-club-amenities',
        //     'collection_name' => 'banner',
        //     'template' => 'banner',
        //     'status' => 'enable',
        // ]);

        // $sliders = ['golf.jpg', 'golf.jpg'];

        // foreach ($sliders as $key => $slider) {
            
        //     $this->seederUploader($model, 'page/the-site/' . $slider, null, 'banner');

        // }

        $this->seederPermission(new Slide);

        $this->enableForeignKeys();
    }

    private function imagesData($sliderTitle, int $maxFileCount = 4): array
    {
        $return = [];
        foreach (range(1, $maxFileCount) as $index) {
            $return[] = [
                'file' => "slider{$index}.jpg",
                'custom' => [
                    'title' => "$sliderTitle Slide Title $index",
                    'description' => "$sliderTitle long description sample $index",
                ]
            ];
        }
        return $return;
    }
}
