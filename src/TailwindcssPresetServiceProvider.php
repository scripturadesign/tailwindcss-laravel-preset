<?php

namespace Scriptura\TailwindcssPreset;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;
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

            if ($this->commandExists('yarn')) {
                $this->offerToRun('yarn && yarn run dev', $command);
            } else {
                $this->offerToRun('npm install && npm run dev', $command);
            }

            $this->offerToRun('composer require barryvdh/laravel-ide-helper', $command);
            $this->offerToRun('composer require doctrine/dbal --dev', $command);
            $this->offerToRun('composer require barryvdh/laravel-debugbar', $command);
            $this->offerToRun('php artisan ide-helper:generate', $command);
            $this->offerToRun('php artisan ide-helper:meta', $command);
        });
    }

    private function commandExists(string $command)
    {
        $process = new Process("type {$command}");
        $process->run();

        return $process->isSuccessful();
    }

    private function offerToRun(string $script, Command $command)
    {
        $command->line('');
        if ($command->confirm("Should I run `{$script}` for you?", true)) {
            $process = new Process($script);
            $process->run(function ($type, $buffer) use ($command) {
                $command->getOutput()->write($buffer);
            });
        }
    }
}
