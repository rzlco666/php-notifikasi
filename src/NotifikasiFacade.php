<?php

namespace Rzlco\PhpNotifikasi;

use Rzlco\PhpNotifikasi\Config\NotifikasiConfig;

class NotifikasiFacade
{
    private static ?Notifikasi $instance = null;

    /**
     * Get singleton instance
     */
    public static function getInstance(): Notifikasi
    {
        if (self::$instance === null) {
            self::$instance = new Notifikasi();
        }
        return self::$instance;
    }

    /**
     * Set custom instance
     */
    public static function setInstance(Notifikasi $instance): void
    {
        self::$instance = $instance;
    }

    /**
     * Reset instance (for testing)
     */
    public static function reset(): void
    {
        self::$instance = null;
    }

    /**
     * Add success notification
     */
    public static function success(string $title, string $message = '', array $options = []): Notifikasi
    {
        return self::getInstance()->success($title, $message, $options);
    }

    /**
     * Add error notification
     */
    public static function error(string $title, string $message = '', array $options = []): Notifikasi
    {
        return self::getInstance()->error($title, $message, $options);
    }

    /**
     * Add warning notification
     */
    public static function warning(string $title, string $message = '', array $options = []): Notifikasi
    {
        return self::getInstance()->warning($title, $message, $options);
    }

    /**
     * Add info notification
     */
    public static function info(string $title, string $message = '', array $options = []): Notifikasi
    {
        return self::getInstance()->info($title, $message, $options);
    }

    /**
     * Add custom notification
     */
    public static function add(string $type, string $title, string $message = '', array $options = []): Notifikasi
    {
        return self::getInstance()->add($type, $title, $message, $options);
    }

    /**
     * Render notifications
     */
    public static function render(): string
    {
        return self::getInstance()->render();
    }

    /**
     * Get notifications as JSON
     */
    public static function json(): string
    {
        return self::getInstance()->json();
    }

    /**
     * Get all notifications
     */
    public static function all(): array
    {
        return self::getInstance()->all();
    }

    /**
     * Clear notifications
     */
    public static function clear(): Notifikasi
    {
        return self::getInstance()->clear();
    }

    /**
     * Check if has notifications
     */
    public static function hasNotifications(): bool
    {
        return self::getInstance()->hasNotifications();
    }

    /**
     * Configure the instance
     */
    public static function config(array $config): Notifikasi
    {
        return self::getInstance()->setConfig($config);
    }

    /**
     * Get config value
     */
    public static function getConfig(string $key = null)
    {
        return self::getInstance()->getConfig($key);
    }
} 