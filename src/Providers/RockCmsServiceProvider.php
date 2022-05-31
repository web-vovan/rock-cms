<?php

namespace WebVovan\RockCms\Providers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Support\ServiceProvider;
use JeroenNoten\LaravelAdminLte\Http\ViewComposers\AdminLteComposer;
use Livewire\Livewire;
use WebVovan\RockCms\Console\Commands\RockCmsInstallCommand;
use WebVovan\RockCms\Console\Commands\RockCmsUpdateCommand;
use WebVovan\RockCms\Http\Livewire\Partials\ResourceButtons;

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
            __DIR__.'/../config/rock-cms.php' => config_path('rock-cms.php')
        ], 'rock-cms-config');

        $this->publishes([
            __DIR__.'/../resources/views/admin' => resource_path('views/admin'),
        ], 'rock-cms-view');

        $this->publishes([
            __DIR__.'/../public/rock-cms' => public_path('vendor/rock-cms'),
            __DIR__.'/../public/vendor' => public_path('vendor'),
        ], 'rock-cms-public');

        $this->registerViewComposers($view);
        $this->registerLivewireComponents();

        if ($this->app->runningInConsole()) {
            $this->commands([
                RockCmsInstallCommand::class,
                RockCmsUpdateCommand::class,
            ]);
        }
    }

    private function registerViewComposers(Factory $view)
    {
        $view->composer('rock-cms::page', AdminLteComposer::class);
    }

    private function registerLivewireComponents()
    {
        Livewire::component('resource-buttons', ResourceButtons::class);
    }
}
