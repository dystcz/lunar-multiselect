<?php

namespace Dystcz\GetcandyMultiselect;

use GetCandy\Facades\FieldTypeManifest;
use GetCandy\Hub\GetCandyHub;
use Illuminate\Support\ServiceProvider;

class GetcandyMultiselectServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * Optional methods to load your package assets
         */
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'getcandy-multiselect');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'getcandy-multiselect');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        FieldTypeManifest::add(
            Multiselect::class
        );

        GetCandyHub::script('getcandy-multiselect', __DIR__.'/../dist/getcandy-multiselect.js');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('getcandy-multiselect.php'),
            ], 'config');

            // Publishing the views.
            $this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/getcandy-multiselect'),
            ], 'views');

            // Publishing assets.
            $this->publishes([
                __DIR__.'/../dist' => public_path('vendor/getcandy-multiselect'),
            ], 'assets');

            // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/getcandy-multiselect'),
            ], 'lang');*/

            // Registering package commands.
            // $this->commands([]);
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', ' getcandy-multiselect');
    }
}
