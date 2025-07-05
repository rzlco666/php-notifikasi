<?php

namespace Rzlco\PhpNotifikasi\Integration\Laravel;

use Illuminate\Support\ServiceProvider;
use Rzlco\PhpNotifikasi\Notifikasi;
use Rzlco\PhpNotifikasi\NotifikasiFacade;

class NotifikasiServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('notifikasi', function () {
            return new Notifikasi();
        });
    }

    public function boot()
    {
        // Publish config file
        $this->publishes([
            __DIR__ . '/config/notifikasi.php' => config_path('notifikasi.php'),
        ], 'config');

        // Publish assets
        $this->publishes([
            __DIR__ . '/../../assets' => public_path('vendor/php-notifikasi/assets'),
        ], 'php-notifikasi-assets');

        // Register Blade directive
        \Blade::directive('notifikasi', function () {
            return "<?php echo app('notifikasi')->render(); ?>";
        });

        // Set configured instance dengan config yang benar
        if ($this->app->bound('config')) {
            $config = $this->app['config']->get('notifikasi', []);
            
            // Merge dengan default config
            $defaultConfig = [
                'default_position' => 'bottom-right',
                'default_duration' => 5000,
                'default_style' => 'clean',
                'default_size' => 'md',
                'default_mode' => 'light',
                'include_css' => true,
                'include_js' => true,
                'theme' => 'ios',
            ];
            
            $mergedConfig = array_merge($defaultConfig, $config);
            
            NotifikasiFacade::setInstance(
                new Notifikasi(null, null, $mergedConfig)
            );
        }
    }

    public function provides()
    {
        return ['notifikasi'];
    }
} 