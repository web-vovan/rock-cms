<?php

namespace WebVovan\RockCms\Console\Commands;

use Illuminate\Console\Command;

class RockCmsUpdateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rock-cms:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Команда обновления Rock.Cms';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->call('vendor:publish', [
            '--tag' => 'rock-cms-config'
        ]);

        $this->call('vendor:publish', [
            '--tag' => 'rock-cms-view',
        ]);

        $this->call('vendor:publish', [
            '--tag' => 'rock-cms-public',
            '--force',
        ]);

        $this->call('vendor:publish', [
            '--provider' => 'Spatie\MediaLibrary\MediaLibraryServiceProvider',
            '--tag' => 'migrations',
        ]);

        $this->call('adminlte:plugins', [
            'operation' => 'install',
            '--plugin' => ['summernote', 'daterangepicker'],
            '--force' => true
        ]);

        $this->info('🤘 Обновление Rock.Cms успешно выполнено');

        return 0;
    }
}
