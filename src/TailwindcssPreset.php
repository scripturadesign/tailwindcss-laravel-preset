<?php
namespace Scriptura\TailwindcssPreset;

use Artisan;
use Illuminate\Support\Arr;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Foundation\Console\PresetCommand;
use Illuminate\Foundation\Console\Presets\Preset;

class TailwindcssPreset extends Preset
{
    /** @var PresetCommand */
    private static $command;

    /**
     * Install the preset.
     *
     * @return void
     */
    public static function install(PresetCommand $command)
    {
        static::$command = $command;

        static::ensureComponentDirectoryExists();
        static::updatePackages();
        static::updateStyles();
        static::updateWebpackConfiguration();
        static::updateJavaScript();
        static::updateTemplates();
        static::removeNodeModules();
        static::updateGitignore();

        static::$command->line('');
    }

    protected static function updatePackageArray(array $packages)
    {
        static::printHeadline('Update Javascript packages');

        // packages to add to the package.json
        $packagesToAdd = [
            'laravel-mix-purgecss' => '^2.2.0',
            'postcss-nesting' => '^5.0.0',
            'postcss-import' => '^11.1.0',
            'tailwindcss' => '>=0.5.3',
        ];
        // packages to remove from the package.json
        $packagesToRemove = [
            'bootstrap',
            'bootstrap-sass',
            'jquery',
            'popper.js',
        ];
        return $packagesToAdd + Arr::except($packages, $packagesToRemove);
    }

    protected static function updateStyles()
    {
        static::printHeadline('Update Styles');

        self::delete([
            resource_path('assets/sass'),
            public_path('js/app.js'),
            public_path('css/app.css'),
        ]);
        self::ensure([
            resource_path('assets/sass'),
        ]);
        self::copy([
            __DIR__.'/stubs/resources/assets/sass' => resource_path('assets/sass'),
        ]);
    }

    protected static function updateWebpackConfiguration()
    {
        static::printHeadline('Update Webpack config');

        self::copy([
            __DIR__.'/stubs/webpack.mix.js' => base_path('webpack.mix.js'),
        ]);
    }

    protected static function updateJavaScript()
    {
        static::printHeadline('Update Javascript');

        self::copy([
            __DIR__.'/stubs/app.js' => resource_path('assets/js/app.js'),
            __DIR__.'/stubs/bootstrap.js' => resource_path('assets/js/bootstrap.js'),
        ]);
    }

    protected static function updateTemplates()
    {
        static::printHeadline('Update Templates');

        // Add Home controller
        self::copy([
            __DIR__.'/stubs/Controllers/HomeController.php' => app_path('Http/Controllers/HomeController.php')
        ]);

        // Add Auth routes in 'routes/web.php'
        $auth_route_entry = "Auth::routes();\n\nRoute::get('/home', 'HomeController@index')->name('home');\n\n";
        file_put_contents('./routes/web.php', $auth_route_entry, FILE_APPEND);

        self::delete([
            resource_path('views/home.blade.php'),
            resource_path('views/welcome.blade.php'),
            resource_path('views/auth/login.blade.php'),
            resource_path('views/auth/register.blade.php'),
            resource_path('views/auth/passwords/email.blade.php'),
            resource_path('views/auth/passwords/reset.blade.php'),
            resource_path('views/components/form-card.blade.php'),
            resource_path('views/layouts/app.blade.php'),
        ]);

        self::copy([
            __DIR__.'/stubs/views' => resource_path('views'),
        ]);
    }

    protected static function updateGitignore()
    {
        static::printHeadline('Update Gitignore');

        self::copy([
            __DIR__.'/stubs/gitignore-stub' => base_path('.gitignore')
        ]);
    }


    private static function printHeadline(string $title)
    {
        static::$command->line('');
        static::$command->info("# {$title}");
    }

    private static function copy(array $paths)
    {
        tap(new Filesystem, function (Filesystem $files) use ($paths) {
            foreach ($paths as $source => $destination) {
                static::$command->getOutput()->write("<info>    copy ┬ </> <comment>{$source}</>\n");
                static::$command->getOutput()->write("<info>         └ </> <comment>{$destination}</>");
                if ($files->isDirectory($source)) {
                    $files->copyDirectory($source, $destination);
                } else {
                    $files->copy($source, $destination);
                }
                static::$command->info("  [✔]");
            }
        });
    }

    private static function delete(array $paths)
    {
        tap(new Filesystem, function (Filesystem $files) use ($paths) {
            foreach ($paths as $path) {
                static::$command->getOutput()->write("<info>  delete ─ </> <comment>{$path}</>");
                if ($files->isDirectory($path)) {
                    $files->deleteDirectory($path);
                } else {
                    $files->delete($path);
                }
                static::$command->info("  [✔]");
            }
        });
    }

    private static function ensure(array $directories)
    {
        tap(new Filesystem, function (Filesystem $files) use ($directories) {
            foreach ($directories as $directory) {
                static::$command->getOutput()->write("<info>  ensure ─ </> <comment>{$directory}</>");
                if (! $files->isDirectory($directory)) {
                    $files->makeDirectory($directory, 0755, true);
                }
                static::$command->info("  [✔]");
            }
        });
    }
}
