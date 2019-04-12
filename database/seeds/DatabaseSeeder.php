<?php

use App\Helpers\General\QueryCacheModelRepositoryHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Prettus\Repository\Helpers\CacheKeys;

class DatabaseSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @throws Exception
     */
    public function run()
    {
        Model::unguard();

        Storage::disk('public')->deleteDirectory('images');
        Storage::disk('public')->deleteDirectory('avatar');
        File::deleteDirectory(public_path('assets/'), true);
        File::deleteDirectory(storage_path('medialibrary/'), true);

        $this->call([
            AuthTableSeeder::class,
            DomainTableSeeder::class,
            SettingTableSeeder::class,
            BlockTableSeeder::class,
            PageTableSeeder::class,
            SlideTableSeeder::class,
            InquiryTableSeeder::class,
            CategoryTableSeeder::class,
            MenuTableSeeder::class,
            ModuleTableSeeder::class,
            DataSeeder::class,
        ]);

        app('cache')->flush();
        @unlink(CacheKeys::getFileKeys());
        @unlink(QueryCacheModelRepositoryHelper::getFilePath());
        Model::reguard();

        Artisan::call('inspire');
        $this->command->comment("\n" . Artisan::output());
    }
}
