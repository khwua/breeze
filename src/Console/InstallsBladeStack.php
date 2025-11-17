<?php

namespace Laravel\Breeze\Console;

use Illuminate\Filesystem\Filesystem;
use Symfony\Component\Finder\Finder;

trait InstallsBladeStack
{
    /**
     * Install the Blade Breeze stack.
     *
     * @return int|null
     */
    protected function installBladeStack()
    {
        // NPM Packages...
        $this->updateNodePackages(function ($packages) {
            return [
                'axios' => '^1.6.1',
                'autoprefixer' => '^10.4.2',
                'postcss' => '^8.4.31',
                '@popperjs/core' => '^2.11.8',
                'bootstrap' => '^5.3.2',
                'sass' => '^1.69.5',
                'lodash' => '^4.17.21',
            ] + $packages;
        });

        (new Filesystem)->deleteDirectory(resource_path('css'));
        (new Filesystem)->deleteDirectory(public_path('build'));

        // Controllers...
        (new Filesystem)->ensureDirectoryExists(app_path('Http/Controllers'));
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/default/app/Http/Controllers', app_path('Http/Controllers'));

        // Requests...
        (new Filesystem)->ensureDirectoryExists(app_path('Http/Requests'));
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/default/app/Http/Requests', app_path('Http/Requests'));

        // Views...
        (new Filesystem)->ensureDirectoryExists(resource_path('views'));
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/default/resources/views', resource_path('views'));

        if (! $this->option('dark')) {
            $this->removeDarkClasses((new Finder)
                ->in(resource_path('views'))
                ->name('*.blade.php')
                ->notPath('livewire/welcome/navigation.blade.php')
                ->notName('welcome.blade.php')
            );
        }

        // Components...
        (new Filesystem)->ensureDirectoryExists(app_path('View/Components'));
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/default/app/View/Components', app_path('View/Components'));

        // Tests...
        if (! $this->installTests()) {
            return 1;
        }

        // Routes...
        copy(__DIR__.'/../../stubs/default/routes/web.php', base_path('routes/web.php'));
        copy(__DIR__.'/../../stubs/default/routes/auth.php', base_path('routes/auth.php'));

        // "Dashboard" Route...
        $this->replaceInFile('/home', '/dashboard', resource_path('views/welcome.blade.php'));
        $this->replaceInFile('Home', 'Dashboard', resource_path('views/welcome.blade.php'));

        // Tailwind / Vite...
        (new Filesystem)->ensureDirectoryExists(resource_path('scss'));
        copy(__DIR__.'/../../stubs/default/vite.config.js', base_path('vite.config.js'));
        copy(__DIR__.'/../../stubs/default/resources/scss/_variables.scss', resource_path('scss/_variables.scss'));
        copy(__DIR__.'/../../stubs/default/resources/scss/stylesheet.scss', resource_path('scss/stylesheet.scss'));
        copy(__DIR__.'/../../stubs/default/resources/js/scripts.js', resource_path('js/scripts.js'));

        $this->components->info('Installing and building Node dependencies.');

        if (file_exists(base_path('pnpm-lock.yaml'))) {
            $this->runCommands(['pnpm install', 'pnpm run build']);
        } elseif (file_exists(base_path('yarn.lock'))) {
            $this->runCommands(['yarn install', 'yarn run build']);
        } elseif (file_exists(base_path('bun.lock')) || file_exists(base_path('bun.lockb'))) {
            $this->runCommands(['bun install', 'bun run build']);
        } elseif (file_exists(base_path('deno.lock'))) {
            $this->runCommands(['deno install', 'deno task build']);
        } else {
            $this->runCommands(['npm install', 'npm run build']);
        }

        $this->line('');
        $this->components->info('Breeze scaffolding installed successfully.');
    }
}
