<?php

namespace App\Providers;

use App\Helpers\Frontend\Core\Block\Block;
use App\Helpers\Frontend\Core\Menu\Menu;
use App\Helpers\Frontend\Core\Slide\Slider;
use App\Helpers\General\Core\Setting;
use App\Helpers\General\QueryCacheModelRepositoryHelper;
use Illuminate\Support\ServiceProvider;

class CoreServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('slider', function () {
            return new Slider;
        });
        $this->app->bind('menu', function () {
            return new Menu;
        });
        $this->app->bind('block', function () {
            return new Block;
        });
        $this->app->bind('setting', function () {
            return new Setting;
        });
        $this->app->bind('query.cache', function () {
            return new QueryCacheModelRepositoryHelper;
        });
    }
}
