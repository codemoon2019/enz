<?php

use App\Models\Auth\User;
use App\Models\Subscription\Subscription;
use HalcyonLaravel\Base\Database\Traits\SeederHelper;
use Illuminate\Database\Seeder;

/**
 * Class SubscriptionPermissionTableSeeder
 */
class SubscriptionPermissionTableSeeder extends Seeder
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

        $this->seederPermission(new Subscription);

        $this->enableForeignKeys();
    }

}
