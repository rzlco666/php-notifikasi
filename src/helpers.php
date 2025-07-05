<?php

if (!function_exists('php_notifikasi_asset')) {
    /**
     * Get the correct asset path for PHP Notifikasi
     * 
     * @param string $path
     * @return string
     */
    function php_notifikasi_asset($path = '')
    {
        // Check if we're in Laravel
        if (function_exists('asset')) {
            return asset('vendor/php-notifikasi/assets/' . ltrim($path, '/'));
        }
        
        // Fallback for non-Laravel
        return '/assets/' . ltrim($path, '/');
    }
} 