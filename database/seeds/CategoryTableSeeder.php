<?php

use App\Models\Auth\User;
use App\Models\Category\Category as Model;
use App\Models\Core\Page\Page;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CategoryTableSeeder extends Seeder
{
    use DisableForeignKeys;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->disableForeignKeys();
        $this->_permissions();
        $this->_seedCategories();
        // taxonomy(Model::class)->cache();
        $this->enableForeignKeys();
    }

    private function _permissions()
    {
        $this->user = User::skip(1)->first();
        // Create Permissions
        $permissions = app(Model::class)->permissions();
        $admin = Role::first();
        $executive = Role::skip(1)->first();
        foreach ($permissions as $p => $permission) {
            Permission::create(['name' => $permission]);
            // ALWAYS GIVE ADMIN ROLE ALL PERMISSIONS
            $admin->givePermissionTo($permission);
            // Assign Permissions to other Roles
            if (in_array($p, ['show', 'edit', 'index', 'change-status', 'hierarchy-update'])) {
                $executive->givePermissionTo($permission);
            }
        }

        /* $page = Page::create(
            [
                'title' => [
                    'en' => 'Category',
                    'es' => 'Categoría',
                ],
                'type' => 'category',
                'status' => 'enable',
                'template' => Model::VIEW_FRONTEND_PATH . '.index',
            ]
        );
        $page->metaTag()->create([
            'title' => 'Category',
            'description' => 'List of all categories',
            'keywords' => 'page,cateogry',
//            'user_id' => 2
        ]); */

    }

    public function _seedCategories()
    {
        foreach ($this->_data() as $key => $data) {
            $model = Model::create([
                'title' => $data['title'],
                'parent_id' => $data['parent_id'],
                'order' => $data['order'],
                'description' => $data['description'],
                'status' => 'enable',
            ]);
            $model->metaTag()->create([
                'title' => $model->title,
                'description' => $model->description,
                'keywords' => str_replace('-', ',', $model->slug),
            ]);
        }
    }

    private function _data()
    {
        return [
            [
                'title' => 'Frequently Asked Questions',
                'order' => 0,
                'description' => '',
                'parent_id' => null,
            ],
            [
                'title' => 'ABOUT THE TOWNSHIP',
                'order' => 0,
                'description' => '',
                'parent_id' => 1,
            ],
            [
                'title' => 'ABOUT THE DEVELOPERS',
                'order' => 0,
                'description' => '',
                'parent_id' => 1,
            ],
            [
                'title' => 'ABOUT THE INDUSTRIAL ZONE',
                'order' => 0,
                'description' => '',
                'parent_id' => 1,
            ],
        ];
    }
}
