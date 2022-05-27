<?php

namespace Webvovan\RockCms\Providers;

use Illuminate\Support\ServiceProvider;

class RockCmsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'rock-cms');

        $this->publishes([
            __DIR__.'/../config/rock-cms-menu.php' => config_path('rock-cms-menu.php')
        ], 'rock-cms-menu');
    }
}
