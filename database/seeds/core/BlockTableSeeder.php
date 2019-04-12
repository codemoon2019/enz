<?php

use App\Models\Auth\User;
use App\Models\Core\Block\Block;
use HalcyonLaravel\Base\Database\Traits\SeederHelper;
use Illuminate\Database\Seeder;

class BlockTableSeeder extends Seeder
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

        // $user = User::skip(1)->first();
        // $model = Block::create([
        //     'title' => 'BUILDING ECOTECHTURE',
        //     'machine_name' => 'main-block',
        //     'content' => '<p>We build with nature in mind. At Filinvest GAIA, every innovation is paired with eco-friendly decisions. Hi-tech concepts with nature-first designs. Thriving businesses with abundant greenery. Through this, we help build a sustainable future for us and the next generations.</p>',
        //     'status' => 'enable',
        //     'type' => null,
        //     'template' => 'main-block'
        // ]);
        // $this->seederUploader($model, 'core/block/building_ecotechture.png', null, $model->template);
        // History::created($model, $user);
        // $model = Block::create([
        //     'title' => 'Masterplan',
        //     'machine_name' => 'masterplan',
        //     'content' => '<p>Filinvest GAIA is a 288-hectare masterplanned community located within New Clark City. It is envisioned to be a LEED-certified city that creates a future-ready and sustainable setting that is nested in a vibrant live-work-play-learn environment.</p><p>With its four pillars—world center, multi-gen metropolis, eco-efficient capital, and strategic base—it aims to set the benchmark for future planning in the Philippines.</p>',
        //     'status' => 'enable',
        //     'type' => null,
        //     'template' => 'masterplan'
        // ]);
        // $this->seederUploader($model, 'core/block/masterplan.png', null, $model->template);
        // History::created($model, $user);

        // $model = Block::create([
        //     'title' => 'Location',
        //     'machine_name' => 'location',
        //     'content' => '<p>Filinvest GAIA is located in Capas, Tarlac, within the 9,450-hectare development of New Clark City. It is situated strategically besides the National Government Administrative Center and the New Clark City Sports Complex.</p><p>The development can be accessed through NLEx-SCTEx (Dolores Exit)-MacArthur Highway. It is approximately an hour away from the Clark International Airport (30km).</p>',
        //     'status' => 'enable',
        //     'type' => null,
        //     'template' => 'location'
        // ]);
        // $this->seederUploader($model, 'core/block/map.jpg', null, $model->template);
        // History::created($model, $user);

        // $model = Block::create([
        //     'title' => 'Joint Venture',
        //     'machine_name' => 'joint-venture',
        //     'content' => '<p>Filinvest GAIA is a joint venture project between Filinvest Land, Inc. and Bases Conversion and Development Authority. The agreement was signed in 2016 under a 50-year development period.</p>',
        //     'status' => 'enable',
        //     'type' => null,
        //     'template' => 'joint-venture'
        // ]);
        // $this->seederUploader($model, 'core/block/joint_venture.png', null, $model->template);
        //     $content = $model->contents()->create([
        //         'title' => null,
        //         'body' => null,
        //         'order' => 0,
        //         'link' => 'https://filinvest.com/',
        //     ]);
        //     $this->seederUploader($content, 'core/block/joint_venture/filinvest.png', null, $model->template);
        //     $content = $model->contents()->create([
        //         'title' => null,
        //         'body' => null,
        //         'order' => 1,
        //         'link' => 'https://bcda.gov.ph/',
        //     ]);
        //     $this->seederUploader($content, 'core/block/joint_venture/BCDA.jpg', null, $model->template);
        //     $content = $model->contents()->create([
        //         'title' => null,
        //         'body' => null,
        //         'order' => 2,
        //     ]);
        //     $this->seederUploader($content, 'core/block/joint_venture/clark.jpg', null, $model->template);
        // History::created($model, $user);

        // $model = Block::create([
        //     'title' => 'Gallery',
        //     'machine_name' => 'gallery',
        //     'content' => null,
        //     'status' => 'enable',
        //     'type' => null,
        //     'template' => 'gallery'
        // ]);
        
        //     $content = $model->contents()->create([
        //         'title' => null,
        //         'body' => null,
        //         'order' => 0,
        //     ]);
        //     $this->seederUploader($content, 'core/block/gallery/image1.jpg', null, $model->template);
        //     $content = $model->contents()->create([
        //         'title' => null,
        //         'body' => null,
        //         'order' => 1,
        //     ]);
        //     $this->seederUploader($content, 'core/block/gallery/image2.jpg', null, $model->template);
        //     $content = $model->contents()->create([
        //         'title' => null,
        //         'body' => null,
        //         'order' => 2,
        //     ]);
        //     $this->seederUploader($content, 'core/block/gallery/image3.jpg', null, $model->template);
        //     $content = $model->contents()->create([
        //         'title' => null,
        //         'body' => null,
        //         'order' => 3,
        //     ]);
        //     $this->seederUploader($content, 'core/block/gallery/image4.jpg', null, $model->template);
        //     $content = $model->contents()->create([
        //         'title' => null,
        //         'body' => null,
        //         'order' => 4,
        //     ]);
        //     $this->seederUploader($content, 'core/block/gallery/image5.jpg', null, $model->template);

        // History::created($model, $user);

        // $model = Block::create([
        //     'title' => 'New Clark City',
        //     'machine_name' => 'new-clark-city',
        //     'content' => '<p>New Clark City is located in Central Luzon and has global connectivity through local and international routes - including NLEX, SCTEX, Clark International Airport, and Subic International Freeport. SUrrounded by scenic mountain views, NCC is poised to be an eco-friendly, world-class metropolis.</p><p>It has a smart-planned ecosystem that combines innovation with sustainability. Here, we will build mixed-use districts — industrial, residential, educational, and commercial - where everyone can live, work, play, and learn as one.</p>',
        //     'status' => 'enable',
        //     'type' => null,
        //     'template' => 'new-clark-city'
        // ]);
        // $this->seederUploader($model, 'core/block/new_clark.jpg', null, $model->template);
        // History::created($model, $user);

        // $model = Block::create([
        //     'title' => 'About New Clark City',
        //     'machine_name' => 'about-new-clark-city',
        //     'content' => '<p>A 288-hectare smart townscape, Filinvest GAIA inspires innovation and commerce in one central, strategic location inside New Clark City.</p>',
        //     'status' => 'enable',
        //     'type' => null,
        //     'template' => 'about-new-clark-city'
        // ]);
        // $this->seederUploader($model, 'core/block/about_new_clark.png', null, $model->template);
        // History::created($model, $user);

        // $model = Block::create([
        //     'title' => 'Industries',
        //     'machine_name' => 'industries',
        //     'content' => null,
        //     'status' => 'enable',
        //     'type' => null,
        //     'template' => 'industries'
        // ]);
        
        //     $content = $model->contents()->create([
        //         'title' => 'Industrial',
        //         'body' => null,
        //         'order' => 0,
        //     ]);
        //     $this->seederUploader($content, 'core/block/industries/industrial.jpg', null, $model->template);
        //     $content = $model->contents()->create([
        //         'title' => 'Residential',
        //         'body' => null,
        //         'order' => 1,
        //     ]);
        //     $this->seederUploader($content, 'core/block/industries/residential.jpg', null, $model->template);
        //     $content = $model->contents()->create([
        //         'title' => 'Research & Design',
        //         'body' => null,
        //         'order' => 2,
        //     ]);
        //     $this->seederUploader($content, 'core/block/industries/researchdesign.jpg', null, $model->template);
        //     $content = $model->contents()->create([
        //         'title' => 'Education',
        //         'body' => null,
        //         'order' => 3,
        //     ]);
        //     $this->seederUploader($content, 'core/block/industries/education.jpg', null, $model->template);
        //     $content = $model->contents()->create([
        //         'title' => 'Lifestyle Mixed-Use',
        //         'body' => null,
        //         'order' => 4,
        //     ]);
        //     $this->seederUploader($content, 'core/block/industries/lifestylemixeduse.jpg', null, $model->template);
        //     $content = $model->contents()->create([
        //         'title' => 'Commercial',
        //         'body' => null,
        //         'order' => 5,
        //     ]);
        //     $this->seederUploader($content, 'core/block/industries/commercial.jpg', null, $model->template);

        // History::created($model, $user);


        // $model = Block::create([
        //     'title' => 'The Four Pillars',
        //     'machine_name' => 'four-pillars',
        //     'content' => null,
        //     'status' => 'enable',
        //     'type' => null,
        //     'template' => 'four-pillars'
        // ]);
        //     $content = $model->contents()->create([
        //         'title' => 'World Center',
        //         'body' => '<p>Grow globally in this world-class economic hub in Asia. Build your business and partners with local and international investors while being eco-focused. Because when nature thrives, the future does too.</p>',
        //         'order' => 0,
        //     ]);
        //     $content = $model->contents()->create([
        //         'title' => 'Multi-Gen Metrolpolis',
        //         'body' => '<p>Live in a diverse center fit for anyone\'s lifestyle - with residential spaces for families, business centers for professionals, schools for the young, and retirement communities for the young at heart.</p>',
        //         'order' => 1,
        //     ]);
        //     $content = $model->contents()->create([
        //         'title' => 'Eco-Efficient Capital',
        //         'body' => '<p>Filinvest GAIA is a sustainable urban headquarters that is eco-friendly by design - with facilities such as smart grid, green superblocks, bike lanes, and even e-transport systems</p>',
        //         'order' => 2,
        //     ]);
        //     $content = $model->contents()->create([
        //         'title' => 'Strategic Base',
        //         'body' => '<p>Situated in a well-planned central location, Filinvest GAIA is conveniently accessible through local infrastructure (NLEX, SCTEX, MacArthur Highway, Manila-Clark Rail, Clark-Subic Rail) and International ports (Clark International Airport, Subic International Freeport).</p>',
        //         'order' => 3,
        //     ]);
        // History::created($model, $user);

        // History::created($model, $user);

        $this->seederPermission(new Block);

        $this->enableForeignKeys();
    }

}
