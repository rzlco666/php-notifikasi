<?php

namespace Rzlco\PhpNotifikasi\Storage;

use Rzlco\PhpNotifikasi\Notification;

interface StorageInterface
{
    /**
     * Add notification to storage
     */
    public function add(Notification $notification): void;

    /**
     * Get all notifications from storage
     * 
     * @return Notification[]
     */
    public function all(): array;

    /**
     * Clear all notifications from storage
     */
    public function clear(): void;

    /**
     * Get notifications by type
     * 
     * @return Notification[]
     */
    public function getByType(string $type): array;

    /**
     * Remove specific notification by ID
     */
    public function remove(string $id): bool;
} 