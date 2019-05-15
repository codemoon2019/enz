<?php

use App\Models\Institution\Institution;
use Illuminate\Database\Seeder;
use HalcyonLaravel\Base\Database\Traits\SeederHelper;

/**
 * Class InstitutionTableSeeder
 */
class InstitutionTableSeeder extends Seeder
{
    use DisableForeignKeys;
    use SeederHelper;
    use DomainSeederHelper;

    /**
     * Run the database seeds.
     *
     * @throws \ReflectionException
     */
    public function run()
    {
        $this->disableForeignKeys();

        $page = $this->modelPageSeeder(new Institution);

        $this->seedToDomainables($page, 'main');

        $data = [
            ['title' => 'ACFE', 'country_id' => 1 , 'order' => 0, 'status' => 'enable'],
            ['title' => 'Australian IAS', 'country_id' => 1 , 'order' => 1, 'status' => 'enable'],
            ['title' => 'CCEB', 'country_id' => 1 , 'order' => 2, 'status' => 'enable'],
            ['title' => 'CQU', 'country_id' => 1 , 'order' => 3, 'status' => 'enable'],
            ['title' => 'Danford College', 'country_id' => 1 , 'order' => 4, 'status' => 'enable'],
            ['title' => 'Elite Training IA', 'country_id' => 1 , 'order' => 5, 'status' => 'enable'],
        ];

        foreach($data as $key => $value){

            Institution::create($value);            

        }

        $this->enableForeignKeys();
    }
}
