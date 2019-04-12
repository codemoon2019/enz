<?php

namespace App\Console\Commands;

use Exception;
use File;
use Illuminate\Console\Command;

class CsvGetCommand extends Command
{

    private const CSV_URLS = [

    ];

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'csv:get';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Download csv from url\'s';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     */
    public function handle()
    {
        $this->info('Getting from urls ...');

        if (empty(self::CSV_URLS)) {
            $this->error('no url available');
            die();
        }

        $currentDateTime = now()->timezone('Asia/Manila')->format('Y-m-d-H-i-s');

        $basePath = testFilePath('csv/' . $currentDateTime . '/');
        if (!file_exists($basePath)) {
            File::makeDirectory($basePath);
        }

        $this->info("folder: $basePath");
        $this->output->progressStart(count(self::CSV_URLS));

        $header = [
            '#',
            'Url',
            'Status',
        ];
        $data = [];

        foreach (self::CSV_URLS as $no => $url) {

            $d_ = [$no + 1, $url];
            $exploded = explode('/', str_replace('https://', '', $url));
            $path = $basePath . $exploded[count($exploded) - 1];
            try {
                copy($url, $path);
                $d_[] = 'Downloaded!';
            } catch (Exception $e) {
                $d_[] = 'FAILED!';
            }

            $this->output->progressAdvance();
            $data[] = $d_;
        }

        $this->output->progressFinish();
        $this->table($header, $data);


        $this->call('csv:copy', [
            'fromPath' => $currentDateTime,
        ]);
    }
}
