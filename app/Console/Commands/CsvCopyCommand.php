<?php

namespace App\Console\Commands;

use File;
use Illuminate\Console\Command;

class CsvCopyCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'csv:copy {fromPath}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Copy csv folder to storage csv directory';

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
        $destinationPath = storage_path('app/csv/');

        $fromPath = testFilePath('csv/' . $this->argument('fromPath'));
        if (!file_exists($fromPath)) {
            $this->error($this->argument('fromPath') . ' folder not found!');
            return;
        }

        File::cleanDirectory($destinationPath);
        File::copyDirectory($fromPath, $destinationPath);

        $this->info("Done copy! from [$fromPath] \nto destination path [$destinationPath]");
    }
}
