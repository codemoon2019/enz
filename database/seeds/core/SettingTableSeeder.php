<?php

use App\Models\Core\Domain\Domain;
use App\Models\Core\Setting;
use HalcyonLaravel\Base\Database\Traits\SeederHelper;
use Illuminate\Database\Seeder;

/**
 * Class SettingTableSeeder.
 */
class SettingTableSeeder extends Seeder
{
    use DisableForeignKeys;
    use SeederHelper;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->disableForeignKeys();
        foreach (Domain::all() as $domain) {
            foreach (array_merge($this->site($domain), $this->contact($domain), $this->social($domain)) as $setting) {
                $model = Setting::create($setting);

                if ($model->type == 'file') {
                    $this->seederUploader($model, $model->value, null, $model->collection_name);
                    switch ($model->machine_name) {
                        case 'site-logo':
                            $model->value = $model->getFirstMediaUrl($model->collection_name, 'default');
                            break;
                        case 'site-fav-icon':
                            $model->value = $model->getFirstMediaUrl($model->collection_name);
                            break;
                    }
                    $model->save();
                }
                $model->domains()->save($domain);
            }
        }

        $this->_seedPermission();

        $this->enableForeignKeys();
    }

    private function site(Domain $domain): array
    {
//        $favIconFIle = '';
//        $logo = '';
//        $description = '';
//        switch ($domain->machine_name) {
//            case 'main':
        $logo = 'logo.png';
        $favIconFIle = 'favicon';
        $description = $domain->title . ' Description';
//                break;
//        }
        return [
            [
                'group' => 'site',
                'label' => 'Title',
                'machine_name' => 'site-title',
                'value' => $domain->title,
                'rules' => 'required|string|max:255',
            ],
            [
                'group' => 'site',
                'label' => 'Description',
                'machine_name' => 'site-description',
                'value' => $description,
                'input_type' => 'textarea',
                'rules' => 'required|string|max:255',
            ],
            [
                'group' => 'site',
                'label' => 'Author',
                'machine_name' => 'site-author',
                'value' => $domain->title . ' Author',
                'rules' => 'required|string|max:255',
            ],
            [
                'group' => 'site',
                'label' => 'Logo',
                'machine_name' => 'site-logo',
                'value' => $logo,
                'type' => 'file',
                'collection_name' => 'site-logo',
                'input_type' => 'file',
                'rules' => 'required',
                'mime_type' => json_encode([
                    'image/jpg',
                    'image/jpeg',
                    'image/gif',
                    'image/png',
                    'image/bmp',
                    'image/svg+xml',
                ]),
            ],
            [
                'group' => 'site',
                'label' => 'Fav Icon',
                'machine_name' => 'site-fav-icon',
                'value' => "{$favIconFIle}.ico",
                'type' => 'file',
                'collection_name' => 'site-favicon',
                'input_type' => 'file',
                'rules' => 'required',
                'mime_type' => json_encode([
                    'image/x-icon',
                    // 'image/jpg',
                    // 'image/jpeg',
                    // 'image/gif',
                    // 'image/png',
                    // 'image/bmp',
                    // 'image/svg+xml'
                ]),
            ],
        ];
    }

    private function contact(Domain $domain): array
    {
        return [
            [
                'group' => 'contact',
                'label' => 'Map',
                'machine_name' => 'contact-map',
                'value' => 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d123174.84002998348!2d120.4793147!3d15.2561348!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xdb3d9729bc9f8d06!2sNew+Clark+City!5e0!3m2!1sen!2sph!4v1550216439297',
                'input_type' => 'textarea',
                'rules' => 'required',
            ],
            [
                'group' => 'contact',
                'label' => 'Receiving E-mail Address',
                'machine_name' => 'contact-receiver',
                'value' => 'halcyondev1@gmail.com',
                'input_type' => 'email',
                'rules' => 'required',
            ],
            [
                'group' => 'contact',
                'label' => 'Sending E-mail Address',
                'machine_name' => 'contact-sender',
                'value' => 'halcyondev1@gmail.com',
                'input_type' => 'email',
                'rules' => 'required',
            ],
            [
                'group' => 'contact',
                'label' => 'Receiving Name',
                'machine_name' => 'contact-receiver-name',
                'value' => $domain->title . ' Administrator',
                'rules' => 'required',
            ],
            [
                'group' => 'contact',
                'label' => 'Receiving Message',
                'machine_name' => 'contact-receiver-message',
                'value' => 'We have received your message and would like to thank you for writing to us. If your inquiry is urgent, please use the telephone number listed below to talk to one of our staff members. Otherwise, we will reply by email as soon as possible. Talk to you soon,',
                'input_type' => 'textarea',
                'rules' => 'required',
            ],
        ];
    }

    private function social(Domain $domain): array
    {
        return [
            [
                'group' => 'social',
                'label' => 'Facebook Link',
                'machine_name' => 'social-fb',
                'value' => 'https://facebook.com',
                'rules' => 'required|url',
            ],
            [
                'group' => 'social',
                'label' => 'Instagram Link',
                'machine_name' => 'social-instagram',
                'value' => 'https://instagram.com',
                'rules' => 'required|url',
            ],
        ];
    }

    private function _seedPermission()
    {
        $roleModel = resolve(config('permission.models.role'));
        // Create Permissions
        $permissions = config('access.users.default_permissions');
        unset($permissions['back_end_view_permission']);
        $system = $roleModel::first();
        $admin = $roleModel::skip(1)->first();
        foreach ($permissions as $p => $permission) {
            resolve(config('permission.models.permission'))::create(['name' => $permission]);
            // ALWAYS GIVE ADMIN ROLE ALL PERMISSIONS
            $system->givePermissionTo($permission);

            if ($permission == config('access.users.default_permissions.media_permission')) {
                continue;
            }
            // Assign Permissions to other Roles
            $admin->givePermissionTo($permission);
        }
    }
}
