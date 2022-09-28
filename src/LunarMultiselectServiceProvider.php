<?php

namespace Dystcz\LunarMultiselect;

use Illuminate\Support\ServiceProvider;
use Lunar\Facades\FieldTypeManifest;
use Lunar\Hub\LunarHub;

class LunarMultiselectServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * Optional methods to load your package assets
         */
        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'lunar-multiselect');
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'lunar-multiselect');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        FieldTypeManifest::add(
            Multiselect::class
        );

        LunarHub::script('lunar-multiselect', __DIR__ . '/../dist/lunar-multiselect.js');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/config.php' => config_path('lunar-multiselect.php'),
            ], 'config');

            // Publishing the views.
            $this->publishes([
                __DIR__ . '/../resources/views' => resource_path('views/vendor/lunar-multiselect'),
            ], 'views');

            // Publishing assets.
            $this->publishes([
                __DIR__ . '/../dist' => public_path('vendor/lunar-multiselect'),
            ], 'assets');

            // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/lunar-multiselect'),
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
        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', ' lunar-multiselect');
    }
}
