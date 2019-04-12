<?php

namespace App\Providers;

use App\Http\Composers\Backend\DomainFieldComposer;
use App\Http\Composers\Backend\SidebarComposer;
use App\Http\Composers\Frontend\CurrentDomainComposer;
use App\Http\Composers\Frontend\DomainsComposer;
use App\Http\Composers\GlobalComposer;
use Illuminate\Support\ServiceProvider;
use View;

/**
 * Class ComposerServiceProvider.
 */
class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot()
    {
        /*
         * Global
         */
        View::composer(
            '*',
            GlobalComposer::class
        );

        /*
         * Frontend
         */
        View::composer(
            [
                'frontend.core.block.templates.sites',
                'frontend.domain.index',
            ],
            DomainsComposer::class
        );
        View::composer(
            '*',
            CurrentDomainComposer::class
        );

        /*
         * Backend
         */
        View::composer(
            'backend.includes.sidebar',
            SidebarComposer::class
        );
        View::composer(
            'backend.includes.fields.domain',
            DomainFieldComposer::class
        );
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
