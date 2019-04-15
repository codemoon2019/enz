<?php

use Illuminate\Database\Seeder;

use App\Models\Core\Menu\Menu;

use App\Models\Core\Block\Block;

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

    	$menus = [

    		['name' => 'Home', 'url' => '/', 'order' => 0],

            ['name' => 'Services', 'url' => '/services', 'order' => 1],

    		['name' => 'About', 'url' => '/about', 'order' => 2],

    		['name' => 'Courses', 'url' => '/courses', 'order' => 3],

    		['name' => 'Destinations', 'url' => '/destinations', 'order' => 4],
    		
    		['name' => 'Apply', 'url' => '/apply', 'order' => 5],
    		
    		['name' => 'Students', 'url' => '/students', 'order' => 6],
    		
    		['name' => 'Contact Us', 'url' => '/contact-us', 'order' => 7],

    	];

    	foreach ($menus as $key => $menu) {
    		
    		Menu::find(1)->nodes()->save(new MenuNode($menu));
    	
    	}

    }
}
