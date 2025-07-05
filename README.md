# 🔔 PHP Notifikasi

[![Latest Version](https://img.shields.io/packagist/v/rzlco666/php-notifikasi.svg)](https://packagist.org/packages/rzlco666/php-notifikasi)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg)](LICENSE)
[![PHP Version](https://img.shields.io/badge/php-%3E%3D7.4-blue.svg)](https://php.net/)

A modern, framework-agnostic PHP library for displaying floating notifications with iOS-style design. Built with clean architecture, value objects, and service-oriented design.

## 📋 Table of Contents

- [✨ Features](#-features)
- [🏗️ Architecture](#️-architecture)
- [📦 Installation](#-installation)
- [🚀 Quick Start](#-quick-start)
  - [Native PHP](#native-php)
  - [Laravel Integration](#laravel-integration)
- [📖 Core Concepts](#-core-concepts)
  - [Value Objects](#value-objects)
  - [Configuration Management](#configuration-management)
  - [Storage Systems](#storage-systems)
  - [Rendering System](#rendering-system)
- [🎨 Styling & Themes](#-styling--themes)
  - [Available Styles](#available-styles)
  - [Style vs Theme](#style-vs-theme)
  - [Custom CSS](#custom-css)
- [🔧 Configuration](#-configuration)
  - [Global Configuration](#global-configuration)
  - [Laravel Configuration](#laravel-configuration)
  - [Per-Notification Options](#per-notification-options)
- [📚 API Reference](#-api-reference)
  - [NotifikasiFacade](#notifikasifacade)
  - [Notifikasi Class](#notifikasi-class)
  - [Notification Class](#notification-class)
  - [Storage Interfaces](#storage-interfaces)
  - [Renderer Interfaces](#renderer-interfaces)
- [🎯 Advanced Usage](#-advanced-usage)
  - [Custom Storage](#custom-storage)
  - [Custom Renderer](#custom-renderer)
  - [AJAX Integration](#ajax-integration)
  - [Event Handling](#event-handling)
- [🧪 Testing](#-testing)
- [🤝 Contributing](#-contributing)
- [📄 License](#-license)
- [🗺️ Development Roadmap](#️-development-roadmap)
  - [🚀 Phase 1: Core Enhancements (Q3-Q4 2025)](#-phase-1-core-enhancements-q3-q4-2025)
    - [Notification Templates](#notification-templates)
    - [Builder Pattern](#builder-pattern)
    - [Event System & Hooks](#event-system--hooks)
    - [Rich Content Support](#rich-content-support)
  - [🎯 Phase 2: Advanced Features (Q1-Q2 2026)](#-phase-2-advanced-features-q1-q2-2026)
    - [Notification Groups & Categories](#notification-groups--categories)
    - [Progress & Status Notifications](#progress--status-notifications)
    - [Multi-language Support](#multi-language-support)
    - [Notification Analytics](#notification-analytics)
    - [Toast Stack Management](#toast-stack-management)
  - [🌟 Phase 3: Enterprise Features (Q3-Q4 2026)](#-phase-3-enterprise-features-q3-q4-2026)
    - [WebSocket Real-time Notifications](#websocket-real-time-notifications)
    - [PWA Push Notifications](#pwa-push-notifications)
    - [Notification Queue & Persistence](#notification-queue--persistence)
    - [Advanced Animation & Interactions](#advanced-animation--interactions)
    - [Notification Channels](#notification-channels)
    - [Notification Scheduling](#notification-scheduling)
    - [Security & Performance Features](#security--performance-features)
    - [Mobile & PWA Support](#mobile--pwa-support)
    - [Testing & Debugging Framework](#testing--debugging-framework)
  - [📊 Implementation Strategy](#-implementation-strategy)
  - [🤝 Contributing to the Roadmap](#-contributing-to-the-roadmap)
  - [📈 Success Metrics](#-success-metrics)
  - [🔄 Continuous Improvement](#-continuous-improvement)

## ✨ Features

- 🎨 **Modern iOS Design** - Transparent backgrounds with blur effects
- 🏗️ **Clean Architecture** - Value objects, service classes, and dependency injection
- 🔧 **Framework Agnostic** - Works with Laravel, Symfony, CodeIgniter, or native PHP
- 📱 **Responsive Design** - Automatically adapts to mobile devices
- ⚡ **Lightweight** - No external dependencies, pure PHP
- 🎯 **Multiple Positions** - 6 selectable notification positions
- ⏱️ **Auto Dismiss** - Configurable auto-hide timers
- 🎨 **Multiple Styles** - 4 built-in styles including liquid glass effect
- 🔒 **Type Safety** - Strong typing with value objects
- 🧪 **Fully Tested** - Comprehensive unit test coverage
- 🚀 **High Performance** - Optimized rendering and asset management

## 🏗️ Architecture

The library follows clean architecture principles with these key components:

- **Value Objects**: `NotificationId`, `NotificationType`, `NotificationOptions`
- **Service Classes**: `IconService`, `NotificationStyleFactory`
- **Asset Management**: `CssAssetManager`, `JavaScriptAssetManager`
- **Storage Abstraction**: `StorageInterface` with multiple implementations
- **Renderer System**: `RendererInterface` with HTML renderer
- **Configuration**: `NotifikasiConfig` with validation

## 📦 Installation

```bash
composer require rzlco666/php-notifikasi
```

## 🚀 Quick Start

### Native PHP

```php
<?php
require_once 'vendor/autoload.php';

use Rzlco\PhpNotifikasi\NotifikasiFacade as Notif;

// Basic notifications
Notif::success('Success!', 'Data has been saved successfully');
Notif::error('Error!', 'An error occurred while processing');
Notif::warning('Warning!', 'Please check your input data');
Notif::info('Info', 'Operation completed successfully');

// Render in your template
echo Notif::render();
?>
```

### Laravel Integration

Untuk menggunakan di Laravel, ikuti langkah berikut:

### 1. Install Package
```bash
composer require rzlco/php-notifikasi
```

### 2. Publish Assets
```bash
php artisan vendor:publish --tag=php-notifikasi-assets
```

### 3. Clear Cache
```bash
php artisan config:clear
php artisan cache:clear
```

### 4. Use in Blade Template
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

### 5. Use in Controller
```php
<?php

namespace App\Http\Controllers;

use Rzlco\PhpNotifikasi\NotifikasiFacade as Notif;

class UserController extends Controller
{
    public function store(Request $request)
    {
        try {
            User::create($request->validated());
            Notif::success('Success', 'User created successfully');
            return redirect()->route('users.index');
        } catch (\Exception $e) {
            Notif::error('Error', 'Failed to create user');
            return back()->withInput();
        }
    }
}
```

### Troubleshooting Laravel

Jika asset 404 error:
1. Pastikan sudah publish assets: `php artisan vendor:publish --tag=php-notifikasi-assets`
2. Cek file ada di `public/vendor/php-notifikasi/assets/`
3. Clear cache: `php artisan config:clear && php artisan cache:clear`
4. Test dengan demo: `example/laravel_demo.php`

Lihat [LARAVEL_INTEGRATION.md](LARAVEL_INTEGRATION.md) untuk dokumentasi lengkap.

## 📖 Core Concepts

### Value Objects

The library uses value objects for type safety and data integrity:

```php
use Rzlco\PhpNotifikasi\ValueObjects\NotificationType;
use Rzlco\PhpNotifikasi\ValueObjects\NotificationOptions;

// Type validation
$type = new NotificationType('success'); // ✅ Valid
$type = new NotificationType('invalid'); // ❌ Throws exception

// Options with defaults
$options = new NotificationOptions([
    'position' => 'top-right',
    'duration' => 5000,
    'style' => 'clean'
]);
```

### Configuration Management

```php
use Rzlco\PhpNotifikasi\NotifikasiConfig;

$config = new NotifikasiConfig([
    'default_position' => 'top-right',
    'default_duration' => 5000,
    'default_style' => 'clean',
    'default_size' => 'md',
    'include_css' => true,
    'include_js' => true,
    'theme' => 'ios'
]);
```

### Storage Systems

Multiple storage implementations available:

```php
use Rzlco\PhpNotifikasi\Storage\ArrayStorage;
use Rzlco\PhpNotifikasi\Storage\SessionStorage;

// In-memory storage (default)
$storage = new ArrayStorage();

// Session-based storage
$storage = new SessionStorage();
```

### Rendering System

The HTML renderer uses asset managers for clean separation:

```php
use Rzlco\PhpNotifikasi\Renderer\HtmlRenderer;
use Rzlco\PhpNotifikasi\Services\CssAssetManager;
use Rzlco\PhpNotifikasi\Services\JavaScriptAssetManager;

$renderer = new HtmlRenderer(
    new CssAssetManager(),
    new JavaScriptAssetManager()
);
```

## 🎨 Styling & Themes

### Available Styles

1. **Clean** (default) - White background with colored icons
2. **Colored** - Gradient background with white text
3. **Blur** - iOS-style transparent blur effect
4. **Liquid Glass** - iOS 17+ liquid glass effect

```php
// Apply different styles
Notif::success('Success!', 'Data saved', ['style' => 'clean']);
Notif::error('Error!', 'Failed to save', ['style' => 'colored']);
Notif::info('Info', 'New update', ['style' => 'blur']);
Notif::warning('Warning', 'Check data', ['style' => 'liquid-glass']);
```

### Style vs Theme

**Style** - Applied per notification:
```php
// Each notification can have different styles
Notif::success('Success!', 'Data saved', ['style' => 'clean']);
Notif::error('Error!', 'Failed to save', ['style' => 'colored']);
```

**Theme** - Global design system:
```php
// In configuration
'theme' => 'ios'  // Currently only 'ios' implemented
```

### Custom CSS

Override default styles with your own CSS:

```css
/* Override container position */
.php-notifikasi-container-top_right {
    top: 20px;
    right: 20px;
}

/* Override notification style */
.php-notifikasi {
    background: rgba(0, 0, 0, 0.8) !important;
    border-radius: 8px !important;
}

/* Custom type colors */
.php-notifikasi-success .php-notifikasi-icon {
    background: #28a745 !important;
}

/* Dark mode overrides */
.notif-clean-dark {
    background: #1a1a1a !important;
    color: #ffffff !important;
}
```

## 🌙 Dark Mode Support

The library provides comprehensive dark mode support with three modes:

### Light Mode (Default)
```php
Notif::success('Success!', 'Data saved', ['mode' => 'light']);
```

### Dark Mode
```php
Notif::success('Success!', 'Data saved', ['mode' => 'dark']);
```

### Auto Mode
```php
Notif::success('Success!', 'Data saved', ['mode' => 'auto']);
```

Auto mode automatically detects the user's system preference and applies the appropriate theme. It also listens for system theme changes and updates notifications in real-time.

### Dark Mode Features

- **All Styles Supported**: Clean, colored, blur, and liquid glass styles all have dark variants
- **System Integration**: Auto mode follows `prefers-color-scheme` media query
- **Real-time Updates**: Notifications update automatically when system theme changes
- **Consistent Design**: Dark mode maintains the same iOS-style aesthetics
- **Accessibility**: Proper contrast ratios for better readability

### Dark Mode Examples

```php
// Clean style with dark mode
Notif::success('Success!', 'Data saved', [
    'style' => 'clean',
    'mode' => 'dark'
]);

// Blur style with dark mode
Notif::error('Error!', 'Failed to save', [
    'style' => 'blur',
    'mode' => 'dark'
]);

// Liquid glass with dark mode
Notif::info('Info', 'New update', [
    'style' => 'liquid-glass',
    'mode' => 'dark'
]);

// Auto mode with any style
Notif::warning('Warning', 'Check data', [
    'style' => 'colored',
    'mode' => 'auto'
]);
```

## 🔧 Configuration

### Global Configuration

```php
use Rzlco\PhpNotifikasi\NotifikasiFacade as Notif;

Notif::config([
    'default_position' => 'bottom-right',
    'default_duration' => 7000,
    'default_style' => 'clean',
    'default_size' => 'md',
    'default_mode' => 'light',     // light, dark, auto
    'include_css' => true,
    'include_js' => true,
    'theme' => 'ios'
]);
```

### Laravel Configuration

```php
// config/notifikasi.php
return [
    'default_position' => 'top-right',
    'default_duration' => 5000,
    'default_style' => 'clean',
    'default_size' => 'md',
    'default_mode' => 'light',     // light, dark, auto
    'include_css' => true,
    'include_js' => true,
    'theme' => 'ios'
];
```

### Per-Notification Options

```php
Notif::success('Success!', 'Data saved', [
    'position' => 'top-left',     // Override position
    'duration' => 3000,           // Display duration (ms)
    'style' => 'colored',         // Style: clean, colored, blur, liquid-glass
    'size' => 'lg',               // Size: sm, md, lg
    'mode' => 'dark',             // Mode: light, dark, auto
    'dismissible' => true,        // Can be closed manually
    'className' => 'my-class'     // Additional CSS class
]);
```

### Available Modes

- `light` (default) - Always use light mode
- `dark` - Always use dark mode  
- `auto` - Automatically detect system preference

### Mode Examples

```php
// Light mode (default)
Notif::success('Success!', 'Data saved', ['mode' => 'light']);

// Dark mode
Notif::success('Success!', 'Data saved', ['mode' => 'dark']);

// Auto mode - follows system preference
Notif::success('Success!', 'Data saved', ['mode' => 'auto']);
```

## 📚 API Reference

### NotifikasiFacade

Static facade for easy access:

```php
use Rzlco\PhpNotifikasi\NotifikasiFacade as Notif;

// Basic methods
Notif::success($title, $message, $options);
Notif::error($title, $message, $options);
Notif::warning($title, $message, $options);
Notif::info($title, $message, $options);
Notif::add($type, $title, $message, $options);

// Utility methods
Notif::render();
Notif::json();
Notif::config($config);
Notif::clear();
```

### Notifikasi Class

Main class for advanced usage:

```php
use Rzlco\PhpNotifikasi\Notifikasi;

$notif = new Notifikasi();

// Add notifications
$notif->success('Title', 'Message');
$notif->error('Title', 'Message');

// Get notifications
$notifications = $notif->all();
$successNotifications = $notif->getByType('success');

// Render
echo $notif->render();
$json = $notif->json();

// Utility
if ($notif->hasNotifications()) {
    // Do something
}
$notif->clear();
```

### Notification Class

Value object representing a single notification:

```php
use Rzlco\PhpNotifikasi\Notification;

$notification = new Notification('success', 'Title', 'Message', [
    'position' => 'top-right',
    'duration' => 5000
]);

// Getters
$id = $notification->getId();
$type = $notification->getType();
$title = $notification->getTitle();
$message = $notification->getMessage();
$options = $notification->getOptions();
$position = $notification->getOption('position', 'top-right');

// Serialization
$array = $notification->toArray();
$restored = Notification::fromArray($array);
```

### Storage Interfaces

```php
use Rzlco\PhpNotifikasi\Storage\StorageInterface;

interface StorageInterface
{
    public function add(Notification $notification): void;
    public function all(): array;
    public function clear(): void;
    public function getByType(string $type): array;
    public function remove(string $id): bool;
}
```

### Renderer Interfaces

```php
use Rzlco\PhpNotifikasi\Renderer\RendererInterface;

interface RendererInterface
{
    public function render(array $notifications, array $config = []): string;
}
```

## 🎯 Advanced Usage

### Custom Storage

```php
use Rzlco\PhpNotifikasi\Storage\StorageInterface;
use Rzlco\PhpNotifikasi\Notification;

class RedisStorage implements StorageInterface 
{
    private Redis $redis;
    
    public function __construct(Redis $redis)
    {
        $this->redis = $redis;
    }
    
    public function add(Notification $notification): void
    {
        $this->redis->lpush('notifications', json_encode($notification->toArray()));
    }
    
    public function all(): array
    {
        $data = $this->redis->lrange('notifications', 0, -1);
        return array_map(fn($item) => Notification::fromArray(json_decode($item, true)), $data);
    }
    
    public function clear(): void
    {
        $this->redis->del('notifications');
    }
    
    public function getByType(string $type): array
    {
        return array_filter($this->all(), fn($n) => $n->getType() === $type);
    }
    
    public function remove(string $id): bool
    {
        // Implementation for removing by ID
        return true;
    }
}

// Usage
$notif = new Notifikasi(new RedisStorage($redis));
```

### Custom Renderer

```php
use Rzlco\PhpNotifikasi\Renderer\RendererInterface;

class JsonRenderer implements RendererInterface 
{
    public function render(array $notifications, array $config = []): string 
    {
        return json_encode([
            'notifications' => array_map(fn($n) => $n->toArray(), $notifications),
            'config' => $config
        ]);
    }
}

// Usage
$notif = new Notifikasi(null, new JsonRenderer());
```