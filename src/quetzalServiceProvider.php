<?php

namespace gaboeremita\quetzal;

use Illuminate\Support\ServiceProvider;

class quetzalServiceProvider extends ServiceProvider
{

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/quetzal.php', 'quetzal');

        // Register the service the package provides.
        $this->app->singleton('quetzal', function ($app) {
            return new Quetzal;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['quetzal'];
    }
}
