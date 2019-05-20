<?php

use App\Models\Auth\User;
use App\Models\TouristVisaInquiry\TouristVisaInquiry;
use HalcyonLaravel\Base\Database\Traits\SeederHelper;
use Illuminate\Database\Seeder;

/**
 * Class TouristVisaInquiryPermissionTableSeeder
 */
class TouristVisaInquiryPermissionTableSeeder extends Seeder
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

        $this->seederPermission(new TouristVisaInquiry);

        $this->enableForeignKeys();
    }

}
