<?php

namespace SlavaWins\AdminWinda\Providers;

use Illuminate\Support\ServiceProvider;
use SlavaWins\AdminWinda\View\Components\AwCard;
use SlavaWins\AdminWinda\View\Components\AwSidebtn;

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
        $this->loadViewComponentsAs('', [
            AwSidebtn::class,
            AwCard::class
        ]);

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'adminwinda');

        $this->publishes([
            __DIR__.'/../copy/icons' => public_path('css'),
        ], 'public');

        $this->publishes([
            __DIR__.'/../copy/Views' => resource_path('views'),
        ], 'public');

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
 
        if(!file_exists(app_path('Admin/Represents'))) {
            mkdir(app_path('Admin/Represents'));
        }

        $this->publishes([
            __DIR__ . '/../copy/Controllers' => app_path('Http/Controllers'),
        ], 'public');


    }
}
