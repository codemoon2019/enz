<?php
/**
 * Created by PhpStorm.
 * User: Lloric Mayuga Garcia <lloricode@gmail.com>
 * Date: 1/14/19
 * Time: 9:14 AM
 */

use Maatwebsite\Excel\Concerns\ToCollection;

trait CsvImportSeeder
{
    /**
     * @param \Maatwebsite\Excel\Concerns\ToCollection $classImporter
     * @param string                                   $csvFile
     * @param bool                                     $isOverrideMemoryLimit
     */
    public function importCsv(ToCollection $classImporter, string $csvFile, bool $isOverrideMemoryLimit = false)
    {
        if (app()->environment() == 'testing') {
            // skip on unit testing
            return;
        }

        $defaultLimit = null;
        if ($isOverrideMemoryLimit) {
            $defaultLimit = ini_get('memory_limit');
            print_r("default memory_limit : [$defaultLimit]\n");
            ini_set('memory_limit', '2000M');
            print_r('temporary memory_limit : [' . ini_get('memory_limit') . "]\n");
        }

        Excel::import($classImporter, $csvFile . '.csv', 'csv');

        if ($isOverrideMemoryLimit) {
            ini_set('memory_limit', $defaultLimit);
            print_r('restore memory_limit to : [' . ini_get('memory_limit') . "]\n");
        }
    }
}