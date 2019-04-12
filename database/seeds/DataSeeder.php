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

    		['name' => 'Villas', 'url' => '#', 'order' => 0],

            ['name' => 'The Site', 'url' => '/the-site', 'order' => 0, 'parent_id' => 1],

    		['name' => 'Musella', 'url' => '/properties/musella', 'order' => 1, 'parent_id' => 1],

    		['name' => 'Lilac', 'url' => '/properties/lilac', 'order' => 2, 'parent_id' => 1],

    		['name' => 'Choose Your Villa', 'url' => '/choose-your-villa', 'order' => 3, 'parent_id' => 1],
    		
    		['name' => 'Investment', 'url' => '/investments', 'order' => 1],
    		
    		['name' => 'Location', 'url' => '/locations', 'order' => 2],
    		
    		['name' => 'Lifestyle and Amenities', 'url' => '/amenities', 'order' => 3],
    		
    		['name' => 'Blog and News', 'url' => '/news', 'order' => 4],

    		['name' => 'Contact Us', 'url' => '/contact-us', 'order' => 5],

    	];

    	foreach ($menus as $key => $menu) {
    		
    		Menu::find(1)->nodes()->save(new MenuNode($menu));
    	
    	}

    }
}
