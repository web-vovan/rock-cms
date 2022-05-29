<?php

namespace Webvovan\RockCms\Providers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Support\ServiceProvider;
use JeroenNoten\LaravelAdminLte\Http\ViewComposers\AdminLteComposer;
use Webvovan\RockCms\Console\Commands\RockCmsInstallCommand;

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
            __DIR__.'/../resources/views/admin' => resource_path('views/admin'),
//            __DIR__.'/../resources/views/livewire' => resource_path('views/livewire/rock-cms'),
//            __DIR__.'/../Http/Livewire' => app_path('Http/Livewire/RockCms'),
        ], 'rock-cms-view');

        $this->publishes([
            __DIR__.'/../public' => public_path('vendor/rock-cms'),
        ], 'rock-cms-public');

        $this->registerViewComposers($view);

        if ($this->app->runningInConsole()) {
            $this->commands([
                RockCmsInstallCommand::class,
            ]);
        }
    }

    private function registerViewComposers(Factory $view)
    {
        $view->composer('rock-cms::page', AdminLteComposer::class);
    }
}
