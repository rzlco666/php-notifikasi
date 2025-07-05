<?php
// PHP Notifikasi - Laravel Demo
// Start session before any output
session_start();

require_once __DIR__ . '/../vendor/autoload.php';

use Rzlco\PhpNotifikasi\NotifikasiFacade as Notif;
use Rzlco\PhpNotifikasi\Notifikasi;
use Rzlco\PhpNotifikasi\Storage\SessionStorage;

// Set SessionStorage for demo persistence
Notif::setInstance(new Notifikasi(new SessionStorage()));

// Handle notification actions
if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'success':
            Notif::success('Success', 'Operation completed successfully');
            break;
        case 'error':
            Notif::error('Error', 'An error occurred while processing');
            break;
        case 'warning':
            Notif::warning('Warning', 'Please check your input data');
            break;
        case 'info':
            Notif::info('Information', 'New updates are available');
            break;
        case 'success_clean':
            Notif::success('Success', 'Your changes have been saved', ['style' => 'clean']);
            break;
        case 'error_clean':
            Notif::error('Error', 'Something went wrong. Please try again', ['style' => 'clean']);
            break;
        case 'success_dark':
            Notif::success('Success', 'Your changes have been saved', ['style' => 'clean', 'mode' => 'dark']);
            break;
        case 'error_dark':
            Notif::error('Error', 'Something went wrong. Please try again', ['style' => 'clean', 'mode' => 'dark']);
            break;
    }
    
    // Redirect to prevent refresh
    header('Location: ' . strtok($_SERVER["REQUEST_URI"], '?'));
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Notifikasi - Laravel Demo</title>
    <link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='.9em' font-size='90'>🔔</text></svg>">
    
    <!-- Laravel Asset Paths -->
    <link href="/vendor/php-notifikasi/assets/tailwind.min.css" rel="stylesheet">
    <link href="/vendor/php-notifikasi/assets/fonts/stylesheet.css" rel="stylesheet">
    
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, "SF Pro Display", "SF Pro Text", "Helvetica Neue", system-ui, sans-serif;
            background: #000000;
            color: white;
            margin: 0;
            padding: 20px;
        }
        
        .container {
            max-width: 800px;
            margin: 0 auto;
        }
        
        .demo-section {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 16px;
            padding: 24px;
            margin-bottom: 24px;
        }
        
        .button {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: white;
            padding: 12px 24px;
            border-radius: 8px;
            text-decoration: none;
            display: inline-block;
            margin: 8px;
            transition: all 0.2s;
        }
        
        .button:hover {
            background: rgba(255, 255, 255, 0.15);
            transform: translateY(-1px);
        }
        
        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 16px;
            margin-top: 16px;
        }
        
        .info-box {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            padding: 16px;
            margin-top: 16px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🔔 PHP Notifikasi - Laravel Demo</h1>
        <p>Demo untuk testing di Laravel environment dengan asset path yang benar.</p>
        
        <div class="demo-section">
            <h2>Basic Notifications</h2>
            <div class="grid">
                <a href="?action=success" class="button">✅ Success</a>
                <a href="?action=error" class="button">❌ Error</a>
                <a href="?action=warning" class="button">⚠️ Warning</a>
                <a href="?action=info" class="button">ℹ️ Info</a>
            </div>
        </div>
        
        <div class="demo-section">
            <h2>Clean Style</h2>
            <div class="grid">
                <a href="?action=success_clean" class="button">✅ Success Clean</a>
                <a href="?action=error_clean" class="button">❌ Error Clean</a>
            </div>
        </div>
        
        <div class="demo-section">
            <h2>Dark Mode</h2>
            <div class="grid">
                <a href="?action=success_dark" class="button">✅ Success Dark</a>
                <a href="?action=error_dark" class="button">❌ Error Dark</a>
            </div>
        </div>
        
        <div class="info-box">
            <h3>📋 Instructions for Laravel</h3>
            <ol>
                <li><strong>Publish assets:</strong> <code>php artisan vendor:publish --tag=php-notifikasi-assets</code></li>
                <li><strong>Clear cache:</strong> <code>php artisan config:clear && php artisan cache:clear</code></li>
                <li><strong>Check assets:</strong> Verify files exist in <code>public/vendor/php-notifikasi/assets/</code></li>
                <li><strong>Use in Blade:</strong> <code>&lt;link href="{{ asset('vendor/php-notifikasi/assets/tailwind.min.css') }}"&gt;</code></li>
            </ol>
        </div>
        
        <div class="info-box">
            <h3>🔧 Troubleshooting</h3>
            <ul>
                <li>If assets return 404, make sure you've published them</li>
                <li>Check that the vendor directory exists in public/</li>
                <li>Verify file permissions allow web server to read assets</li>
                <li>Use <code>php artisan route:clear</code> if using route caching</li>
            </ul>
        </div>
    </div>

    <!-- Render notifications -->
    <?= Notif::render() ?>
</body>
</html> 