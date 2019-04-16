<?php

use App\Models\Why\Why;
use Illuminate\Database\Seeder;
use HalcyonLaravel\Base\Database\Traits\SeederHelper;
use Illuminate\Http\UploadedFile;

/**
 * Class WhyTableSeeder
 */
class WhyTableSeeder extends Seeder
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

        $page = $this->modelPageSeeder(new Why);

        $this->seedToDomainables($page, 'main');

        $data = [
            [
                'title' => 'Linkages',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique animi voluptas aspernatur illo quasi exercitationem.',
                'status' => 'enable',
            ],
            [
                'title' => 'Awards',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique animi voluptas aspernatur illo quasi exercitationem.',
                'status' => 'enable',
            ],
            [
                'title' => 'Expertise',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique animi voluptas aspernatur illo quasi exercitationem.',
                'status' => 'enable',

            ],
            [
                'title' => 'Customer Service',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique animi voluptas aspernatur illo quasi exercitationem.',
                'status' => 'enable',

            ],
            [
                'title' => 'Payment Scheme',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique animi voluptas aspernatur illo quasi exercitationem.',
                'status' => 'enable',

            ],
        ];        

        foreach ($data as $key => $value) {

            $model = Why::create($value);

            $model->metaTag()->create([
                'title' => $model->title,
                'description' => $model->title,
                'keywords' => str_replace('-', ',', $model->slug),
            ]);

        }

        $filePath = base_path('public/uploads/why');
        
        $files = scandir($filePath);

        foreach (array_slice($files, 2) as $key => $value) {

            $filePathInner = $filePath . '/' . $value;

            if (is_dir($filePathInner)) {

                $this->findDir($filePathInner);

            }else{

                unlink($filePathInner);

            }
        }

        $this->enableForeignKeys();
    }
}
