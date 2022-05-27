<?php

namespace Webvovan\RockCms\Providers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Support\ServiceProvider;
use JeroenNoten\LaravelAdminLte\Http\ViewComposers\AdminLteComposer;

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
    public function boot(Factory $view)
    {
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'rock-cms');

        $this->publishes([
            __DIR__.'/../config/rock-cms.php' => config_path('rock-cms-menu.php')
        ], 'rock-cms-config');

        $this->publishes([
            __DIR__.'/../public' => public_path('vendor/rock-cms'),
        ], 'rock-cms-public');

        $this->registerViewComposers($view);
    }

    private function registerViewComposers(Factory $view)
    {
        $view->composer('rock-cms::page', AdminLteComposer::class);
    }
}
