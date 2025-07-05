<?php
// PHP Notifikasi - Apple Design System Demo
// Start session before any output
session_start();

require_once __DIR__ . '/../vendor/autoload.php';

// Load helpers manually if not autoloaded
if (!function_exists('php_notifikasi_asset')) {
    require_once __DIR__ . '/../src/helpers.php';
}

use Rzlco\PhpNotifikasi\NotifikasiFacade as Notif;
use Rzlco\PhpNotifikasi\Notifikasi;
use Rzlco\PhpNotifikasi\Storage\SessionStorage;

// Set SessionStorage for demo persistence
Notif::setInstance(new Notifikasi(new SessionStorage()));

// Handle notification actions
if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        // Basic notifications
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
            
        // Clean style demos
        case 'success_clean':
            Notif::success('Success', 'Your changes have been saved', ['style' => 'clean']);
            break;
        case 'error_clean':
            Notif::error('Error', 'Something went wrong. Please try again', ['style' => 'clean']);
            break;
        case 'warning_clean':
            Notif::warning('Warning', 'Please check your input data', ['style' => 'clean']);
            break;
        case 'info_clean':
            Notif::info('Information', 'New updates are available', ['style' => 'clean']);
            break;
            
        // Size demos
        case 'success_clean_sm':
            Notif::success('Success', 'Changes saved', ['style' => 'clean', 'size' => 'sm']);
            break;
        case 'success_clean_lg':
            Notif::success('Successfully Completed', 'Your changes have been saved successfully and are now active across all your devices', ['style' => 'clean', 'size' => 'lg']);
            break;
            
        // Colored style demos
        case 'success_colored':
            Notif::success('Success', 'Operation completed successfully', ['style' => 'colored']);
            break;
        case 'error_colored':
            Notif::error('Error', 'An error occurred while processing', ['style' => 'colored']);
            break;
        case 'warning_colored':
            Notif::warning('Warning', 'Please check your input data', ['style' => 'colored']);
            break;
        case 'info_colored':
            Notif::info('Information', 'New updates are available', ['style' => 'colored']);
            break;
            
        // Multiple notifications
        case 'multiple_clean':
            Notif::success('Success', 'Your changes were saved', ['style' => 'clean', 'position' => 'top-right']);
            Notif::error('Error', 'Something went wrong', ['style' => 'clean', 'position' => 'top-right']);
            Notif::info('Information', 'New updates available', ['style' => 'clean', 'position' => 'top-right']);
            break;
        case 'multiple':
            Notif::success('Data Saved', 'User created successfully');
            Notif::info('Email Sent', 'Verification email has been sent', ['position' => 'bottom-left', 'duration' => 7000]);
            Notif::warning('Reminder', 'Please verify your email within 24 hours', ['position' => 'top-center', 'duration' => 10000]);
            break;
            
        // Position demos
        case 'positions':
            Notif::success('Top Right', '', ['position' => 'top-right']);
            Notif::error('Top Left', '', ['position' => 'top-left']);
            Notif::warning('Bottom Right', '', ['position' => 'bottom-right']);
            Notif::info('Bottom Left', '', ['position' => 'bottom-left']);
            Notif::add('custom', 'Top Center', '', ['position' => 'top-center']);
            Notif::add('custom', 'Bottom Center', '', ['position' => 'bottom-center']);
            break;
            
        // Blur style demos
        case 'success_blur':
            Notif::success('Success', 'Your changes have been saved', ['style' => 'blur']);
            break;
        case 'error_blur':
            Notif::error('Error', 'Something went wrong. Please try again', ['style' => 'blur']);
            break;
        case 'warning_blur':
            Notif::warning('Warning', 'Please check your input data', ['style' => 'blur']);
            break;
        case 'info_blur':
            Notif::info('Information', 'New updates are available', ['style' => 'blur']);
            break;
            
        // Liquid glass style demos
        case 'success_liquid_glass':
            Notif::success('Success', 'Your changes have been saved', ['style' => 'liquid-glass']);
            break;
        case 'error_liquid_glass':
            Notif::error('Error', 'Something went wrong. Please try again', ['style' => 'liquid-glass']);
            break;
        case 'warning_liquid_glass':
            Notif::warning('Warning', 'Please check your input data', ['style' => 'liquid-glass']);
            break;
        case 'info_liquid_glass':
            Notif::info('Information', 'New updates are available', ['style' => 'liquid-glass']);
            break;
            
        // Dark mode demos
        case 'success_dark':
            Notif::success('Success', 'Your changes have been saved', ['style' => 'clean', 'mode' => 'dark']);
            break;
        case 'error_dark':
            Notif::error('Error', 'Something went wrong. Please try again', ['style' => 'clean', 'mode' => 'dark']);
            break;
        case 'warning_dark':
            Notif::warning('Warning', 'Please check your input data', ['style' => 'clean', 'mode' => 'dark']);
            break;
        case 'info_dark':
            Notif::info('Information', 'New updates are available', ['style' => 'clean', 'mode' => 'dark']);
            break;
        case 'success_blur_dark':
            Notif::success('Success', 'Your changes have been saved', ['style' => 'blur', 'mode' => 'dark']);
            break;
        case 'error_blur_dark':
            Notif::error('Error', 'Something went wrong. Please try again', ['style' => 'blur', 'mode' => 'dark']);
            break;
        case 'success_liquid_glass_dark':
            Notif::success('Success', 'Your changes have been saved', ['style' => 'liquid-glass', 'mode' => 'dark']);
            break;
        case 'error_liquid_glass_dark':
            Notif::error('Error', 'Something went wrong. Please try again', ['style' => 'liquid-glass', 'mode' => 'dark']);
            break;
            
        // Auto mode demo
        case 'auto_mode':
            Notif::success('Auto Mode', 'This notification adapts to system theme', ['style' => 'clean', 'mode' => 'auto']);
            Notif::error('Auto Mode', 'This notification adapts to system theme', ['style' => 'blur', 'mode' => 'auto']);
            Notif::info('Auto Mode', 'This notification adapts to system theme', ['style' => 'liquid-glass', 'mode' => 'auto']);
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
    <title>PHP Notifikasi - Apple Design System</title>
    <link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='.9em' font-size='90'>🔔</text></svg>">
    <link href="/assets/tailwind.min.css" rel="stylesheet">
    <link href="/assets/fonts/stylesheet.css" rel="stylesheet">
    <!-- Prism.js for syntax highlighting -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/themes/prism-tomorrow.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/plugins/toolbar/prism-toolbar.min.css" rel="stylesheet">
    <style>
        /* Apple Font Stack */
        .apple-font {
            font-family: -apple-system, BlinkMacSystemFont, "SF Pro Display", "SF Pro Text", "Helvetica Neue", system-ui, sans-serif;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }
        
        /* Apple Design System Colors */
        .apple-bg {
            background: #000000;
        }
        
        .apple-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .apple-button {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.2s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }
        
        .apple-button:hover {
            background: rgba(255, 255, 255, 0.15);
            transform: translateY(-1px);
        }
        
        .apple-button:active {
            transform: translateY(0);
        }
        
        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        
        ::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.05);
        }
        
        ::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 4px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: rgba(255, 255, 255, 0.3);
        }
        
        /* Smooth animations */
        .smooth-transition {
            transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }
        
        /* Code block styling with Prism.js */
        .code-block {
            background: rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            font-family: "SF Mono", Monaco, "Cascadia Code", "Roboto Mono", Consolas, "Courier New", monospace;
            position: relative;
            overflow: hidden;
        }
        
        .code-block pre {
            margin: 0;
            padding: 1rem;
            background: transparent;
            border: none;
            border-radius: 0;
        }
        
        .code-block code {
            font-size: 0.875rem;
            line-height: 1.5;
        }
        
        /* Prism.js customization for Apple theme */
        .prism-tomorrow {
            background: rgba(0, 0, 0, 0.8) !important;
            border-radius: 8px;
        }
        
        .prism-tomorrow .token.comment,
        .prism-tomorrow .token.prolog,
        .prism-tomorrow .token.doctype,
        .prism-tomorrow .token.cdata {
            color: #6a9955;
        }
        
        .prism-tomorrow .token.punctuation {
            color: #d4d4d4;
        }
        
        .prism-tomorrow .token.property,
        .prism-tomorrow .token.tag,
        .prism-tomorrow .token.boolean,
        .prism-tomorrow .token.number,
        .prism-tomorrow .token.constant,
        .prism-tomorrow .token.symbol,
        .prism-tomorrow .token.deleted {
            color: #b5cea8;
        }
        
        .prism-tomorrow .token.selector,
        .prism-tomorrow .token.attr-name,
        .prism-tomorrow .token.string,
        .prism-tomorrow .token.char,
        .prism-tomorrow .token.builtin,
        .prism-tomorrow .token.inserted {
            color: #ce9178;
        }
        
        .prism-tomorrow .token.operator,
        .prism-tomorrow .token.entity,
        .prism-tomorrow .token.url,
        .prism-tomorrow .language-css .token.string,
        .prism-tomorrow .style .token.string {
            color: #d4d4d4;
        }
        
        .prism-tomorrow .token.atrule,
        .prism-tomorrow .token.attr-value,
        .prism-tomorrow .token.keyword {
            color: #c586c0;
        }
        
        .prism-tomorrow .token.function {
            color: #dcdcaa;
        }
        
        .prism-tomorrow .token.class-name {
            color: #4ec9b0;
        }
        
        .prism-tomorrow .token.regex,
        .prism-tomorrow .token.important,
        .prism-tomorrow .token.variable {
            color: #d16969;
        }
        
        .prism-tomorrow .token.important,
        .prism-tomorrow .token.bold {
            font-weight: bold;
        }
        
        .prism-tomorrow .token.italic {
            font-style: italic;
        }
        
        /* Copy button styling */
        .code-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.5rem 1rem;
            background: rgba(255, 255, 255, 0.05);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            font-size: 0.75rem;
            color: rgba(255, 255, 255, 0.6);
        }
        
        .copy-button {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: rgba(255, 255, 255, 0.8);
            padding: 0.25rem 0.5rem;
            border-radius: 4px;
            font-size: 0.75rem;
            cursor: pointer;
            transition: all 0.2s;
        }
        
        .copy-button:hover {
            background: rgba(255, 255, 255, 0.2);
            color: white;
        }
        
        .copy-button.copied {
            background: #10b981;
            border-color: #10b981;
            color: white;
        }
    </style>
</head>
<body class="apple-font apple-bg text-white min-h-screen flex">
    <!-- Sidebar Navigation -->
    <aside class="hidden lg:block fixed top-0 left-0 h-full w-64 bg-black/80 border-r border-white/10 z-40 pt-24 px-6 overflow-y-auto">
        <nav class="space-y-2 text-white/80 text-base">
            <a href="#quickstart" class="block py-2 px-3 rounded hover:bg-white/10 transition flex items-center">
                <span class="mr-3">🚀</span>Quick Start
            </a>
            <div class="mt-4 mb-1 text-xs uppercase tracking-wider text-white/40">Core Concepts</div>
            <a href="#valueobjects" class="block py-2 px-3 rounded hover:bg-white/10 transition flex items-center">
                <span class="mr-3">📦</span>Value Objects
            </a>
            <a href="#storage" class="block py-2 px-3 rounded hover:bg-white/10 transition flex items-center">
                <span class="mr-3">💾</span>Storage
            </a>
            <a href="#renderer" class="block py-2 px-3 rounded hover:bg-white/10 transition flex items-center">
                <span class="mr-3">🎨</span>Renderer
            </a>
            <a href="#config" class="block py-2 px-3 rounded hover:bg-white/10 transition flex items-center">
                <span class="mr-3">⚙️</span>Config
            </a>
            <a href="#facade" class="block py-2 px-3 rounded hover:bg-white/10 transition flex items-center">
                <span class="mr-3">🏗️</span>Facade
            </a>
            <a href="#api" class="block py-2 px-3 rounded hover:bg-white/10 transition mt-4 flex items-center">
                <span class="mr-3">📚</span>API Reference
            </a>
            <a href="#styling" class="block py-2 px-3 rounded hover:bg-white/10 transition flex items-center">
                <span class="mr-3">🎭</span>Styling & Mode
            </a>
            <a href="#advanced" class="block py-2 px-3 rounded hover:bg-white/10 transition flex items-center">
                <span class="mr-3">🔧</span>Advanced Usage
            </a>
            <a href="#testing" class="block py-2 px-3 rounded hover:bg-white/10 transition flex items-center">
                <span class="mr-3">🧪</span>Testing
            </a>
            <a href="#roadmap" class="block py-2 px-3 rounded hover:bg-white/10 transition mt-4 flex items-center">
                <span class="mr-3">🗺️</span>Roadmap
            </a>
        </nav>
    </aside>
    <!-- Main Content (with sidebar offset) -->
    <div class="flex-1 ml-0 lg:ml-64">
        <!-- Navigation -->
        <nav class="fixed top-0 left-0 right-0 z-50 apple-card border-b border-white/10">
            <div class="max-w-7xl mx-auto px-6 py-4">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-4">
                        <div class="text-2xl">🔔</div>
                        <div>
                            <h1 class="text-xl font-semibold">PHP Notifikasi</h1>
                            <p class="text-sm text-white/60">Apple Design System Demo</p>
        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        <a href="#features" class="text-sm hover:text-white/80 smooth-transition">Features</a>
                        <a href="#documentation" class="text-sm hover:text-white/80 smooth-transition">Documentation</a>
                        <a href="#roadmap" class="text-sm hover:text-white/80 smooth-transition">Roadmap</a>
                        <a href="https://github.com/rzlco666/php-notifikasi" target="_blank" class="apple-button px-4 py-2 rounded-lg text-sm">
                            GitHub
                        </a>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <div class="pt-24 pb-16">
            <!-- Hero Section -->
            <section class="max-w-7xl mx-auto px-6 mb-16">
                <div class="text-center">
                    <h1 class="text-6xl font-bold mb-6 bg-gradient-to-r from-white to-white/80 bg-clip-text text-transparent">
                        iOS-Style Notifications
                    </h1>
                    <p class="text-xl text-white/70 mb-8 max-w-3xl mx-auto">
                        A modern, framework-agnostic PHP library for displaying floating notifications with Apple's design language. 
                        Built with clean architecture and comprehensive dark mode support.
                    </p>
                    <div class="flex justify-center space-x-4">
                        <a href="#demo" class="apple-button px-8 py-3 rounded-xl font-medium">
                            Try Demo
                        </a>
                        <a href="#documentation" class="apple-button px-8 py-3 rounded-xl font-medium">
                            View Documentation
                        </a>
                    </div>
                </div>
            </section>

            <!-- Demo Section -->
            <section id="demo" class="max-w-7xl mx-auto px-6 mb-16">
                <div class="apple-card rounded-2xl p-8">
                    <h2 class="text-3xl font-bold mb-8 text-center">Interactive Demo</h2>
                    
                    <!-- Dark Mode Section -->
                    <div class="mb-12">
                        <h3 class="text-xl font-semibold mb-6 flex items-center">
                            <span class="w-8 h-8 bg-white/10 rounded-full flex items-center justify-center mr-3">🌙</span>
                            Dark Mode
                    </h3>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                            <a href="?action=success_dark" class="apple-button p-4 rounded-xl text-center">
                                <div class="text-lg mb-2">✅</div>
                                <div class="text-sm font-medium">Success</div>
                            </a>
                            <a href="?action=error_dark" class="apple-button p-4 rounded-xl text-center">
                                <div class="text-lg mb-2">❌</div>
                                <div class="text-sm font-medium">Error</div>
                            </a>
                            <a href="?action=warning_dark" class="apple-button p-4 rounded-xl text-center">
                                <div class="text-lg mb-2">⚠️</div>
                                <div class="text-sm font-medium">Warning</div>
                            </a>
                            <a href="?action=info_dark" class="apple-button p-4 rounded-xl text-center">
                                <div class="text-lg mb-2">ℹ️</div>
                                <div class="text-sm font-medium">Info</div>
                        </a>
                    </div>
                </div>
                
                    <!-- Auto Mode Section -->
                    <div class="mb-12">
                        <h3 class="text-xl font-semibold mb-6 flex items-center">
                            <span class="w-8 h-8 bg-white/10 rounded-full flex items-center justify-center mr-3">🔄</span>
                            Auto Mode (System Theme)
                    </h3>
                        <div class="text-center">
                            <a href="?action=auto_mode" class="apple-button px-8 py-4 rounded-xl inline-flex items-center">
                                <span class="text-2xl mr-3">🔄</span>
                                <div>
                                    <div class="font-semibold">Auto Mode Demo</div>
                                    <div class="text-sm text-white/60">Adapts to system theme</div>
                                </div>
                            </a>
                        </div>
                        <div class="mt-4 p-4 bg-white/5 rounded-xl border border-white/10">
                            <div class="flex items-start">
                                <span class="text-blue-400 mr-3 mt-1">💡</span>
                                <div class="text-sm text-white/80">
                                    <strong>Auto Mode:</strong> Notifications automatically adapt to your system theme preference. 
                                    Try changing your system dark/light mode to see the effect!
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Style Demos -->
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <!-- Clean Style -->
                        <div>
                            <h3 class="text-xl font-semibold mb-6 flex items-center">
                                <span class="w-8 h-8 bg-white/10 rounded-full flex items-center justify-center mr-3">✨</span>
                                Clean Style
                            </h3>
                            <div class="grid grid-cols-2 gap-3">
                                <a href="?action=success_clean" class="apple-button p-3 rounded-lg text-center">
                                    <div class="text-sm mb-1">✅</div>
                                    <div class="text-xs">Success</div>
                                </a>
                                <a href="?action=error_clean" class="apple-button p-3 rounded-lg text-center">
                                    <div class="text-sm mb-1">❌</div>
                                    <div class="text-xs">Error</div>
                                </a>
                                <a href="?action=warning_clean" class="apple-button p-3 rounded-lg text-center">
                                    <div class="text-sm mb-1">⚠️</div>
                                    <div class="text-xs">Warning</div>
                                </a>
                                <a href="?action=info_clean" class="apple-button p-3 rounded-lg text-center">
                                    <div class="text-sm mb-1">ℹ️</div>
                                    <div class="text-xs">Info</div>
                        </a>
                    </div>
                </div>
                
                        <!-- Blur Style -->
                        <div>
                            <h3 class="text-xl font-semibold mb-6 flex items-center">
                                <span class="w-8 h-8 bg-white/10 rounded-full flex items-center justify-center mr-3">🧊</span>
                                Blur Style
                    </h3>
                            <div class="grid grid-cols-2 gap-3">
                                <a href="?action=success_blur" class="apple-button p-3 rounded-lg text-center">
                                    <div class="text-sm mb-1">✅</div>
                                    <div class="text-xs">Success</div>
                                </a>
                                <a href="?action=error_blur" class="apple-button p-3 rounded-lg text-center">
                                    <div class="text-sm mb-1">❌</div>
                                    <div class="text-xs">Error</div>
                                </a>
                                <a href="?action=warning_blur" class="apple-button p-3 rounded-lg text-center">
                                    <div class="text-sm mb-1">⚠️</div>
                                    <div class="text-xs">Warning</div>
                                </a>
                                <a href="?action=info_blur" class="apple-button p-3 rounded-lg text-center">
                                    <div class="text-sm mb-1">ℹ️</div>
                                    <div class="text-xs">Info</div>
                        </a>
                    </div>
                    </div>
                </div>
                
                    <!-- Liquid Glass & Colored -->
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mt-8">
                        <!-- Liquid Glass -->
                        <div>
                            <h3 class="text-xl font-semibold mb-6 flex items-center">
                                <span class="w-8 h-8 bg-white/10 rounded-full flex items-center justify-center mr-3">💎</span>
                                Liquid Glass
                    </h3>
                            <div class="grid grid-cols-2 gap-3">
                                <a href="?action=success_liquid_glass" class="apple-button p-3 rounded-lg text-center">
                                    <div class="text-sm mb-1">✅</div>
                                    <div class="text-xs">Success</div>
                                </a>
                                <a href="?action=error_liquid_glass" class="apple-button p-3 rounded-lg text-center">
                                    <div class="text-sm mb-1">❌</div>
                                    <div class="text-xs">Error</div>
                                </a>
                                <a href="?action=warning_liquid_glass" class="apple-button p-3 rounded-lg text-center">
                                    <div class="text-sm mb-1">⚠️</div>
                                    <div class="text-xs">Warning</div>
                                </a>
                                <a href="?action=info_liquid_glass" class="apple-button p-3 rounded-lg text-center">
                                    <div class="text-sm mb-1">ℹ️</div>
                                    <div class="text-xs">Info</div>
                        </a>
                    </div>
                </div>

                        <!-- Colored Style -->
                        <div>
                            <h3 class="text-xl font-semibold mb-6 flex items-center">
                                <span class="w-8 h-8 bg-white/10 rounded-full flex items-center justify-center mr-3">🎨</span>
                                Colored Style
                    </h3>
                            <div class="grid grid-cols-2 gap-3">
                                <a href="?action=success_colored" class="apple-button p-3 rounded-lg text-center">
                                    <div class="text-sm mb-1">✅</div>
                                    <div class="text-xs">Success</div>
                                </a>
                                <a href="?action=error_colored" class="apple-button p-3 rounded-lg text-center">
                                    <div class="text-sm mb-1">❌</div>
                                    <div class="text-xs">Error</div>
                                </a>
                                <a href="?action=warning_colored" class="apple-button p-3 rounded-lg text-center">
                                    <div class="text-sm mb-1">⚠️</div>
                                    <div class="text-xs">Warning</div>
                                </a>
                                <a href="?action=info_colored" class="apple-button p-3 rounded-lg text-center">
                                    <div class="text-sm mb-1">ℹ️</div>
                                    <div class="text-xs">Info</div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Advanced Demos -->
                    <div class="mt-12">
                        <h3 class="text-xl font-semibold mb-6 flex items-center">
                            <span class="w-8 h-8 bg-white/10 rounded-full flex items-center justify-center mr-3">🚀</span>
                            Advanced Features
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <a href="?action=multiple_clean" class="apple-button p-4 rounded-xl text-center">
                                <div class="text-2xl mb-2">🎭</div>
                                <div class="font-semibold">Multiple Clean</div>
                                <div class="text-xs text-white/60 mt-1">3 clean notifications</div>
                            </a>
                            <a href="?action=multiple" class="apple-button p-4 rounded-xl text-center">
                                <div class="text-2xl mb-2">🎭</div>
                                <div class="font-semibold">Multiple Colored</div>
                                <div class="text-xs text-white/60 mt-1">Different positions</div>
                            </a>
                            <a href="?action=positions" class="apple-button p-4 rounded-xl text-center">
                                <div class="text-2xl mb-2">📍</div>
                                <div class="font-semibold">All Positions</div>
                                <div class="text-xs text-white/60 mt-1">6 different positions</div>
                        </a>
                    </div>
                </div>
            </div>
            </section>
            
            <!-- Features Section -->
            <section id="features" class="max-w-7xl mx-auto px-6 mb-16">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold mb-4">Core Features</h2>
                    <p class="text-xl text-white/70">Everything you need for modern notification systems</p>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <div class="apple-card rounded-2xl p-6">
                        <div class="text-3xl mb-4">🎨</div>
                        <h3 class="text-xl font-semibold mb-3">Apple Design System</h3>
                        <p class="text-white/70 text-sm">Native iOS-style notifications with blur effects, liquid glass, and Apple's design language.</p>
                    </div>
                    
                    <div class="apple-card rounded-2xl p-6">
                        <div class="text-3xl mb-4">🌙</div>
                        <h3 class="text-xl font-semibold mb-3">Dark Mode Support</h3>
                        <p class="text-white/70 text-sm">Comprehensive dark mode with light, dark, and auto modes that adapt to system preferences.</p>
                    </div>
                    
                    <div class="apple-card rounded-2xl p-6">
                        <div class="text-3xl mb-4">📱</div>
                        <h3 class="text-xl font-semibold mb-3">Responsive Design</h3>
                        <p class="text-white/70 text-sm">Automatically adapts to mobile devices with smart positioning and touch-friendly interactions.</p>
                    </div>
                    
                    <div class="apple-card rounded-2xl p-6">
                        <div class="text-3xl mb-4">⚡</div>
                        <h3 class="text-xl font-semibold mb-3">Lightweight</h3>
                        <p class="text-white/70 text-sm">No external dependencies, pure PHP with optimized rendering and asset management.</p>
                    </div>
                    
                    <div class="apple-card rounded-2xl p-6">
                        <div class="text-3xl mb-4">🔧</div>
                        <h3 class="text-xl font-semibold mb-3">Framework Agnostic</h3>
                        <p class="text-white/70 text-sm">Works with Laravel, Symfony, CodeIgniter, or native PHP applications.</p>
                    </div>
                    
                    <div class="apple-card rounded-2xl p-6">
                        <div class="text-3xl mb-4">🏗️</div>
                        <h3 class="text-xl font-semibold mb-3">Clean Architecture</h3>
                        <p class="text-white/70 text-sm">Built with value objects, service classes, and dependency injection for maintainability.</p>
                    </div>
                </div>
            </section>

            <!-- Documentation Section (detailed, technical, with anchors) -->
            <section id="quickstart" class="max-w-5xl mx-auto px-6 mb-16 pt-8">
                <h2 class="text-3xl font-bold mb-4 flex items-center">
                    <span class="mr-3">🚀</span>Quick Start
                </h2>
                <p class="text-white/70 mb-6">Installasi dan penggunaan dasar PHP Notifikasi.</p>
                
                <div class="space-y-6">
                    <div>
                        <h3 class="text-xl font-semibold mb-3">Installation</h3>
                        <div class="code-block">
                            <div class="code-header">
                                <span>Via Composer</span>
                                <button class="copy-button" onclick="copyCode(this)">Copy</button>
            </div>
                            <pre><code class="language-bash">composer require rzlco666/php-notifikasi</code></pre>
                        </div>
                        <div class="text-sm text-white/60 mb-4">
                            <strong>Requirements:</strong> PHP 7.4+, Composer, session support (untuk SessionStorage)
                        </div>
                        <div class="text-sm text-white/60">
                            <strong>Troubleshooting:</strong> Jika error autoload, pastikan vendor/autoload.php sudah di-include
                        </div>
                    </div>
                    
                    <div>
                        <h3 class="text-xl font-semibold mb-3">Basic Usage</h3>
                        <div class="code-block">
                            <div class="code-header">
                                <span>Simple Example</span>
                                <button class="copy-button" onclick="copyCode(this)">Copy</button>
                            </div>
                            <pre><code class="language-php">// Include autoloader
require_once 'vendor/autoload.php';

// Import facade
use Rzlco\PhpNotifikasi\NotifikasiFacade as Notif;

// Add notifications
Notif::success('Success!', 'Data saved successfully');
Notif::error('Error!', 'Failed to save data');

// Render in template
echo Notif::render();</code></pre>
                        </div>
                        <div class="text-sm text-white/60">
                            <strong>Lifecycle:</strong> Add → Store → Render → Auto Clear
                        </div>
                    </div>
                    
                    <div>
                        <h3 class="text-xl font-semibold mb-3">Common Errors & Solutions</h3>
                        <div class="space-y-3 text-sm text-white/60">
                            <div>
                                <strong>Error:</strong> "Class 'Rzlco\PhpNotifikasi\NotifikasiFacade' not found"
                                <br><strong>Solution:</strong> Pastikan autoload.php sudah di-include
                            </div>
                            <div>
                                <strong>Error:</strong> "Session not started"
                                <br><strong>Solution:</strong> Panggil session_start() sebelum output apapun
                            </div>
                            <div>
                                <strong>Error:</strong> "Invalid notification type"
                                <br><strong>Solution:</strong> Gunakan type valid: success, error, warning, info, custom
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
            <section id="valueobjects" class="max-w-5xl mx-auto px-6 mb-16">
                <h2 class="text-2xl font-bold mb-4 flex items-center">
                    <span class="mr-3">📦</span>Value Objects
                </h2>
                <p class="mb-4 text-white/70">Semua data penting dibungkus value object untuk type safety, validasi, dan immutability.</p>
                
                <div class="space-y-6">
                    <div>
                        <h3 class="text-xl font-semibold mb-3">NotificationId</h3>
                        <p class="text-sm text-white/60 mb-3">UUID v4 yang auto-generate, immutable, dan validasi format.</p>
                        <div class="code-block">
                            <div class="code-header">
                                <span>NotificationId Usage</span>
                                <button class="copy-button" onclick="copyCode(this)">Copy</button>
                            </div>
                            <pre><code class="language-php">// Auto generate UUID v4
$id = NotificationId::generate(); // e.g., "550e8400-e29b-41d4-a716-446655440000"

// Restore from string (untuk storage)
$id = NotificationId::fromString("550e8400-e29b-41d4-a716-446655440000");

// Get string representation
$string = $id->toString();

// Validation
NotificationId::isValid("invalid-uuid"); // false
NotificationId::isValid("550e8400-e29b-41d4-a716-446655440000"); // true</code></pre>
                        </div>
                    </div>
                    
                    <div>
                        <h3 class="text-xl font-semibold mb-3">NotificationType</h3>
                        <p class="text-sm text-white/60 mb-3">Enum string dengan validasi strict, hanya menerima nilai yang valid.</p>
                        <div class="code-block">
                            <div class="code-header">
                                <span>NotificationType Usage</span>
                                <button class="copy-button" onclick="copyCode(this)">Copy</button>
                            </div>
                            <pre><code class="language-php">// Valid types
new NotificationType('success');   // ✅ OK
new NotificationType('error');     // ✅ OK
new NotificationType('warning');   // ✅ OK
new NotificationType('info');      // ✅ OK
new NotificationType('custom');    // ✅ OK

// Invalid type - throws exception
new NotificationType('invalid');   // ❌ InvalidNotificationTypeException

// Get all valid types
$types = NotificationType::getValidTypes();
// ['success', 'error', 'warning', 'info', 'custom']

// Check if valid
NotificationType::isValid('success'); // true
NotificationType::isValid('invalid'); // false</code></pre>
                        </div>
                    </div>
                    
                    <div>
                        <h3 class="text-xl font-semibold mb-3">NotificationOptions</h3>
                        <p class="text-sm text-white/60 mb-3">Container untuk semua opsi notifikasi dengan default values dan validasi.</p>
                        <div class="code-block">
                            <div class="code-header">
                                <span>NotificationOptions Usage</span>
                                <button class="copy-button" onclick="copyCode(this)">Copy</button>
                            </div>
                            <pre><code class="language-php">// Default options
$options = new NotificationOptions();
// position: 'top-right', duration: 5000, style: 'clean', 
// size: 'md', mode: 'light', dismissible: true, className: ''

// Custom options
$options = new NotificationOptions([
    'position' => 'bottom-left',
    'duration' => 8000,
    'style' => 'liquid-glass',
    'mode' => 'dark',
    'size' => 'lg'
]);

// Get specific option
$position = $options->getPosition(); // 'bottom-left'
$duration = $options->getDuration(); // 8000

// Get with default
$unknown = $options->get('unknown', 'default'); // 'default'

// Validation examples
new NotificationOptions(['position' => 'invalid']); // ❌ Exception
new NotificationOptions(['duration' => -1]);        // ❌ Exception</code></pre>
                        </div>
                        
                        <div class="mt-4">
                            <h4 class="text-lg font-semibold mb-2">Valid Options</h4>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm text-white/60">
                                <div>
                                    <strong>Positions:</strong> top-left, top-right, top-center, bottom-left, bottom-right, bottom-center
                                </div>
                                <div>
                                    <strong>Styles:</strong> clean, colored, blur, liquid-glass
                                </div>
                                <div>
                                    <strong>Sizes:</strong> sm, md, lg
                                </div>
                                <div>
                                    <strong>Modes:</strong> light, dark, auto
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section id="storage" class="max-w-5xl mx-auto px-6 mb-16">
                <h2 class="text-2xl font-bold mb-4 flex items-center">
                    <span class="mr-3">💾</span>Storage
                </h2>
                <p class="mb-4 text-white/70">Abstraksi storage untuk menyimpan notifikasi dengan interface yang konsisten.</p>
                
                <div class="space-y-6">
                    <div>
                        <h3 class="text-xl font-semibold mb-3">StorageInterface</h3>
                        <p class="text-sm text-white/60 mb-3">Interface yang harus diimplementasi oleh semua storage.</p>
                        <div class="code-block">
                            <div class="code-header">
                                <span>StorageInterface</span>
                                <button class="copy-button" onclick="copyCode(this)">Copy</button>
                            </div>
                            <pre><code class="language-php">interface StorageInterface
{
    public function add(Notification $notification): void;
    public function all(): array;
    public function clear(): void;
    public function getByType(string $type): array;
    public function remove(string $id): bool;
}</code></pre>
                        </div>
                    </div>
                    
                    <div>
                        <h3 class="text-xl font-semibold mb-3">Built-in Storage</h3>
                        
                        <div class="space-y-4">
                            <div>
                                <h4 class="text-lg font-semibold mb-2">SessionStorage (Default)</h4>
                                <p class="text-sm text-white/60 mb-2">Menyimpan notifikasi di PHP session, perfect untuk flash messages.</p>
                                <div class="code-block">
                                    <div class="code-header">
                                        <span>SessionStorage Usage</span>
                                        <button class="copy-button" onclick="copyCode(this)">Copy</button>
                                    </div>
                                    <pre><code class="language-php">// Default (auto-clear setelah render)
$notif = new Notifikasi(new SessionStorage());

// Manual clear
$notif->clear();

// Persist across requests
session_start();
Notif::success('Data saved');
// Redirect ke halaman lain
header('Location: /success');
// Di halaman baru, notifikasi masih ada
echo Notif::render(); // Menampilkan notifikasi</code></pre>
                                </div>
                            </div>
                            
                            <div>
                                <h4 class="text-lg font-semibold mb-2">ArrayStorage</h4>
                                <p class="text-sm text-white/60 mb-2">In-memory storage, hilang setelah request selesai.</p>
                                <div class="code-block">
                                    <div class="code-header">
                                        <span>ArrayStorage Usage</span>
                                        <button class="copy-button" onclick="copyCode(this)">Copy</button>
                                    </div>
                                    <pre><code class="language-php">// In-memory storage
$notif = new Notifikasi(new ArrayStorage());

// Notifikasi hanya hidup selama request
Notif::success('Temporary message');
echo Notif::render(); // OK
// Request selesai, notifikasi hilang</code></pre>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div>
                        <h3 class="text-xl font-semibold mb-3">Custom Storage</h3>
                        <p class="text-sm text-white/60 mb-3">Implementasi storage custom untuk Redis, Database, atau storage lainnya.</p>
                        <div class="code-block">
                            <div class="code-header">
                                <span>RedisStorage Implementation</span>
                                <button class="copy-button" onclick="copyCode(this)">Copy</button>
                            </div>
                            <pre><code class="language-php">class RedisStorage implements StorageInterface 
{
    private Redis $redis;
    
    public function __construct(Redis $redis) {
        $this->redis = $redis;
    }
    
    public function add(Notification $notification): void {
        $this->redis->lpush('notifications', json_encode($notification->toArray()));
    }
    
    public function all(): array {
        $data = $this->redis->lrange('notifications', 0, -1);
        return array_map(fn($item) => Notification::fromArray(json_decode($item, true)), $data);
    }
    
    public function clear(): void {
        $this->redis->del('notifications');
    }
    
    public function getByType(string $type): array {
        return array_filter($this->all(), fn($n) => $n->getType() === $type);
    }
    
    public function remove(string $id): bool {
        // Implementation untuk remove by ID
        return true;
    }
}

// Usage
$redis = new Redis();
$redis->connect('127.0.0.1', 6379);
$notif = new Notifikasi(new RedisStorage($redis));</code></pre>
                        </div>
                    </div>
                </div>
            </section>
            
            <section id="renderer" class="max-w-5xl mx-auto px-6 mb-16">
                <h2 class="text-2xl font-bold mb-4 flex items-center">
                    <span class="mr-3">🎨</span>Renderer
                </h2>
                <p class="mb-4 text-white/70">Sistem rendering untuk mengubah notifikasi menjadi output yang diinginkan (HTML, JSON, dll).</p>
                
                <div class="space-y-6">
                    <div>
                        <h3 class="text-xl font-semibold mb-3">RendererInterface</h3>
                        <p class="text-sm text-white/60 mb-3">Interface dasar untuk semua renderer.</p>
                        <div class="code-block">
                            <div class="code-header">
                                <span>RendererInterface</span>
                                <button class="copy-button" onclick="copyCode(this)">Copy</button>
                            </div>
                            <pre><code class="language-php">interface RendererInterface
{
    public function render(array $notifications, array $config = []): string;
}</code></pre>
                        </div>
                    </div>
                    
                    <div>
                        <h3 class="text-xl font-semibold mb-3">HtmlRenderer (Default)</h3>
                        <p class="text-sm text-white/60 mb-3">Renderer default yang menghasilkan HTML dengan Tailwind CSS dan Apple design system.</p>
                        
                        <div class="space-y-4">
                            <div>
                                <h4 class="text-lg font-semibold mb-2">Features</h4>
                                <ul class="list-disc ml-6 text-sm text-white/60">
                                    <li>Auto-include CSS dan JavaScript</li>
                                    <li>Apple design system dengan blur effects</li>
                                    <li>Dark mode support (light, dark, auto)</li>
                                    <li>Responsive design</li>
                                    <li>Auto-dismiss dengan progress bar</li>
                                    <li>6 position support</li>
                                    <li>4 style variants (clean, colored, blur, liquid-glass)</li>
                                </ul>
                            </div>
                            
                            <div>
                                <h4 class="text-lg font-semibold mb-2">Usage</h4>
                                <div class="code-block">
                                    <div class="code-header">
                                        <span>HtmlRenderer Usage</span>
                                        <button class="copy-button" onclick="copyCode(this)">Copy</button>
                                    </div>
                                    <pre><code class="language-php">// Default HTML renderer
$notif = new Notifikasi(null, new HtmlRenderer());

// Custom config
$renderer = new HtmlRenderer();
$html = $renderer->render($notifications, [
    'include_css' => true,
    'include_js' => true,
    'theme' => 'ios'
]);</code></pre>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div>
                        <h3 class="text-xl font-semibold mb-3">Custom Renderer</h3>
                        <p class="text-sm text-white/60 mb-3">Implementasi renderer custom untuk JSON, API response, atau format lainnya.</p>
                        <div class="code-block">
                            <div class="code-header">
                                <span>JsonRenderer Implementation</span>
                                <button class="copy-button" onclick="copyCode(this)">Copy</button>
                            </div>
                            <pre><code class="language-php">class JsonRenderer implements RendererInterface 
{
    public function render(array $notifications, array $config = []): string 
    {
        return json_encode([
            'notifications' => array_map(fn($n) => $n->toArray(), $notifications),
            'config' => $config,
            'timestamp' => time()
        ]);
    }
}

// Usage untuk API
$notif = new Notifikasi(null, new JsonRenderer());
header('Content-Type: application/json');
echo $notif->render();</code></pre>
                        </div>
                    </div>
                </div>
            </section>
            
            <section id="config" class="max-w-5xl mx-auto px-6 mb-16">
                <h2 class="text-2xl font-bold mb-4 flex items-center">
                    <span class="mr-3">⚙️</span>Config
                </h2>
                <p class="mb-4 text-white/70">Konfigurasi global untuk mengatur behavior default library.</p>
                
                <div class="space-y-6">
                    <div>
                        <h3 class="text-xl font-semibold mb-3">Default Configuration</h3>
                        <div class="code-block">
                            <div class="code-header">
                                <span>Default Config Values</span>
                                <button class="copy-button" onclick="copyCode(this)">Copy</button>
                            </div>
                            <pre><code class="language-php">// Default config values
[
    'default_position' => 'top-right',
    'default_duration' => 5000,
    'default_style' => 'clean',
    'default_size' => 'md',
    'default_mode' => 'light',
    'include_css' => true,
    'include_js' => true,
    'theme' => 'ios'
]</code></pre>
                        </div>
                    </div>
                    
                    <div>
                        <h3 class="text-xl font-semibold mb-3">Global Configuration</h3>
                        <div class="code-block">
                            <div class="code-header">
                                <span>Global Config Usage</span>
                                <button class="copy-button" onclick="copyCode(this)">Copy</button>
                            </div>
                            <pre><code class="language-php">// Set global config
Notif::config([
    'default_position' => 'bottom-right',
    'default_duration' => 8000,
    'default_style' => 'liquid-glass',
    'default_mode' => 'auto',
    'theme' => 'ios'
]);

// Get config value
$position = Notif::getConfig('default_position'); // 'bottom-right'
$allConfig = Notif::getConfig(); // array semua config</code></pre>
                        </div>
                    </div>
                    
                    <div>
                        <h3 class="text-xl font-semibold mb-3">Laravel Configuration</h3>
                        <p class="text-sm text-white/60 mb-3">Konfigurasi khusus untuk Laravel framework.</p>
                        <div class="code-block">
                            <div class="code-header">
                                <span>Laravel Config</span>
                                <button class="copy-button" onclick="copyCode(this)">Copy</button>
                            </div>
                            <pre><code class="language-php">// config/notifikasi.php
return [
    'default_position' => 'top-right',
    'default_duration' => 5000,
    'default_style' => 'clean',
    'default_size' => 'md',
    'default_mode' => 'light',
    'include_css' => true,
    'include_js' => true,
    'theme' => 'ios'
];

// Publish config
php artisan vendor:publish --provider="Rzlco\PhpNotifikasi\Integration\Laravel\NotifikasiServiceProvider"</code></pre>
                        </div>
                    </div>
                    
                    <div>
                        <h3 class="text-xl font-semibold mb-3">Configuration Validation</h3>
                        <p class="text-sm text-white/60 mb-3">Semua config value divalidasi untuk memastikan nilai yang valid.</p>
                        <div class="code-block">
                            <div class="code-header">
                                <span>Config Validation</span>
                                <button class="copy-button" onclick="copyCode(this)">Copy</button>
                            </div>
                            <pre><code class="language-php">// Valid config
Notif::config(['default_position' => 'top-right']); // ✅ OK

// Invalid config - throws exception
Notif::config(['default_position' => 'invalid']); // ❌ Exception
Notif::config(['default_duration' => -1]);       // ❌ Exception
Notif::config(['default_style' => 'invalid']);   // ❌ Exception</code></pre>
                        </div>
                    </div>
                </div>
            </section>
            
            <section id="facade" class="max-w-5xl mx-auto px-6 mb-16">
                <h2 class="text-2xl font-bold mb-4 flex items-center">
                    <span class="mr-3">🏗️</span>Facade
                </h2>
                <p class="mb-4 text-white/70">Static facade untuk kemudahan akses dengan singleton pattern.</p>
                
                <div class="space-y-6">
                    <div>
                        <h3 class="text-xl font-semibold mb-3">Singleton Pattern</h3>
                        <p class="text-sm text-white/60 mb-3">Facade menggunakan singleton pattern untuk memastikan hanya ada satu instance.</p>
                        <div class="code-block">
                            <div class="code-header">
                                <span>Singleton Pattern Usage</span>
                                <button class="copy-button" onclick="copyCode(this)">Copy</button>
                            </div>
                            <pre><code class="language-php">// Auto-create instance
Notif::success('Hello'); // Instance dibuat otomatis

// Get instance
$instance = Notif::getInstance();

// Set custom instance
$customNotif = new Notifikasi(new RedisStorage());
Notif::setInstance($customNotif);

// Reset instance (untuk testing)
Notif::reset();</code></pre>
                        </div>
                    </div>
                    
                    <div>
                        <h3 class="text-xl font-semibold mb-3">Facade vs Instance</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <h4 class="text-lg font-semibold mb-2">Facade (Static)</h4>
                                <div class="code-block">
                                    <div class="code-header">
                                        <span>Facade Usage</span>
                                        <button class="copy-button" onclick="copyCode(this)">Copy</button>
                                    </div>
                                    <pre><code class="language-php">// Simple dan mudah
Notif::success('Title', 'Message');
Notif::error('Title', 'Message');
echo Notif::render();

// Global config
Notif::config(['theme' => 'ios']);</code></pre>
                                </div>
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold mb-2">Instance (Object)</h4>
                                <div class="code-block">
                                    <div class="code-header">
                                        <span>Instance Usage</span>
                                        <button class="copy-button" onclick="copyCode(this)">Copy</button>
                                    </div>
                                    <pre><code class="language-php">// Lebih fleksibel
$notif = new Notifikasi(
    new RedisStorage(),
    new JsonRenderer(),
    ['theme' => 'ios']
);

$notif->success('Title', 'Message');
echo $notif->render();</code></pre>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div>
                        <h3 class="text-xl font-semibold mb-3">Testing dengan Facade</h3>
                        <p class="text-sm text-white/60 mb-3">Facade bisa di-reset untuk testing yang clean.</p>
                        <div class="code-block">
                            <div class="code-header">
                                <span>Testing with Facade</span>
                                <button class="copy-button" onclick="copyCode(this)">Copy</button>
                            </div>
                            <pre><code class="language-php">// Dalam test
class NotificationTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        Notif::reset(); // Reset instance
    }
    
    public function testNotification()
    {
        Notif::success('Test', 'Message');
        $this->assertTrue(Notif::hasNotifications());
    }
}</code></pre>
                        </div>
                    </div>
                </div>
            </section>
            <section id="apireference" class="max-w-5xl mx-auto px-6 mb-16">
                <h2 class="text-2xl font-bold mb-4 flex items-center">
                    <span class="mr-3">📚</span>API Reference
                </h2>
                <p class="mb-4 text-white/70">Dokumentasi lengkap semua method dan property yang tersedia.</p>
                
                <div class="space-y-6">
                    <div>
                        <h3 class="text-xl font-semibold mb-3">Facade Methods</h3>
                        
                        <div class="space-y-4">
                            <div>
                                <h4 class="text-lg font-semibold mb-2">Notification Methods</h4>
                                <div class="code-block p-4 mb-2 text-xs">
                                    <code>// Add notifications
Notif::success(string $title, string $message = '', array $options = []): void
Notif::error(string $title, string $message = '', array $options = []): void
Notif::warning(string $title, string $message = '', array $options = []): void
Notif::info(string $title, string $message = '', array $options = []): void
Notif::custom(string $title, string $message = '', array $options = []): void

// Examples
Notif::success('Success!', 'Data saved successfully');
Notif::error('Error!', 'Failed to save data', ['duration' => 10000]);
Notif::warning('Warning!', 'Please check your input');
Notif::info('Info', 'New update available');
Notif::custom('Custom', 'Custom notification', ['style' => 'liquid-glass']);</code>
                                </div>
                            </div>
                            
                            <div>
                                <h4 class="text-lg font-semibold mb-2">Utility Methods</h4>
                                <div class="code-block p-4 mb-2 text-xs">
                                    <code>// Check notifications
Notif::hasNotifications(): bool
Notif::count(): int
Notif::getNotifications(): array

// Clear notifications
Notif::clear(): void

// Render
Notif::render(): string

// Configuration
Notif::config(array $config): void
Notif::getConfig(string $key = null): mixed

// Instance management
Notif::getInstance(): Notifikasi
Notif::setInstance(Notifikasi $instance): void
Notif::reset(): void</code>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div>
                        <h3 class="text-xl font-semibold mb-3">Instance Methods</h3>
                        <div class="code-block p-4 mb-3 text-xs">
                            <code>// Constructor
new Notifikasi(
    ?StorageInterface $storage = null,
    ?RendererInterface $renderer = null,
    array $config = []
);

// Methods (sama dengan facade)
$notif->success(string $title, string $message = '', array $options = []): void
$notif->error(string $title, string $message = '', array $options = []): void
$notif->warning(string $title, string $message = '', array $options = []): void
$notif->info(string $title, string $message = '', array $options = []): void
$notif->custom(string $title, string $message = '', array $options = []): void
$notif->hasNotifications(): bool
$notif->count(): int
$notif->getNotifications(): array
$notif->clear(): void
$notif->render(): string</code>
                        </div>
                    </div>
                    
                    <div>
                        <h3 class="text-xl font-semibold mb-3">Value Object Methods</h3>
                        
                        <div class="space-y-4">
                            <div>
                                <h4 class="text-lg font-semibold mb-2">NotificationId</h4>
                                <div class="code-block p-4 mb-2 text-xs">
                                    <code>// Static methods
NotificationId::generate(): NotificationId
NotificationId::fromString(string $id): NotificationId
NotificationId::isValid(string $id): bool

// Instance methods
$id->toString(): string
$id->equals(NotificationId $other): bool</code>
                                </div>
                            </div>
                            
                            <div>
                                <h4 class="text-lg font-semibold mb-2">NotificationType</h4>
                                <div class="code-block p-4 mb-2 text-xs">
                                    <code>// Static methods
NotificationType::getValidTypes(): array
NotificationType::isValid(string $type): bool

// Constructor
new NotificationType(string $type)

// Instance methods
$type->getValue(): string
$type->equals(NotificationType $other): bool</code>
                                </div>
                            </div>
                            
                            <div>
                                <h4 class="text-lg font-semibold mb-2">NotificationOptions</h4>
                                <div class="code-block p-4 mb-2 text-xs">
                                    <code>// Constructor
new NotificationOptions(array $options = [])

// Getter methods
$options->getPosition(): string
$options->getDuration(): int
$options->getStyle(): string
$options->getSize(): string
$options->getMode(): string
$options->isDismissible(): bool
$options->getClassName(): string
$options->get(string $key, mixed $default = null): mixed
$options->toArray(): array</code>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
            <section id="styling" class="max-w-5xl mx-auto px-6 mb-16">
                <h2 class="text-2xl font-bold mb-4 flex items-center">
                    <span class="mr-3">🎭</span>Styling & Mode
                </h2>
                <p class="mb-4 text-white/70">Sistem styling dengan Apple design system dan dark mode support.</p>
                
                <div class="space-y-6">
                    <div>
                        <h3 class="text-xl font-semibold mb-3">Available Styles</h3>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <h4 class="text-lg font-semibold mb-2">Clean Style</h4>
                                <p class="text-sm text-white/60 mb-2">Style minimalis dengan border dan shadow.</p>
                                <div class="code-block">
                                    <div class="code-header">
                                        <span>Clean Style</span>
                                        <button class="copy-button" onclick="copyCode(this)">Copy</button>
                                    </div>
                                    <pre><code class="language-php">Notif::success('Title', 'Message', ['style' => 'clean']);</code></pre>
                                </div>
                            </div>
                            
                            <div>
                                <h4 class="text-lg font-semibold mb-2">Colored Style</h4>
                                <p class="text-sm text-white/60 mb-2">Style dengan background color sesuai type.</p>
                                <div class="code-block">
                                    <div class="code-header">
                                        <span>Colored Style</span>
                                        <button class="copy-button" onclick="copyCode(this)">Copy</button>
                                    </div>
                                    <pre><code class="language-php">Notif::success('Title', 'Message', ['style' => 'colored']);</code></pre>
                                </div>
                            </div>
                            
                            <div>
                                <h4 class="text-lg font-semibold mb-2">Blur Style</h4>
                                <p class="text-sm text-white/60 mb-2">Style dengan backdrop blur effect.</p>
                                <div class="code-block">
                                    <div class="code-header">
                                        <span>Blur Style</span>
                                        <button class="copy-button" onclick="copyCode(this)">Copy</button>
                                    </div>
                                    <pre><code class="language-php">Notif::success('Title', 'Message', ['style' => 'blur']);</code></pre>
                                </div>
                            </div>
                            
                            <div>
                                <h4 class="text-lg font-semibold mb-2">Liquid Glass</h4>
                                <p class="text-sm text-white/60 mb-2">Style premium dengan glass morphism.</p>
                                <div class="code-block">
                                    <div class="code-header">
                                        <span>Liquid Glass Style</span>
                                        <button class="copy-button" onclick="copyCode(this)">Copy</button>
                                    </div>
                                    <pre><code class="language-php">Notif::success('Title', 'Message', ['style' => 'liquid-glass']);</code></pre>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div>
                        <h3 class="text-xl font-semibold mb-3">Dark Mode Support</h3>
                        
                        <div class="space-y-4">
                            <div>
                                <h4 class="text-lg font-semibold mb-2">Mode Options</h4>
                                <div class="code-block p-4 mb-2 text-xs">
                                    <code>// Light mode (default)
Notif::success('Title', 'Message', ['mode' => 'light']);

// Dark mode
Notif::success('Title', 'Message', ['mode' => 'dark']);

// Auto mode (detect system preference)
Notif::success('Title', 'Message', ['mode' => 'auto']);

// Global config
Notif::config(['default_mode' => 'auto']);</code>
                                </div>
                            </div>
                            
                            <div>
                                <h4 class="text-lg font-semibold mb-2">Auto Detection</h4>
                                <p class="text-sm text-white/60 mb-2">JavaScript otomatis detect system preference dan apply dark mode.</p>
                                <div class="code-block p-4 mb-2 text-xs">
                                    <code>// CSS variables untuk dark mode
:root {
    --notif-bg: #ffffff;
    --notif-text: #000000;
}

[data-theme="dark"] {
    --notif-bg: #1a1a1a;
    --notif-text: #ffffff;
}

// JavaScript auto detection
if (window.matchMedia('(prefers-color-scheme: dark)').matches) {
    document.documentElement.setAttribute('data-theme', 'dark');
}</code>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div>
                        <h3 class="text-xl font-semibold mb-3">Custom Styling</h3>
                        <p class="text-sm text-white/60 mb-3">Override CSS atau tambah custom class untuk styling yang lebih spesifik.</p>
                        <div class="code-block p-4 mb-3 text-xs">
                            <code>// Custom class
Notif::success('Title', 'Message', ['className' => 'my-custom-notification']);

// Custom CSS
.my-custom-notification {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border-radius: 20px;
    box-shadow: 0 20px 40px rgba(0,0,0,0.1);
}

// Override default styles
.notification-container {
    --notif-bg: #your-color;
    --notif-text: #your-color;
}</code>
                        </div>
                    </div>
                </div>
            </section>
            
            <section id="advanced" class="max-w-5xl mx-auto px-6 mb-16">
                <h2 class="text-2xl font-bold mb-4 flex items-center">
                    <span class="mr-3">🔧</span>Advanced Usage
                </h2>
                <p class="mb-4 text-white/70">Penggunaan advanced untuk custom storage, renderer, dan integration.</p>
                
                <div class="space-y-6">
                    <div>
                        <h3 class="text-xl font-semibold mb-3">Custom Storage Implementation</h3>
                        <p class="text-sm text-white/60 mb-3">Implementasi storage custom untuk database, Redis, atau storage lainnya.</p>
                        <div class="code-block p-4 mb-3 text-xs">
                            <code>class DatabaseStorage implements StorageInterface 
{
    private PDO $pdo;
    
    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }
    
    public function add(Notification $notification): void {
        $stmt = $this->pdo->prepare("
            INSERT INTO notifications (id, type, title, message, options, created_at) 
            VALUES (?, ?, ?, ?, ?, ?)
        ");
        $stmt->execute([
            $notification->getId()->toString(),
            $notification->getType()->getValue(),
            $notification->getTitle(),
            $notification->getMessage(),
            json_encode($notification->getOptions()->toArray()),
            date('Y-m-d H:i:s')
        ]);
    }
    
    public function all(): array {
        $stmt = $this->pdo->query("SELECT * FROM notifications ORDER BY created_at DESC");
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return array_map(function($row) {
            return new Notification(
                NotificationId::fromString($row['id']),
                new NotificationType($row['type']),
                $row['title'],
                $row['message'],
                new NotificationOptions(json_decode($row['options'], true))
            );
        }, $rows);
    }
    
    public function clear(): void {
        $this->pdo->exec("DELETE FROM notifications");
    }
    
    public function getByType(string $type): array {
        $stmt = $this->pdo->prepare("SELECT * FROM notifications WHERE type = ?");
        $stmt->execute([$type]);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return array_map(function($row) {
            return new Notification(
                NotificationId::fromString($row['id']),
                new NotificationType($row['type']),
                $row['title'],
                $row['message'],
                new NotificationOptions(json_decode($row['options'], true))
            );
        }, $rows);
    }
    
    public function remove(string $id): bool {
        $stmt = $this->pdo->prepare("DELETE FROM notifications WHERE id = ?");
        return $stmt->execute([$id]);
    }
}</code>
                        </div>
                    </div>
                    
                    <div>
                        <h3 class="text-xl font-semibold mb-3">Custom Renderer Implementation</h3>
                        <p class="text-sm text-white/60 mb-3">Implementasi renderer custom untuk format output yang berbeda.</p>
                        <div class="code-block p-4 mb-3 text-xs">
                            <code>class ApiRenderer implements RendererInterface 
{
    public function render(array $notifications, array $config = []): string 
    {
        $data = [
            'success' => true,
            'notifications' => array_map(function($notification) {
                return [
                    'id' => $notification->getId()->toString(),
                    'type' => $notification->getType()->getValue(),
                    'title' => $notification->getTitle(),
                    'message' => $notification->getMessage(),
                    'options' => $notification->getOptions()->toArray(),
                    'timestamp' => time()
                ];
            }, $notifications),
            'count' => count($notifications),
            'config' => $config
        ];
        
        return json_encode($data, JSON_PRETTY_PRINT);
    }
}

// Usage untuk API
$notif = new Notifikasi(null, new ApiRenderer());
header('Content-Type: application/json');
echo $notif->render();</code>
                        </div>
                    </div>
                    
                    <div>
                        <h3 class="text-xl font-semibold mb-3">Laravel Integration</h3>
                        <p class="text-sm text-white/60 mb-3">Integration dengan Laravel framework.</p>
                        <div class="code-block p-4 mb-3 text-xs">
                            <code>// Service Provider
class NotifikasiServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton('notifikasi', function ($app) {
            return new Notifikasi(
                new SessionStorage(),
                new HtmlRenderer(),
                config('notifikasi', [])
            );
        });
    }
    
    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../config/notifikasi.php' => config_path('notifikasi.php'),
        ], 'notifikasi-config');
    }
}

// Facade
class Notif extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'notifikasi';
    }
}

// Usage di controller
use App\Facades\Notif;

public function store(Request $request)
{
    // Save data
    $user = User::create($request->validated());
    
    // Add notification
    Notif::success('Success!', 'User created successfully');
    
    return redirect()->route('users.index');
}</code>
                        </div>
                    </div>
                    
                    <div>
                        <h3 class="text-xl font-semibold mb-3">Middleware Integration</h3>
                        <p class="text-sm text-white/60 mb-3">Middleware untuk auto-inject notifikasi ke response.</p>
                        <div class="code-block p-4 mb-3 text-xs">
                            <code>class InjectNotifications
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        
        // Inject notifications ke HTML response
        if ($response instanceof \Illuminate\Http\Response) {
            $content = $response->getContent();
            
            // Inject sebelum closing body tag
            $notifications = Notif::render();
            $content = str_replace('</body>', $notifications . '</body>', $content);
            
            $response->setContent($content);
        }
        
        return $response;
    }
}

// Register middleware
Route::middleware(['web', 'notifications'])->group(function () {
    // Routes
});</code>
                        </div>
                    </div>
                </div>
            </section>
            
            <section id="testing" class="max-w-5xl mx-auto px-6 mb-16">
                <h2 class="text-2xl font-bold mb-4 flex items-center">
                    <span class="mr-3">🧪</span>Testing
                </h2>
                <p class="mb-4 text-white/70">Strategi testing untuk memastikan library berfungsi dengan baik.</p>
                
                <div class="space-y-6">
                    <div>
                        <h3 class="text-xl font-semibold mb-3">Unit Testing</h3>
                        <p class="text-sm text-white/60 mb-3">Test individual components dan value objects.</p>
                        <div class="code-block p-4 mb-3 text-xs">
                            <code>class NotificationTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        Notif::reset(); // Reset facade instance
    }
    
    public function test_success_notification()
    {
        Notif::success('Test Title', 'Test Message');
        
        $this->assertTrue(Notif::hasNotifications());
        $this->assertEquals(1, Notif::count());
        
        $notifications = Notif::getNotifications();
        $notification = $notifications[0];
        
        $this->assertEquals('Test Title', $notification->getTitle());
        $this->assertEquals('Test Message', $notification->getMessage());
        $this->assertEquals('success', $notification->getType()->getValue());
    }
    
    public function test_notification_options()
    {
        Notif::success('Title', 'Message', [
            'position' => 'bottom-left',
            'duration' => 8000,
            'style' => 'liquid-glass'
        ]);
        
        $notifications = Notif::getNotifications();
        $options = $notifications[0]->getOptions();
        
        $this->assertEquals('bottom-left', $options->getPosition());
        $this->assertEquals(8000, $options->getDuration());
        $this->assertEquals('liquid-glass', $options->getStyle());
    }
    
    public function test_invalid_notification_type()
    {
        $this->expectException(InvalidNotificationTypeException::class);
        new NotificationType('invalid');
    }
    
    public function test_invalid_notification_options()
    {
        $this->expectException(InvalidNotificationOptionsException::class);
        new NotificationOptions(['position' => 'invalid']);
    }
}</code>
                        </div>
                    </div>
                    
                    <div>
                        <h3 class="text-xl font-semibold mb-3">Integration Testing</h3>
                        <p class="text-sm text-white/60 mb-3">Test integration dengan storage dan renderer.</p>
                        <div class="code-block p-4 mb-3 text-xs">
                            <code>class StorageIntegrationTest extends TestCase
{
    public function test_session_storage()
    {
        session_start();
        
        $storage = new SessionStorage();
        $notif = new Notifikasi($storage);
        
        $notif->success('Test', 'Message');
        
        $this->assertTrue($notif->hasNotifications());
        $this->assertEquals(1, $notif->count());
        
        // Test persistence
        $notif2 = new Notifikasi($storage);
        $this->assertTrue($notif2->hasNotifications());
        
        // Test clear
        $notif2->clear();
        $this->assertFalse($notif2->hasNotifications());
    }
    
    public function test_array_storage()
    {
        $storage = new ArrayStorage();
        $notif = new Notifikasi($storage);
        
        $notif->success('Test', 'Message');
        
        $this->assertTrue($notif->hasNotifications());
        
        // Test no persistence
        $notif2 = new Notifikasi(new ArrayStorage());
        $this->assertFalse($notif2->hasNotifications());
    }
}

class RendererIntegrationTest extends TestCase
{
    public function test_html_renderer()
    {
        $renderer = new HtmlRenderer();
        $notif = new Notifikasi(null, $renderer);
        
        $notif->success('Test', 'Message');
        
        $html = $notif->render();
        
        $this->assertStringContainsString('Test', $html);
        $this->assertStringContainsString('Message', $html);
        $this->assertStringContainsString('success', $html);
        $this->assertStringContainsString('notification', $html);
    }
    
    public function test_json_renderer()
    {
        $renderer = new JsonRenderer();
        $notif = new Notifikasi(null, $renderer);
        
        $notif->success('Test', 'Message');
        
        $json = $notif->render();
        $data = json_decode($json, true);
        
        $this->assertIsArray($data);
        $this->assertArrayHasKey('notifications', $data);
        $this->assertEquals(1, count($data['notifications']));
        $this->assertEquals('Test', $data['notifications'][0]['title']);
    }
}</code>
                        </div>
                    </div>
                    
                    <div>
                        <h3 class="text-xl font-semibold mb-3">Performance Testing</h3>
                        <p class="text-sm text-white/60 mb-3">Test performance untuk memastikan library efisien.</p>
                        <div class="code-block p-4 mb-3 text-xs">
                            <code>class PerformanceTest extends TestCase
{
    public function test_mass_notification_creation()
    {
        $start = microtime(true);
        
        for ($i = 0; $i < 1000; $i++) {
            Notif::success("Title $i", "Message $i");
        }
        
        $end = microtime(true);
        $duration = $end - $start;
        
        $this->assertLessThan(1.0, $duration); // Should complete in less than 1 second
        $this->assertEquals(1000, Notif::count());
    }
    
    public function test_memory_usage()
    {
        $memoryBefore = memory_get_usage();
        
        for ($i = 0; $i < 100; $i++) {
            Notif::success("Title $i", "Message $i");
        }
        
        $memoryAfter = memory_get_usage();
        $memoryUsed = $memoryAfter - $memoryBefore;
        
        $this->assertLessThan(1024 * 1024, $memoryUsed); // Less than 1MB
    }
    
    public function test_render_performance()
    {
        // Add notifications
        for ($i = 0; $i < 100; $i++) {
            Notif::success("Title $i", "Message $i");
        }
        
        $start = microtime(true);
        $html = Notif::render();
        $end = microtime(true);
        
        $duration = $end - $start;
        $this->assertLessThan(0.1, $duration); // Should render in less than 100ms
    }
}</code>
                        </div>
                    </div>
                </div>
            </section>
            
            <section id="roadmap" class="max-w-5xl mx-auto px-6 mb-16">
                <h2 class="text-2xl font-bold mb-4 flex items-center">
                    <span class="mr-3">🗺️</span>Roadmap
                </h2>
                <p class="mb-4 text-white/70">Development roadmap untuk fitur-fitur yang akan datang (Timeline: July 2025).</p>
                
                <div class="space-y-6">
                    <div>
                        <h3 class="text-xl font-semibold mb-3">Phase 1: Core Enhancements (Q1 2025)</h3>
                        
                        <div class="space-y-4">
                            <div class="border-l-4 border-blue-500 pl-4">
                                <h4 class="text-lg font-semibold mb-2">🔔 Notification Groups</h4>
                                <p class="text-sm text-white/60 mb-2">Group notifications by category, priority, or user.</p>
                                <div class="code-block p-4 mb-2 text-xs">
                                    <code>// Group notifications
Notif::group('user-updates')->success('Profile Updated');
Notif::group('system-alerts')->error('Server Down');

// Render specific group
echo Notif::renderGroup('user-updates');</code>
                                </div>
                            </div>
                            
                            <div class="border-l-4 border-green-500 pl-4">
                                <h4 class="text-lg font-semibold mb-2">⏰ Scheduled Notifications</h4>
                                <p class="text-sm text-white/60 mb-2">Schedule notifications for future display.</p>
                                <div class="code-block p-4 mb-2 text-xs">
                                    <code>// Schedule notification
Notif::schedule('success', 'Reminder', 'Meeting in 5 minutes', [
    'scheduled_at' => now()->addMinutes(5)
]);

// Check and display scheduled notifications
Notif::displayScheduled();</code>
                                </div>
                            </div>
                            
                            <div class="border-l-4 border-yellow-500 pl-4">
                                <h4 class="text-lg font-semibold mb-2">🔄 Notification Templates</h4>
                                <p class="text-sm text-white/60 mb-2">Predefined notification templates for common use cases.</p>
                                <div class="code-block p-4 mb-2 text-xs">
                                    <code>// Define template
Notif::template('welcome', [
    'title' => 'Welcome to {app_name}!',
    'message' => 'Hi {user_name}, welcome to our platform.',
    'style' => 'liquid-glass'
]);

// Use template
Notif::fromTemplate('welcome', [
    'app_name' => 'MyApp',
    'user_name' => 'John Doe'
]);</code>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div>
                        <h3 class="text-xl font-semibold mb-3">Phase 2: Advanced Features (Q2 2025)</h3>
                        
                        <div class="space-y-4">
                            <div class="border-l-4 border-purple-500 pl-4">
                                <h4 class="text-lg font-semibold mb-2">📊 Analytics & Tracking</h4>
                                <p class="text-sm text-white/60 mb-2">Track notification performance and user engagement.</p>
                                <div class="code-block p-4 mb-2 text-xs">
                                    <code>// Enable analytics
Notif::config(['analytics' => true]);

// Track events
Notif::track('notification_viewed', ['id' => $notificationId]);
Notif::track('notification_clicked', ['id' => $notificationId]);

// Get analytics
$stats = Notif::getAnalytics();
// ['total_sent' => 150, 'viewed' => 120, 'clicked' => 45]</code>
                                </div>
                            </div>
                            
                            <div class="border-l-4 border-red-500 pl-4">
                                <h4 class="text-lg font-semibold mb-2">🎯 Smart Targeting</h4>
                                <p class="text-sm text-white/60 mb-2">Target notifications based on user behavior and preferences.</p>
                                <div class="code-block p-4 mb-2 text-xs">
                                    <code>// Target by user segment
Notif::target('premium-users')->success('Premium Feature', 'New feature available');

// Target by behavior
Notif::target('inactive-users')->warning('Come Back', 'We miss you!');

// Target by location
Notif::target('us-users')->info('US Update', 'New US-specific features');</code>
                                </div>
                            </div>
                            
                            <div class="border-l-4 border-indigo-500 pl-4">
                                <h4 class="text-lg font-semibold mb-2">🔄 Notification Queues</h4>
                                <p class="text-sm text-white/60 mb-2">Queue notifications for background processing.</p>
                                <div class="code-block p-4 mb-2 text-xs">
                                    <code>// Queue notification
Notif::queue('success', 'Email Sent', 'Your email has been sent');

// Process queue
Notif::processQueue();

// Check queue status
$pending = Notif::getQueueCount();</code>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div>
                        <h3 class="text-xl font-semibold mb-3">Phase 3: Enterprise Features (Q3 2025)</h3>
                        
                        <div class="space-y-4">
                            <div class="border-l-4 border-pink-500 pl-4">
                                <h4 class="text-lg font-semibold mb-2">🌐 Multi-Channel Support</h4>
                                <p class="text-sm text-white/60 mb-2">Send notifications across multiple channels (email, SMS, push).</p>
                                <div class="code-block p-4 mb-2 text-xs">
                                    <code>// Multi-channel notification
Notif::channel(['web', 'email', 'sms'])->success('Order Confirmed', 'Your order #123 has been confirmed');

// Configure channels
Notif::config([
    'channels' => [
        'email' => ['driver' => 'smtp', 'config' => [...]],
        'sms' => ['driver' => 'twilio', 'config' => [...]],
        'push' => ['driver' => 'firebase', 'config' => [...]]
    ]
]);</code>
                                </div>
                            </div>
                            
                            <div class="border-l-4 border-orange-500 pl-4">
                                <h4 class="text-lg font-semibold mb-2">🔐 Advanced Security</h4>
                                <p class="text-sm text-white/60 mb-2">Encryption, rate limiting, and security features.</p>
                                <div class="code-block p-4 mb-2 text-xs">
                                    <code>// Enable encryption
Notif::config(['encryption' => true]);

// Rate limiting
Notif::config(['rate_limit' => ['max' => 10, 'window' => 60]]);

// Security headers
Notif::config(['security' => [
    'csp' => true,
    'xss_protection' => true
]]);</code>
                                </div>
                            </div>
                            
                            <div class="border-l-4 border-teal-500 pl-4">
                                <h4 class="text-lg font-semibold mb-2">📈 Advanced Analytics Dashboard</h4>
                                <p class="text-sm text-white/60 mb-2">Web-based dashboard for notification analytics and management.</p>
                                <div class="code-block p-4 mb-2 text-xs">
                                    <code>// Access dashboard
Notif::dashboard(); // Returns dashboard HTML

// API endpoints
GET /notifications/analytics
GET /notifications/templates
POST /notifications/send
GET /notifications/queue</code>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div>
                        <h3 class="text-xl font-semibold mb-3">Implementation Strategy</h3>
                        <div class="space-y-4 text-sm text-white/60">
                            <div>
                                <strong>Backward Compatibility:</strong> Semua fitur baru akan backward compatible dengan versi saat ini.
                            </div>
                            <div>
                                <strong>Gradual Rollout:</strong> Fitur akan di-release secara bertahap dengan beta testing.
                            </div>
                            <div>
                                <strong>Community Feedback:</strong> Setiap fitur akan melalui community feedback dan testing.
                            </div>
                            <div>
                                <strong>Documentation:</strong> Dokumentasi lengkap dan tutorial untuk setiap fitur baru.
                            </div>
                        </div>
                    </div>
                    
                    <div>
                        <h3 class="text-xl font-semibold mb-3">Contributing to Roadmap</h3>
                        <p class="text-sm text-white/60 mb-3">Cara berkontribusi untuk development roadmap.</p>
                        <div class="code-block p-4 mb-3 text-xs">
                            <code>// Submit feature request
- Create issue di GitHub dengan label 'enhancement'
- Jelaskan use case dan benefit
- Sertakan mockup atau contoh implementasi

// Submit pull request
- Fork repository
- Create feature branch
- Implement feature dengan tests
- Submit PR dengan dokumentasi

// Join discussion
- Comment di issue roadmap
- Vote untuk fitur yang diinginkan
- Share feedback dan suggestions</code>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        
        <!-- Footer -->
        <footer class="max-w-7xl mx-auto px-6">
            <div class="apple-card rounded-2xl p-8 text-center">
                <div class="text-4xl mb-4">🔔</div>
                <h3 class="text-2xl font-semibold mb-2">PHP Notifikasi</h3>
                <p class="text-white/70 mb-6">Modern iOS-style notifications for PHP applications</p>
                
                <div class="flex justify-center space-x-6 mb-6">
                    <a href="https://github.com/rzlco666/php-notifikasi" target="_blank" class="apple-button px-4 py-2 rounded-lg">
                        GitHub
                    </a>
                    <a href="#documentation" class="apple-button px-4 py-2 rounded-lg">
                        Documentation
                    </a>
                    <a href="#roadmap" class="apple-button px-4 py-2 rounded-lg">
                        Roadmap
                    </a>
        </div>
                
                <div class="text-sm text-white/50">
                    Made with ❤️ using Apple Design System & Tailwind CSS
                </div>
            </div>
        </footer>
    </div>

    <!-- Render notifications -->
    <?= Notif::render() ?>
    
    <!-- Prism.js for syntax highlighting -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-core.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/plugins/autoloader/prism-autoloader.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/plugins/toolbar/prism-toolbar.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/plugins/copy-to-clipboard/prism-copy-to-clipboard.min.js"></script>
    
    <script>
        // Initialize Prism.js
        Prism.plugins.toolbar.registerButton('copy-to-clipboard', {
            text: 'Copy',
            onClick: function (env) {
                // This will be handled by the copy button
            }
        });
        
        // Copy code functionality
        function copyCode(button) {
            const codeBlock = button.closest('.code-block');
            const codeElement = codeBlock.querySelector('code');
            const text = codeElement.textContent;
            
            // Use clipboard API if available
            if (navigator.clipboard && window.isSecureContext) {
                navigator.clipboard.writeText(text).then(() => {
                    showCopySuccess(button);
                }).catch(() => {
                    fallbackCopyTextToClipboard(text, button);
                });
            } else {
                fallbackCopyTextToClipboard(text, button);
            }
        }
        
        function fallbackCopyTextToClipboard(text, button) {
            const textArea = document.createElement('textarea');
            textArea.value = text;
            textArea.style.position = 'fixed';
            textArea.style.left = '-999999px';
            textArea.style.top = '-999999px';
            document.body.appendChild(textArea);
            textArea.focus();
            textArea.select();
            
            try {
                document.execCommand('copy');
                showCopySuccess(button);
            } catch (err) {
                console.error('Fallback: Oops, unable to copy', err);
            }
            
            document.body.removeChild(textArea);
        }
        
        function showCopySuccess(button) {
            const originalText = button.textContent;
            button.textContent = 'Copied!';
            button.classList.add('copied');
            
            setTimeout(() => {
                button.textContent = originalText;
                button.classList.remove('copied');
            }, 2000);
        }
        
        // Auto-detect language for code blocks without language class
        document.addEventListener('DOMContentLoaded', function() {
            const codeBlocks = document.querySelectorAll('code:not([class*="language-"])');
            codeBlocks.forEach(block => {
                const text = block.textContent;
                let language = 'text';
                
                // Simple language detection
                if (text.includes('<?php') || text.includes('use ') || text.includes('new ') || text.includes('function ')) {
                    language = 'php';
                } else if (text.includes('interface ') || text.includes('class ')) {
                    language = 'php';
                } else if (text.includes('composer require') || text.includes('npm install')) {
                    language = 'bash';
                } else if (text.includes('function(') || text.includes('const ') || text.includes('let ')) {
                    language = 'javascript';
                } else if (text.includes('{') && text.includes('}') && text.includes(':')) {
                    language = 'css';
                } else if (text.includes('GET ') || text.includes('POST ') || text.includes('PUT ')) {
                    language = 'http';
                }
                
                block.className = `language-${language}`;
            });
            
            // Re-highlight all code blocks
            Prism.highlightAll();
        });
    </script>
</div>
</body>
</html> 