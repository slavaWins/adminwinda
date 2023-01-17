<?php

namespace AdminWinda\Providers;

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
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'adminwinda');
/*
        $this->publishes([
            __DIR__.'/../resources/js' => public_path('js/adminwinda'),
        ], 'public');
*/
        $this->publishes([
            __DIR__.'/../../img' => public_path('img/adminwinda'),
        ], 'public');

        $this->publishes([
            __DIR__.'/../database/migrations' =>  database_path('migrations'),
        ], 'public');

        $this->publishes([
            __DIR__.'/../resources/views' =>  resource_path('views'),
        ], 'public');

        $this->publishes([
            __DIR__.'/../Actions' =>  app_path('Actions'),
        ], 'public');
    }
}
