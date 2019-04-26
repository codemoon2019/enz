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
                'description' => 'We have also established sound connections with our local partners for an ease assistance to our',
                'status' => 'enable',
            ],
            [
                'title' => 'Awards',
                'description' => 'With the outstanding service and assistance being extended to our clients, ENZ Education Consultancy Services is extremely honored and a proud recipient of two major awards.',
                'status' => 'enable',
            ],
            [
                'title' => 'Expertise',
                'description' => 'ENZ Education Consultancy Services is committed to provide tailored and unique services in assisting our International Students. What makes our services special is the dedication of the professional and experienced staff to assure quality results.',
                'status' => 'enable',

            ],
            [
                'title' => 'Customer Service',
                'description' => 'ENZ Education Consultancy Services gives priority in the development of the best customer service. Our staffs are trained with good communication and marketing skills. We always believe that Customer Service plays a vital role in customer retention and in account growth by developing trust with customers over problem issues.',
                'status' => 'enable',

            ],
            [
                'title' => 'Payment Scheme',
                'description' => 'Different to other firms and agencies, ENZ Education Consultancy Services has its own system of payment. We prefer PAY-AS-YOU-GO to ensure transparency and clearness of financial/monetary transactions.',
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
