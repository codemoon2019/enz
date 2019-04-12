<?php

use App\Models\Auth\User;
use App\Models\News\News;
use HalcyonLaravel\Base\Database\Traits\SeederHelper;
use Illuminate\Database\Seeder;

/**
 * Class NewsPermissionTableSeeder
 */
class NewsPermissionTableSeeder extends Seeder
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

        $this->seederPermission(new News);

        $this->enableForeignKeys();
    }

}
