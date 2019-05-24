<?php

use App\Models\Auth\User;
use App\Models\Gallery\Gallery;
use HalcyonLaravel\Base\Database\Traits\SeederHelper;
use Illuminate\Database\Seeder;

/**
 * Class GalleryPermissionTableSeeder
 */
class GalleryPermissionTableSeeder extends Seeder
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

        $this->seederPermission(new Gallery);

        $this->enableForeignKeys();
    }

}
