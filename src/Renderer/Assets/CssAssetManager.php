<?php

namespace Rzlco\PhpNotifikasi\Renderer\Assets;

class CssAssetManager
{
    public function render(): string
    {
        return $this->getTailwindCSS() . $this->getCustomStyles();
    }

    private function getTailwindCSS(): string
    {
        // Gunakan helper function jika tersedia, fallback ke path default
        if (function_exists('php_notifikasi_asset')) {
            return '<link href="' . php_notifikasi_asset('tailwind.min.css') . '" rel="stylesheet">' . "\n"
                . '<link href="' . php_notifikasi_asset('fonts/stylesheet.css') . '" rel="stylesheet">' . "\n";
        }
        
        return '<link href="/vendor/php-notifikasi/assets/tailwind.min.css" rel="stylesheet">' . "\n"
            . '<link href="/vendor/php-notifikasi/assets/fonts/stylesheet.css" rel="stylesheet">' . "\n";
    }

    private function getCustomStyles(): string
    {
        return '<style>
        /* PHP Notifikasi - Isolated Styles */
        .php-notifikasi-container {
            position: fixed;
            z-index: 999999;
            pointer-events: none;
            font-family: -apple-system, BlinkMacSystemFont, "SF Pro Display", "SF Pro Text", "Helvetica Neue", system-ui, sans-serif;
        }
        
        .php-notifikasi-container * {
            box-sizing: border-box;
        }
        
        /* iOS Font Stack - Scoped */
        .php-notifikasi-container .ios-font {
            font-family: -apple-system, BlinkMacSystemFont, "SF Pro Display", "SF Pro Text", "Helvetica Neue", system-ui, sans-serif !important;
        }
        
        /* iOS Blur Effect - Scoped */
        .php-notifikasi-container .ios-blur {
            backdrop-filter: blur(20px) !important;
            -webkit-backdrop-filter: blur(20px) !important;
        }
        
        .php-notifikasi-container .ios-blur-dark {
            backdrop-filter: blur(20px) !important;
            -webkit-backdrop-filter: blur(20px) !important;
        }
        
        /* Transparent Blur Theme (iOS style) - Scoped */
        .php-notifikasi-container .notif-blur {
            background: rgba(245, 245, 247, 0.75) !important;
            border: 1px solid rgba(60, 60, 67, 0.12) !important;
            box-shadow: 0 4px 24px rgba(60, 60, 67, 0.08) !important;
            backdrop-filter: blur(20px) !important;
            -webkit-backdrop-filter: blur(20px) !important;
        }
        
        .php-notifikasi-container .notif-blur-dark {
            background: rgba(28, 28, 30, 0.75) !important;
            border: 1px solid rgba(255, 255, 255, 0.12) !important;
            box-shadow: 0 4px 24px rgba(0, 0, 0, 0.3) !important;
            backdrop-filter: blur(20px) !important;
            -webkit-backdrop-filter: blur(20px) !important;
        }
        
        /* Liquid Glass Theme (iOS 17+ style) - Scoped */
        .php-notifikasi-container .notif-liquid-glass {
            background: rgba(255, 255, 255, 0.85) !important;
            border: 1px solid rgba(255, 255, 255, 0.3) !important;
            box-shadow: 
                0 8px 32px rgba(0, 0, 0, 0.12),
                0 2px 8px rgba(0, 0, 0, 0.08),
                inset 0 1px 0 rgba(255, 255, 255, 0.6) !important;
            backdrop-filter: blur(24px) saturate(180%) !important;
            -webkit-backdrop-filter: blur(24px) saturate(180%) !important;
            border-radius: 16px !important;
        }
        
        .php-notifikasi-container .notif-liquid-glass-dark {
            background: rgba(28, 28, 30, 0.85) !important;
            border: 1px solid rgba(255, 255, 255, 0.2) !important;
            box-shadow: 
                0 8px 32px rgba(0, 0, 0, 0.4),
                0 2px 8px rgba(0, 0, 0, 0.2),
                inset 0 1px 0 rgba(255, 255, 255, 0.1) !important;
            backdrop-filter: blur(24px) saturate(180%) !important;
            -webkit-backdrop-filter: blur(24px) saturate(180%) !important;
            border-radius: 16px !important;
        }
        
        /* Clean notification shadow - Scoped */
        .php-notifikasi-container .notif-shadow {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15) !important;
        }
        
        /* Notification sizes - Scoped */
        .php-notifikasi-container .notif-sm {
            min-width: 280px !important;
            max-width: 320px !important;
        }
        
        .php-notifikasi-container .notif-md {
            min-width: 320px !important;
            max-width: 380px !important;
        }
        
        .php-notifikasi-container .notif-lg {
            min-width: 380px !important;
            max-width: 450px !important;
        }
        
        /* Custom iOS animations - Scoped */
        .php-notifikasi-container .slide-in-right {
            animation: phpNotifikasiSlideInRight 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94) forwards !important;
        }
        
        .php-notifikasi-container .slide-in-left {
            animation: phpNotifikasiSlideInLeft 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94) forwards !important;
        }
        
        .php-notifikasi-container .slide-in-top {
            animation: phpNotifikasiSlideInTop 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94) forwards !important;
        }
        
        .php-notifikasi-container .slide-in-bottom {
            animation: phpNotifikasiSlideInBottom 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94) forwards !important;
        }
        
        .php-notifikasi-container .slide-out-right {
            animation: phpNotifikasiSlideOutRight 0.25s cubic-bezier(0.55, 0.085, 0.68, 0.53) forwards !important;
        }
        
        .php-notifikasi-container .slide-out-left {
            animation: phpNotifikasiSlideOutLeft 0.25s cubic-bezier(0.55, 0.085, 0.68, 0.53) forwards !important;
        }
        
        .php-notifikasi-container .slide-out-top {
            animation: phpNotifikasiSlideOutTop 0.25s cubic-bezier(0.55, 0.085, 0.68, 0.53) forwards !important;
        }
        
        .php-notifikasi-container .slide-out-bottom {
            animation: phpNotifikasiSlideOutBottom 0.25s cubic-bezier(0.55, 0.085, 0.68, 0.53) forwards !important;
        }
        
        @keyframes phpNotifikasiSlideInRight {
            from { transform: translateX(100%); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
        
        @keyframes phpNotifikasiSlideInLeft {
            from { transform: translateX(-100%); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
        
        @keyframes phpNotifikasiSlideInTop {
            from { transform: translateY(-100%); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
        
        @keyframes phpNotifikasiSlideInBottom {
            from { transform: translateY(100%); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
        
        @keyframes phpNotifikasiSlideOutRight {
            from { transform: translateX(0); opacity: 1; }
            to { transform: translateX(100%); opacity: 0; }
        }
        
        @keyframes phpNotifikasiSlideOutLeft {
            from { transform: translateX(0); opacity: 1; }
            to { transform: translateX(-100%); opacity: 0; }
        }
        
        @keyframes phpNotifikasiSlideOutTop {
            from { transform: translateY(0); opacity: 1; }
            to { transform: translateY(-100%); opacity: 0; }
        }
        
        @keyframes phpNotifikasiSlideOutBottom {
            from { transform: translateY(0); opacity: 1; }
            to { transform: translateY(100%); opacity: 0; }
        }
        
        /* Clean style - white background - Scoped */
        .php-notifikasi-container .notif-clean {
            background: white !important;
            color: #374151 !important;
            border: 1px solid rgba(0, 0, 0, 0.05) !important;
        }
        
        .php-notifikasi-container .notif-clean .notif-title {
            color: #111827 !important;
        }
        
        .php-notifikasi-container .notif-clean .notif-message {
            color: #6B7280 !important;
        }
        
        .php-notifikasi-container .notif-clean .notif-time {
            color: #9CA3AF !important;
        }
        
        /* Clean style - dark mode - Scoped */
        .php-notifikasi-container .notif-clean-dark {
            background: #1F2937 !important;
            color: #F9FAFB !important;
            border: 1px solid rgba(255, 255, 255, 0.1) !important;
        }
        
        .php-notifikasi-container .notif-clean-dark .notif-title-dark {
            color: #F9FAFB !important;
        }
        
        .php-notifikasi-container .notif-clean-dark .notif-message-dark {
            color: #D1D5DB !important;
        }
        
        .php-notifikasi-container .notif-clean-dark .notif-time-dark {
            color: #9CA3AF !important;
        }
        
        /* Colored style - Scoped */
        .php-notifikasi-container .notif-colored {
            color: white !important;
            border: none !important;
        }
        
        .php-notifikasi-container .notif-colored .notif-title {
            color: white !important;
        }
        
        .php-notifikasi-container .notif-colored .notif-message {
            color: rgba(255, 255, 255, 0.9) !important;
        }
        
        .php-notifikasi-container .notif-colored .notif-time {
            color: rgba(255, 255, 255, 0.7) !important;
        }
        
        /* Success colors - Scoped */
        .php-notifikasi-container .notif-colored.notif-success {
            background: linear-gradient(135deg, #10B981, #059669) !important;
        }
        
        .php-notifikasi-container .notif-colored.notif-error {
            background: linear-gradient(135deg, #EF4444, #DC2626) !important;
        }
        
        .php-notifikasi-container .notif-colored.notif-warning {
            background: linear-gradient(135deg, #F59E0B, #D97706) !important;
        }
        
        .php-notifikasi-container .notif-colored.notif-info {
            background: linear-gradient(135deg, #3B82F6, #2563EB) !important;
        }
        
        /* Icon badges - Scoped */
        .php-notifikasi-container .badge-success {
            background: #10B981 !important;
            color: white !important;
        }
        
        .php-notifikasi-container .badge-error {
            background: #EF4444 !important;
            color: white !important;
        }
        
        .php-notifikasi-container .badge-warning {
            background: #F59E0B !important;
            color: white !important;
        }
        
        .php-notifikasi-container .badge-info {
            background: #3B82F6 !important;
            color: white !important;
        }
        
        .php-notifikasi-container .badge-success-dark {
            background: #059669 !important;
            color: white !important;
        }
        
        .php-notifikasi-container .badge-error-dark {
            background: #DC2626 !important;
            color: white !important;
        }
        
        .php-notifikasi-container .badge-warning-dark {
            background: #D97706 !important;
            color: white !important;
        }
        
        .php-notifikasi-container .badge-info-dark {
            background: #2563EB !important;
            color: white !important;
        }
        
        /* Close button - Scoped */
        .php-notifikasi-container .ios-close-btn {
            color: #9CA3AF !important;
            transition: color 0.2s ease !important;
        }
        
        .php-notifikasi-container .ios-close-btn:hover {
            color: #6B7280 !important;
        }
        
        .php-notifikasi-container .ios-close-btn-dark {
            color: #6B7280 !important;
        }
        
        .php-notifikasi-container .ios-close-btn-dark:hover {
            color: #9CA3AF !important;
        }
        
        /* Progress bar - Scoped */
        .php-notifikasi-container .progress-bar {
            background: rgba(0, 0, 0, 0.1) !important;
        }
        
        .php-notifikasi-container .progress-bar-dark {
            background: rgba(255, 255, 255, 0.1) !important;
        }
        
        /* Pointer events untuk container */
        .php-notifikasi-container .pointer-events-auto {
            pointer-events: auto !important;
        }
        
        /* Responsive adjustments - Scoped */
        @media (max-width: 640px) {
            .php-notifikasi-container .notif-sm,
            .php-notifikasi-container .notif-md,
            .php-notifikasi-container .notif-lg {
                min-width: calc(100vw - 32px) !important;
                max-width: calc(100vw - 32px) !important;
                margin: 8px !important;
            }
        }
        </style>';
    }
} 