<?php

namespace Rzlco\PhpNotifikasi\Storage;

use Rzlco\PhpNotifikasi\Notification;

class SessionStorage implements StorageInterface
{
    private const SESSION_KEY = '_php_notifikasi';

    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION[self::SESSION_KEY])) {
            $_SESSION[self::SESSION_KEY] = [];
        }
    }

    public function add(Notification $notification): void
    {
        $_SESSION[self::SESSION_KEY][] = $notification->toArray();
    }

    public function all(): array
    {
        $notifications = [];
        foreach ($_SESSION[self::SESSION_KEY] as $data) {
            $notifications[] = $this->arrayToNotification($data);
        }
        return $notifications;
    }

    public function clear(): void
    {
        $_SESSION[self::SESSION_KEY] = [];
    }

    public function getByType(string $type): array
    {
        $notifications = [];
        foreach ($_SESSION[self::SESSION_KEY] as $data) {
            if ($data['type'] === $type) {
                $notifications[] = $this->arrayToNotification($data);
            }
        }
        return $notifications;
    }

    public function remove(string $id): bool
    {
        foreach ($_SESSION[self::SESSION_KEY] as $index => $data) {
            if ($data['id'] === $id) {
                unset($_SESSION[self::SESSION_KEY][$index]);
                $_SESSION[self::SESSION_KEY] = array_values($_SESSION[self::SESSION_KEY]);
                return true;
            }
        }
        return false;
    }

    private function arrayToNotification(array $data): Notification
    {
        return Notification::fromArray($data);
    }
} 