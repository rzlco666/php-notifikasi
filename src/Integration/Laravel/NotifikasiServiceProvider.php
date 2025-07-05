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

        // Register Blade directive
        \Blade::directive('notifikasi', function () {
            return "<?php echo app('notifikasi')->render(); ?>";
        });

        // Set configured instance
        if ($this->app->bound('config')) {
            $config = $this->app['config']->get('notifikasi', []);
            NotifikasiFacade::setInstance(
                new Notifikasi(null, null, $config)
            );
        }
    }

    public function provides()
    {
        return ['notifikasi'];
    }
} 