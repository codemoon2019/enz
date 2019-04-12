<?php

use App\Models\Auth\User;
use App\Models\Core\Domain\Domain;
use App\Models\Core\Menu\Menu;
use App\Models\Core\Menu\MenuNode;
use App\Models\Core\Page\Page;
use HalcyonLaravel\Base\Database\Traits\SeederHelper;
use Illuminate\Database\Seeder;

class MenuTableSeeder extends Seeder
{
    use DisableForeignKeys;
    use SeederHelper;

    private $testTemp;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->disableForeignKeys();


        $user = User::skip(1)->first();
        $mainMenu = Menu::create(
            [
                'name' => 'Main menu',
                'machine_name' => 'main-menu',
                'depth' => 3,
                'status' => 'enable',
                'description' => 'This is the main navigation of the website',
                'template' => 'main-navbar'
            ]
        );
        History::created($mainMenu, $user);

        $this->testTemp = [];
        foreach (Domain::where('machine_name', 'main')->get() as $domain) {
            $mainMenu->domains()->save($domain);
            $this->_seedMenus($domain, $mainMenu);
        }
        foreach (Domain::where('machine_name', '!=', 'main')->get() as $domain) {
            $mainMenu->domains()->save($domain);
            $this->_seedMenus($domain);
        }

        $this->seederPermission(new Menu);
        $this->seederPermission(new MenuNode);

        $this->enableForeignKeys();
    }

    public function _seedMenus(Domain $domain, Menu $mainMenu, Menu $footer = null)
    {
        $append = function (array $lang) use ($domain) {
            $r = [];
            foreach ($lang as $k => $l) {
                $r[$k] = $l . " [{$domain->machine_name}]";
            }
            return $r;
        };
        if ($domain->machine_name == 'main') {
            $this->mainDomain($domain, $mainMenu, $footer);
        }
    }

    private function mainDomain(Domain $domain, Menu $mainMenu, Menu $footer = null)
    {
        $order = 1;
        /* $this->createPage($domain, [
            'title' => 'About Gaia',
            'content' => '<p>testss.</p>',
            'status' => 'enable',
            'template' => 'default'
        ], $mainMenu, $order); */
        // $this->createPage($domain, Page::where('slug', 'masterplan')->first(), $mainMenu,  $order);
    }


    private function createPage(Domain $domain, $pageData, Menu $mainMenu, int &$order)
    {
        if (is_array($pageData)) {
            if ($pageData['title'] == 'About Gaia') {
                MenuNode::create([
                    'name' => $pageData['title'],
                    'menu_id' => $mainMenu->id,
                    'order' => $order,
                    'url' => add_scheme_host($domain->domain),
                ])->domains()->save($domain);
                return;
            }
        }

        $user = User::skip(1)->first();
        $page = is_array($pageData) ? (Page::create($pageData)) : $pageData;
        $page->domains()->save($domain);
        $this->testTemp[] = $page->id;
        History::created($page, $user);

        $page->menuable()->create([
            'name' => title_case($page->title),
            'menu_id' => $mainMenu->id,
            'order' => $order,
        ])->domains()->save($domain);
        $order++;
    }
}
