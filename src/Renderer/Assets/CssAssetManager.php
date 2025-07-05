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
        return '<link href="/assets/tailwind.min.css" rel="stylesheet">' . "\n"
            . '<link href="/assets/fonts/stylesheet.css" rel="stylesheet">' . "\n";
    }

    private function getCustomStyles(): string
    {
        return '<style>
        /* iOS Font Stack */
        .ios-font {
            font-family: -apple-system, BlinkMacSystemFont, "SF Pro Display", "SF Pro Text", "Helvetica Neue", system-ui, sans-serif;
        }
        
        /* iOS Blur Effect */
        .ios-blur {
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
        }
        
        .ios-blur-dark {
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
        }
        
        /* Transparent Blur Theme (iOS style) */
        .notif-blur {
            background: rgba(245, 245, 247, 0.75);
            border: 1px solid rgba(60, 60, 67, 0.12);
            box-shadow: 0 4px 24px rgba(60, 60, 67, 0.08);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
        }
        
        .notif-blur-dark {
            background: rgba(28, 28, 30, 0.75);
            border: 1px solid rgba(255, 255, 255, 0.12);
            box-shadow: 0 4px 24px rgba(0, 0, 0, 0.3);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
        }
        
        /* Liquid Glass Theme (iOS 17+ style) */
        .notif-liquid-glass {
            background: rgba(255, 255, 255, 0.85);
            border: 1px solid rgba(255, 255, 255, 0.3);
            box-shadow: 
                0 8px 32px rgba(0, 0, 0, 0.12),
                0 2px 8px rgba(0, 0, 0, 0.08),
                inset 0 1px 0 rgba(255, 255, 255, 0.6);
            backdrop-filter: blur(24px) saturate(180%);
            -webkit-backdrop-filter: blur(24px) saturate(180%);
            border-radius: 16px;
        }
        
        .notif-liquid-glass-dark {
            background: rgba(28, 28, 30, 0.85);
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 
                0 8px 32px rgba(0, 0, 0, 0.4),
                0 2px 8px rgba(0, 0, 0, 0.2),
                inset 0 1px 0 rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(24px) saturate(180%);
            -webkit-backdrop-filter: blur(24px) saturate(180%);
            border-radius: 16px;
        }
        
        /* Clean notification shadow */
        .notif-shadow {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }
        
        /* Notification sizes */
        .notif-sm {
            min-width: 280px;
            max-width: 320px;
        }
        
        .notif-md {
            min-width: 320px;
            max-width: 380px;
        }
        
        .notif-lg {
            min-width: 380px;
            max-width: 450px;
        }
        
        /* Custom iOS animations */
        .slide-in-right {
            animation: slideInRight 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94) forwards;
        }
        
        .slide-in-left {
            animation: slideInLeft 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94) forwards;
        }
        
        .slide-in-top {
            animation: slideInTop 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94) forwards;
        }
        
        .slide-in-bottom {
            animation: slideInBottom 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94) forwards;
        }
        
        .slide-out-right {
            animation: slideOutRight 0.25s cubic-bezier(0.55, 0.085, 0.68, 0.53) forwards;
        }
        
        .slide-out-left {
            animation: slideOutLeft 0.25s cubic-bezier(0.55, 0.085, 0.68, 0.53) forwards;
        }
        
        .slide-out-top {
            animation: slideOutTop 0.25s cubic-bezier(0.55, 0.085, 0.68, 0.53) forwards;
        }
        
        .slide-out-bottom {
            animation: slideOutBottom 0.25s cubic-bezier(0.55, 0.085, 0.68, 0.53) forwards;
        }
        
        @keyframes slideInRight {
            from { transform: translateX(100%); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
        
        @keyframes slideInLeft {
            from { transform: translateX(-100%); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
        
        @keyframes slideInTop {
            from { transform: translateY(-100%); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
        
        @keyframes slideInBottom {
            from { transform: translateY(100%); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
        
        @keyframes slideOutRight {
            from { transform: translateX(0); opacity: 1; }
            to { transform: translateX(100%); opacity: 0; }
        }
        
        @keyframes slideOutLeft {
            from { transform: translateX(0); opacity: 1; }
            to { transform: translateX(-100%); opacity: 0; }
        }
        
        @keyframes slideOutTop {
            from { transform: translateY(0); opacity: 1; }
            to { transform: translateY(-100%); opacity: 0; }
        }
        
        @keyframes slideOutBottom {
            from { transform: translateY(0); opacity: 1; }
            to { transform: translateY(100%); opacity: 0; }
        }
        
        /* Clean style - white background */
        .notif-clean {
            background: white;
            color: #374151;
            border: 1px solid rgba(0, 0, 0, 0.05);
        }
        
        .notif-clean .notif-title {
            color: #111827;
        }
        
        .notif-clean .notif-message {
            color: #6B7280;
        }
        
        .notif-clean .notif-time {
            color: #9CA3AF;
        }
        
        /* Clean style - dark mode */
        .notif-clean-dark {
            background: #1F2937;
            color: #F9FAFB;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .notif-clean-dark .notif-title-dark {
            color: #F9FAFB;
        }
        
        .notif-clean-dark .notif-message-dark {
            color: #D1D5DB;
        }
        
        .notif-clean-dark .notif-time-dark {
            color: #9CA3AF;
        }
        
        /* iOS close button */
        .ios-close-btn {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: rgba(60, 60, 67, 0.18);
            color: rgba(60, 60, 67, 0.6);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s ease;
        }
        
        .ios-close-btn:hover {
            background: rgba(60, 60, 67, 0.28);
            color: rgba(60, 60, 67, 0.8);
        }
        
        /* iOS close button - dark mode */
        .ios-close-btn-dark {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.18);
            color: rgba(255, 255, 255, 0.6);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s ease;
        }
        
        .ios-close-btn-dark:hover {
            background: rgba(255, 255, 255, 0.28);
            color: rgba(255, 255, 255, 0.8);
        }
        
        /* Colored style - gradient backgrounds */
        .notif-success {
            background: linear-gradient(135deg, rgba(52, 211, 153, 0.95), rgba(16, 185, 129, 0.95));
        }
        
        .notif-error {
            background: linear-gradient(135deg, rgba(239, 68, 68, 0.95), rgba(220, 38, 38, 0.95));
        }
        
        .notif-warning {
            background: linear-gradient(135deg, rgba(245, 158, 11, 0.95), rgba(217, 119, 6, 0.95));
        }
        
        .notif-info {
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.95), rgba(37, 99, 235, 0.95));
        }
        
        .notif-custom {
            background: linear-gradient(135deg, rgba(139, 92, 246, 0.95), rgba(124, 58, 237, 0.95));
        }
        
        /* Colored style - dark mode gradients */
        .notif-success-dark {
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.95), rgba(5, 150, 105, 0.95));
        }
        
        .notif-error-dark {
            background: linear-gradient(135deg, rgba(220, 38, 38, 0.95), rgba(185, 28, 28, 0.95));
        }
        
        .notif-warning-dark {
            background: linear-gradient(135deg, rgba(217, 119, 6, 0.95), rgba(194, 65, 12, 0.95));
        }
        
        .notif-info-dark {
            background: linear-gradient(135deg, rgba(37, 99, 235, 0.95), rgba(30, 64, 175, 0.95));
        }
        
        .notif-custom-dark {
            background: linear-gradient(135deg, rgba(124, 58, 237, 0.95), rgba(109, 40, 217, 0.95));
        }
        
        /* Icon badge colors for clean style */
        .badge-success { 
            background: #10B981; 
            color: white;
        }
        .badge-error { 
            background: #EF4444; 
            color: white;
        }
        .badge-warning { 
            background: #F59E0B; 
            color: white;
        }
        .badge-info { 
            background: #3B82F6; 
            color: white;
        }
        .badge-custom { 
            background: #8B5CF6; 
            color: white;
        }
        
        /* Icon badge colors for clean style - dark mode */
        .badge-success-dark { 
            background: #059669; 
            color: white;
        }
        .badge-error-dark { 
            background: #DC2626; 
            color: white;
        }
        .badge-warning-dark { 
            background: #D97706; 
            color: white;
        }
        .badge-info-dark { 
            background: #2563EB; 
            color: white;
        }
        .badge-custom-dark { 
            background: #7C3AED; 
            color: white;
        }
        
        /* Progress bar */
        .progress-bar {
            height: 2px;
            background: rgba(0, 0, 0, 0.1);
        }
        
        .progress-bar-colored {
            background: rgba(255, 255, 255, 0.4);
        }
        
        /* Progress bar - dark mode */
        .progress-bar-dark {
            height: 2px;
            background: rgba(255, 255, 255, 0.1);
        }
        
        .progress-bar-colored-dark {
            background: rgba(255, 255, 255, 0.3);
        }
        
        @keyframes progress-countdown {
            from { width: 100%; }
            to { width: 0%; }
        }
        
        /* Mobile responsiveness */
        @media (max-width: 640px) {
            .notif-container {
                left: 1rem !important;
                right: 1rem !important;
                transform: none !important;
                max-width: none !important;
            }
            
            .notif-sm, .notif-md, .notif-lg {
                min-width: auto !important;
                max-width: none !important;
            }
        }
        
        /* Tablet responsiveness for LG notifications */
        @media (max-width: 768px) {
            .notif-lg {
                max-width: 100% !important;
            }
        }
        </style>' . "\n";
    }
} 