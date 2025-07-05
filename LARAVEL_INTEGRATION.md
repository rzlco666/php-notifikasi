# Laravel Integration Guide

## Instalasi

1. Install package via Composer:
```bash
composer require rzlco/php-notifikasi
```

2. Publish assets ke public directory:
```bash
php artisan vendor:publish --tag=php-notifikasi-assets
```

## Penggunaan

### Basic Usage

```php
<?php

use Rzlco\PhpNotifikasi\NotifikasiFacade as Notif;

// Success notification
Notif::success('Success', 'Operation completed successfully');

// Error notification  
Notif::error('Error', 'Something went wrong');

// Warning notification
Notif::warning('Warning', 'Please check your input');

// Info notification
Notif::info('Info', 'New updates available');
```

### Di Controller

```php
<?php

namespace App\Http\Controllers;

use Rzlco\PhpNotifikasi\NotifikasiFacade as Notif;

class UserController extends Controller
{
    public function store(Request $request)
    {
        try {
            // Create user logic
            User::create($request->validated());
            
            Notif::success('User Created', 'User has been created successfully');
            
            return redirect()->route('users.index');
        } catch (\Exception $e) {
            Notif::error('Error', 'Failed to create user: ' . $e->getMessage());
            
            return back()->withInput();
        }
    }
}
```

### Di Blade Template

```php
<!DOCTYPE html>
<html>
<head>
    <title>My App</title>
    <!-- Include assets -->
    <link href="{{ asset('vendor/php-notifikasi/assets/tailwind.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/php-notifikasi/assets/fonts/stylesheet.css') }}" rel="stylesheet">
</head>
<body>
    <!-- Your content -->
    
    <!-- Render notifications -->
    {!! Notif::render() !!}
</body>
</html>
```

### Helper Function

Package menyediakan helper function `php_notifikasi_asset()`:

```php
<!-- Di Blade template -->
<link href="{{ php_notifikasi_asset('tailwind.min.css') }}" rel="stylesheet">
<link href="{{ php_notifikasi_asset('fonts/stylesheet.css') }}" rel="stylesheet">
```

### Advanced Configuration

```php
<?php

// Di AppServiceProvider atau config file
use Rzlco\PhpNotifikasi\NotifikasiFacade as Notif;

// Set custom storage
Notif::setInstance(new Notifikasi(new SessionStorage()));

// Configure options
Notif::config([
    'default_style' => 'clean',
    'default_position' => 'top-right',
    'default_duration' => 5000,
    'max_notifications' => 5
]);
```

## Asset Management

### Manual Publishing

Jika auto-publish tidak bekerja, publish manual:

```bash
# Publish assets
php artisan vendor:publish --tag=php-notifikasi-assets

# Publish config (optional)
php artisan vendor:publish --tag=php-notifikasi-config
```

### Custom Asset Path

Jika ingin menggunakan asset dari CDN atau path custom:

```php
// Di config/php-notifikasi.php
return [
    'asset_path' => 'https://cdn.example.com/php-notifikasi/assets',
    // atau
    'asset_path' => '/custom/path/to/assets',
];
```

## Troubleshooting

### Asset 404 Error

Jika asset tidak ditemukan:

1. Pastikan sudah publish assets:
```bash
php artisan vendor:publish --tag=php-notifikasi-assets
```

2. Cek file ada di `public/vendor/php-notifikasi/assets/`

3. Clear cache:
```bash
php artisan config:clear
php artisan cache:clear
```

### Helper Function Not Found

Jika `php_notifikasi_asset()` tidak tersedia:

1. Pastikan package terinstall dengan benar
2. Run `composer dump-autoload`
3. Clear cache: `php artisan config:clear`

### Session Issues

Jika notification tidak muncul:

1. Pastikan session sudah start
2. Cek session configuration di `config/session.php`
3. Pastikan storage driver sesuai

## Best Practices

1. **Always publish assets** setelah install package
2. **Use helper function** untuk asset path yang konsisten
3. **Handle exceptions** dengan try-catch untuk error notifications
4. **Clear cache** setelah konfigurasi perubahan
5. **Test notifications** di development environment

## Migration dari Native PHP

Jika sudah menggunakan di native PHP dan mau migrate ke Laravel:

1. Ganti asset path dari `/assets/` ke `{{ asset('vendor/php-notifikasi/assets/') }}`
2. Gunakan helper function `php_notifikasi_asset()`
3. Publish assets dengan artisan command
4. Update composer.json dependencies 