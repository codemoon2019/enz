<?php

use Illuminate\Database\Seeder;

use App\Models\Core\Menu\Menu;

use App\Models\Core\Block\Block;

use App\Models\Core\Setting;

use App\Models\Content\Content;

use App\Models\Core\Menu\MenuNode;

use HalcyonLaravel\Base\Database\Traits\SeederHelper;

use App\Models\TemplateProperty;

class DataSeeder extends Seeder
{
    use SeederHelper;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// Menu Seeder

        Menu::create(
            [
                'name' => 'Footer Menu',
                'machine_name' => 'footer-menu',
                'depth' => 1,
                'status' => 'enable',
                'description' => 'This is the footer navigation of the website',
                'template' => 'main-navbar'
            ]
        );

        $menuTop = [

            ['name' => 'Home', 'url' => '/', 'order' => 0],

            ['name' => 'Services', 'url' => '/services', 'order' => 1],

                ['name' => 'Student Visa', 'url' => '/student-visa', 'order' => 0, 'parent_id' => 2],
            
                ['name' => 'Tourist Visa', 'url' => '/tourist-visa', 'order' => 1, 'parent_id' => 2],

            ['name' => 'About', 'url' => '/about', 'order' => 2],

                ['name' => 'Company', 'url' => '/company', 'order' => 0, 'parent_id' => 5],

                ['name' => 'Our Team', 'url' => '/our-teams', 'order' => 1, 'parent_id' => 5],

                ['name' => 'Linkages', 'url' => '/linkages', 'order' => 2, 'parent_id' => 5],

            ['name' => 'Courses', 'url' => '/courses', 'order' => 3],

            ['name' => 'Destinations', 'url' => '/destinations', 'order' => 4],

                ['name' => 'Australia', 'url' => '/destination/australia', 'order' => 0, 'parent_id' => 10],
            
                ['name' => 'New Zealand', 'url' => '/destination/new-zealand', 'order' => 1, 'parent_id' => 10],
            
                ['name' => 'Canada', 'url' => '/destination/canada', 'order' => 2, 'parent_id' => 10],

            ['name' => 'Apply', 'url' => '/apply', 'order' => 5],

                ['name' => 'Become Our Client', 'url' => '/become-our-client', 'order' => 0, 'parent_id' => 14],
                
                ['name' => 'Be Part of Our Team', 'url' => '/be-part-of-our-team', 'order' => 1, 'parent_id' => 14],
            
            ['name' => 'Students', 'url' => '/students', 'order' => 6],

                ['name' => 'Testimonials', 'url' => '/testimonials', 'order' => 0, 'parent_id' => 17],

                ['name' => 'Gallery', 'url' => '/gallery', 'order' => 1, 'parent_id' => 17],
            
            ['name' => 'Contact Us', 'url' => '/contact-us', 'order' => 7],

        ];

        foreach ($menuTop as $key => $menu) {
            
            Menu::find(1)->nodes()->save(new MenuNode($menu));
        
        }

        $menuFooter = [

            ['name' => 'Services', 'url' => '/student-visa', 'order' => 1],

            ['name' => 'About', 'url' => '/company', 'order' => 2],

            ['name' => 'Courses', 'url' => '/courses', 'order' => 3],

            ['name' => 'Destinations', 'url' => '/destination/australia', 'order' => 4],
            
            ['name' => 'Apply', 'url' => '/be-part-of-our-team', 'order' => 5],
            
            ['name' => 'Students', 'url' => '/testimonials', 'order' => 6],
            
        ];

        foreach ($menuFooter as $key => $menu) {
            
            Menu::find(2)->nodes()->save(new MenuNode($menu));
        
        }

        Setting::create([
            'group' => 'information',
            'label' => 'Home Banner content',
            'machine_name' => 'home-banner-content',
            'value' => '<h2>Welcome to ENZ Education Consultancy Services</h2>
            
            <p>With the outstanding services and assistance being extended to our clients, ENZ Education Consultancy Services is extremely honored and a proud recipient of two major awards: The National Customers&rsquo; Choice Annual Awards for Business Excellence 2016</p>',
            'type' => 'text',
            'input_type' => 'textarea',
            'rules' => 'required',
        ]);

        Setting::create([
            'group' => 'information',
            'label' => 'Location',
            'machine_name' => 'location',
            'value' => 'HEAD OFFICE: G/F Natividad Bldg. II, Ablan Ave. cor. P. Lazaro St. Brgy. 4, Laoag City, Ilocos Norte',
            'type' => 'text',
            'input_type' => 'text',
        ]);

        Setting::create([
            'group' => 'information',
            'label' => 'Contact Number',
            'machine_name' => 'contact-number',
            'value' => '+63 77 600 4200',
            'type' => 'text',
            'input_type' => 'text',
        ]);

        Setting::create([
            'group' => 'social',
            'label' => 'Youtube Link',
            'machine_name' => 'social-youtube',
            'value' => 'https://www.youtube.com/',
            'type' => 'text',
            'input_type' => 'text',
        ]);

        Setting::create([
            'group' => 'social',
            'label' => 'Twitter Link',
            'machine_name' => 'social-twitter',
            'value' => 'http://twitter.com/enzconsultancy',
            'type' => 'text',
            'input_type' => 'text',
        ]);

        Setting::create([
            'group' => 'social',
            'label' => 'Skype Link',
            'machine_name' => 'social-skype',
            'value' => 'https://www.skype.com',
            'type' => 'text',
            'input_type' => 'text',
        ]);

    }
}
