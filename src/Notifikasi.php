<?php

namespace Rzlco\PhpNotifikasi;

use Rzlco\PhpNotifikasi\Storage\StorageInterface;
use Rzlco\PhpNotifikasi\Storage\SessionStorage;
use Rzlco\PhpNotifikasi\Renderer\RendererInterface;
use Rzlco\PhpNotifikasi\Renderer\HtmlRenderer;
use Rzlco\PhpNotifikasi\Config\NotifikasiConfig;
use Rzlco\PhpNotifikasi\Exceptions\InvalidNotificationTypeException;
use Rzlco\PhpNotifikasi\ValueObjects\NotificationType;

class Notifikasi
{
    private StorageInterface $storage;
    private RendererInterface $renderer;
    private NotifikasiConfig $config;

    public function __construct(
        ?StorageInterface $storage = null,
        ?RendererInterface $renderer = null,
        array $config = []
    ) {
        $this->storage = $storage ?? new SessionStorage();
        $this->renderer = $renderer ?? new HtmlRenderer();
        $this->config = new NotifikasiConfig($config);
    }

    /**
     * Add success notification
     */
    public function success(string $title, string $message = '', array $options = []): self
    {
        return $this->add(Notification::TYPE_SUCCESS, $title, $message, $options);
    }

    /**
     * Add error notification
     */
    public function error(string $title, string $message = '', array $options = []): self
    {
        return $this->add(Notification::TYPE_ERROR, $title, $message, $options);
    }

    /**
     * Add warning notification
     */
    public function warning(string $title, string $message = '', array $options = []): self
    {
        return $this->add(Notification::TYPE_WARNING, $title, $message, $options);
    }

    /**
     * Add info notification
     */
    public function info(string $title, string $message = '', array $options = []): self
    {
        return $this->add(Notification::TYPE_INFO, $title, $message, $options);
    }

    /**
     * Add notification with custom type
     */
    public function add(string $type, string $title, string $message = '', array $options = []): self
    {
        $this->validateNotificationType($type);
        
        $mergedOptions = $this->mergeOptionsWithDefaults($options);
        $notification = new Notification($type, $title, $message, $mergedOptions);
        
        $this->storage->add($notification);
        return $this;
    }

    /**
     * Get all notifications
     */
    public function all(): array
    {
        return $this->storage->all();
    }

    /**
     * Clear all notifications
     */
    public function clear(): self
    {
        $this->storage->clear();
        return $this;
    }

    /**
     * Render notifications as HTML
     */
    public function render(): string
    {
        $notifications = $this->all();
        $html = $this->renderer->render($notifications, $this->config->toArray());
        
        // Clear notifications after rendering (flash behavior)
        $this->clear();
        
        return $html;
    }

    /**
     * Get notifications as JSON (for AJAX)
     */
    public function json(): string
    {
        $notifications = array_map(function ($notification) {
            return $notification->toArray();
        }, $this->all());

        $result = json_encode($notifications);
        
        // Clear notifications after getting JSON
        $this->clear();
        
        return $result;
    }

    /**
     * Check if has notifications
     */
    public function hasNotifications(): bool
    {
        return count($this->all()) > 0;
    }

    /**
     * Get notifications by type
     */
    public function getByType(string $type): array
    {
        return $this->storage->getByType($type);
    }

    /**
     * Set storage
     */
    public function setStorage(StorageInterface $storage): self
    {
        $this->storage = $storage;
        return $this;
    }

    /**
     * Set renderer
     */
    public function setRenderer(RendererInterface $renderer): self
    {
        $this->renderer = $renderer;
        return $this;
    }

    /**
     * Set config
     */
    public function setConfig(array $config): self
    {
        $this->config = new NotifikasiConfig($config);
        return $this;
    }

    /**
     * Get config value
     */
    public function getConfig(string $key = null)
    {
        if ($key === null) {
            return $this->config->toArray();
        }
        return $this->config->get($key);
    }

    /**
     * Validate notification type
     */
    private function validateNotificationType(string $type): void
    {
        if (!NotificationType::isValid($type)) {
            throw new InvalidNotificationTypeException(
                sprintf('Invalid notification type: %s', $type)
            );
        }
    }

    /**
     * Merge options with default configuration
     */
    private function mergeOptionsWithDefaults(array $options): array
    {
        return array_merge([
            'position' => $this->config->get('default_position'),
            'duration' => $this->config->get('default_duration'),
            'style' => $this->config->get('default_style'),
            'size' => $this->config->get('default_size'),
            'mode' => $this->config->get('default_mode')
        ], $options);
    }
} 