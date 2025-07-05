<?php

namespace Rzlco\PhpNotifikasi\ValueObjects;

use InvalidArgumentException;

class NotificationType
{
    private const VALID_TYPES = [
        'success',
        'error', 
        'warning',
        'info',
        'custom'
    ];

    private string $value;

    public function __construct(string $value)
    {
        $this->validate($value);
        $this->value = $value;
    }

    public function toString(): string
    {
        return $this->value;
    }

    public function equals(self $other): bool
    {
        return $this->value === $other->value;
    }

    public static function isValid(string $value): bool
    {
        return in_array($value, self::VALID_TYPES, true);
    }

    public static function getValidTypes(): array
    {
        return self::VALID_TYPES;
    }

    private function validate(string $value): void
    {
        if (!self::isValid($value)) {
            throw new InvalidArgumentException(
                sprintf('Invalid notification type: %s. Valid types are: %s', 
                    $value, 
                    implode(', ', self::VALID_TYPES)
                )
            );
        }
    }
} 