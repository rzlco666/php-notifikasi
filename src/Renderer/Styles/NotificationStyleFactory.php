<?php

namespace Rzlco\PhpNotifikasi\Renderer\Styles;

use Rzlco\PhpNotifikasi\Notification;

class NotificationStyleFactory
{
    public function createStyleClasses(Notification $notification): StyleClasses
    {
        $style = $notification->getOption('style', 'clean');
        $mode = $notification->getOption('mode', 'light');
        
        switch ($style) {
            case 'colored':
                return $this->createColoredStyle($notification, $mode);
            case 'blur':
                return $this->createBlurStyle($notification, $mode);
            case 'liquid-glass':
                return $this->createLiquidGlassStyle($notification, $mode);
            default:
                return $this->createCleanStyle($notification, $mode);
        }
    }

    private function createCleanStyle(Notification $notification, string $mode): StyleClasses
    {
        if ($mode === 'dark') {
            return new StyleClasses(
                'notif-clean-dark',
                'notif-title-dark font-semibold',
                'notif-message-dark',
                'notif-time-dark',
                'ios-close-btn-dark',
                'badge-' . $notification->getType() . '-dark',
                'progress-bar-dark'
            );
        }
        
        return new StyleClasses(
            'notif-clean',
            'notif-title font-semibold',
            'notif-message',
            'notif-time',
            'ios-close-btn',
            'badge-' . $notification->getType(),
            'progress-bar'
        );
    }

    private function createColoredStyle(Notification $notification, string $mode): StyleClasses
    {
        if ($mode === 'dark') {
            return new StyleClasses(
                'notif-' . $notification->getType() . '-dark',
                'text-white font-semibold',
                'text-white text-opacity-90',
                'text-white text-opacity-70',
                'text-white text-opacity-70 hover:text-opacity-100',
                'bg-white bg-opacity-20 text-white',
                'progress-bar-colored-dark'
            );
        }
        
        return new StyleClasses(
            'notif-' . $notification->getType(),
            'text-white font-semibold',
            'text-white text-opacity-90',
            'text-white text-opacity-70',
            'text-white text-opacity-70 hover:text-opacity-100',
            'bg-white bg-opacity-20 text-white',
            'progress-bar-colored'
        );
    }

    private function createBlurStyle(Notification $notification, string $mode): StyleClasses
    {
        if ($mode === 'dark') {
            return new StyleClasses(
                'notif-blur-dark ios-blur-dark',
                'text-white font-semibold',
                'text-gray-200',
                'text-gray-400',
                'ios-close-btn-dark',
                'badge-' . $notification->getType() . '-dark',
                'progress-bar-dark'
            );
        }
        
        return new StyleClasses(
            'notif-blur ios-blur',
            'text-gray-900 font-semibold',
            'text-gray-700',
            'text-gray-400',
            'ios-close-btn',
            'badge-' . $notification->getType(),
            'progress-bar'
        );
    }

    private function createLiquidGlassStyle(Notification $notification, string $mode): StyleClasses
    {
        if ($mode === 'dark') {
            return new StyleClasses(
                'notif-liquid-glass-dark',
                'text-white font-semibold',
                'text-gray-200',
                'text-gray-400',
                'ios-close-btn-dark',
                'badge-' . $notification->getType() . '-dark',
                'progress-bar-dark'
            );
        }
        
        return new StyleClasses(
            'notif-liquid-glass',
            'text-gray-900 font-semibold',
            'text-gray-700',
            'text-gray-400',
            'ios-close-btn',
            'badge-' . $notification->getType(),
            'progress-bar'
        );
    }
} 