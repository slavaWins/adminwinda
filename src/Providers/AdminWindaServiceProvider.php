<?php

namespace SlavaWins\AdminWinda\Providers;

use Illuminate\Support\ServiceProvider;

class AdminWindaServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //$loader = \Illuminate\Foundation\AliasLoader::getInstance();
        // $loader->alias("FElement");
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'adminwinda');
        /*
                $this->publishes([
                    __DIR__.'/../resources/js' => public_path('js/adminwinda'),
                ], 'public');
        */

        /*
                $this->publishes([
                    __DIR__.'/../database/migrations' =>  database_path('migrations'),
                ], 'public');
          */


        $this->publishes([
            __DIR__ . '/../copy/Controllers/AdminWinda' => app_path('Http/Controllers'),
        ], 'public');


    }
}
