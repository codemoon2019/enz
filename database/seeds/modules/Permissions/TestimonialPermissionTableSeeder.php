<?php

use App\Models\Auth\User;
use App\Models\Testimonial\Testimonial;
use HalcyonLaravel\Base\Database\Traits\SeederHelper;
use Illuminate\Database\Seeder;

/**
 * Class TestimonialPermissionTableSeeder
 */
class TestimonialPermissionTableSeeder extends Seeder
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

        $this->seederPermission(new Testimonial);

        $this->enableForeignKeys();
    }

}
