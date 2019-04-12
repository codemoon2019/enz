<?php

use App\Models\Auth\User;
use App\Models\Event\Event;
use HalcyonLaravel\Base\Database\Traits\SeederHelper;
use Illuminate\Database\Seeder;

/**
 * Class EventPermissionTableSeeder
 */
class EventPermissionTableSeeder extends Seeder
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

        $this->seederPermission(new Event);

        $this->enableForeignKeys();
    }

}
