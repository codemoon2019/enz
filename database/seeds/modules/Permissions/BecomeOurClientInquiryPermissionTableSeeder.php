<?php

use App\Models\Auth\User;
use App\Models\BecomeOurClientInquiry\BecomeOurClientInquiry;
use HalcyonLaravel\Base\Database\Traits\SeederHelper;
use Illuminate\Database\Seeder;

/**
 * Class BecomeOurClientInquiryPermissionTableSeeder
 */
class BecomeOurClientInquiryPermissionTableSeeder extends Seeder
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

        $this->seederPermission(new BecomeOurClientInquiry);

        $this->enableForeignKeys();
    }

}
