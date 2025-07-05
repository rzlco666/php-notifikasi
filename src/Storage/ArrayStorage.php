<?php

namespace Rzlco\PhpNotifikasi\Storage;

use Rzlco\PhpNotifikasi\Notification;

class ArrayStorage implements StorageInterface
{
    private array $data = [];

    public function add(Notification $notification): void
    {
        $this->data[] = $notification->toArray();
    }

    public function all(): array
    {
        $notifications = [];
        foreach ($this->data as $data) {
            $notifications[] = $this->arrayToNotification($data);
        }
        return $notifications;
    }

    public function clear(): void
    {
        $this->data = [];
    }

    public function getByType(string $type): array
    {
        $notifications = [];
        foreach ($this->data as $data) {
            if ($data['type'] === $type) {
                $notifications[] = $this->arrayToNotification($data);
            }
        }
        return $notifications;
    }

    public function remove(string $id): bool
    {
        foreach ($this->data as $index => $data) {
            if ($data['id'] === $id) {
                unset($this->data[$index]);
                $this->data = array_values($this->data);
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