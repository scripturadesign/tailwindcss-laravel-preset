<?php
namespace Scriptura\TailwindcssPreset;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\Console\PresetCommand;

class TailwindcssPresetServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        PresetCommand::macro('scriptura', function (PresetCommand $command) {
            TailwindcssPreset::install($command);
            $command->info('Scriptura scaffolding installed successfully.');
            $command->comment('Please run "npm install && npm run dev" or "yarn && yarn run dev" to compile your fresh scaffolding.');
        });
    }
}
