<?php

namespace Rzlco\PhpNotifikasi;

use Illuminate\Support\ServiceProvider;

class PhpNotifikasiServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('php-notifikasi', function ($app) {
            return new Notifikasi();
        });
    }

    public function boot()
    {
        // Publish assets to public directory
        $this->publishes([
            __DIR__ . '/../assets' => public_path('vendor/php-notifikasi/assets'),
        ], 'php-notifikasi-assets');

        // Publish config if needed
        $this->publishes([
            __DIR__ . '/../config/php-notifikasi.php' => config_path('php-notifikasi.php'),
        ], 'php-notifikasi-config');
    }
} 