<?php

namespace Rzlco\PhpNotifikasi;

use Rzlco\PhpNotifikasi\ValueObjects\NotificationId;
use Rzlco\PhpNotifikasi\ValueObjects\NotificationType;
use Rzlco\PhpNotifikasi\ValueObjects\NotificationOptions;

class Notification
{
    public const TYPE_SUCCESS = 'success';
    public const TYPE_ERROR = 'error';
    public const TYPE_WARNING = 'warning';
    public const TYPE_INFO = 'info';
    public const TYPE_CUSTOM = 'custom';

    private NotificationId $id;
    private NotificationType $type;
    private string $title;
    private string $message;
    private NotificationOptions $options;

    public function __construct(
        string $type,
        string $title,
        string $message = '',
        array $options = []
    ) {
        $this->id = NotificationId::generate();
        $this->type = new NotificationType($type);
        $this->title = $this->sanitizeString($title);
        $this->message = $this->sanitizeString($message);
        $this->options = new NotificationOptions($options);
    }

    public function getId(): string
    {
        return $this->id->toString();
    }

    public function getType(): string
    {
        return $this->type->toString();
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function getOptions(): array
    {
        return $this->options->toArray();
    }

    public function getOption(string $key, $default = null)
    {
        return $this->options->get($key, $default);
    }

    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'type' => $this->getType(),
            'title' => $this->getTitle(),
            'message' => $this->getMessage(),
            'options' => $this->getOptions(),
        ];
    }

    private function sanitizeString(string $input): string
    {
        return trim($input);
    }

    public static function getValidTypes(): array
    {
        return [
            self::TYPE_SUCCESS,
            self::TYPE_ERROR,
            self::TYPE_WARNING,
            self::TYPE_INFO,
            self::TYPE_CUSTOM,
        ];
    }

    public static function fromArray(array $data): self
    {
        $instance = new self(
            $data['type'] ?? 'custom',
            $data['title'] ?? '',
            $data['message'] ?? '',
            $data['options'] ?? []
        );
        // Set id jika ada (untuk restore dari storage)
        if (isset($data['id'])) {
            $instance->id = \Rzlco\PhpNotifikasi\ValueObjects\NotificationId::fromString($data['id']);
        }
        return $instance;
    }
} 