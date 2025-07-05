<?php

namespace Rzlco\PhpNotifikasi\ValueObjects;

class NotificationOptions
{
    private const DEFAULT_OPTIONS = [
        'position' => 'top-right',
        'duration' => 5000,
        'style' => 'clean',
        'size' => 'md',
        'mode' => 'light',
        'dismissible' => true,
        'className' => ''
    ];

    private const VALID_POSITIONS = [
        'top-left', 'top-right', 'top-center',
        'bottom-left', 'bottom-right', 'bottom-center'
    ];

    private const VALID_STYLES = [
        'clean', 'colored', 'blur', 'liquid-glass'
    ];

    private const VALID_SIZES = [
        'sm', 'md', 'lg'
    ];

    private const VALID_MODES = [
        'light', 'dark', 'auto'
    ];

    private array $options;

    public function __construct(array $options = [])
    {
        $this->options = array_merge(self::DEFAULT_OPTIONS, $options);
        $this->validate();
    }

    public function get(string $key, $default = null)
    {
        return $this->options[$key] ?? $default;
    }

    public function set(string $key, $value): void
    {
        $this->options[$key] = $value;
        $this->validate();
    }

    public function toArray(): array
    {
        return $this->options;
    }

    public function getPosition(): string
    {
        return $this->options['position'];
    }

    public function getDuration(): int
    {
        return $this->options['duration'];
    }

    public function getStyle(): string
    {
        return $this->options['style'];
    }

    public function getSize(): string
    {
        return $this->options['size'];
    }

    public function getMode(): string
    {
        return $this->options['mode'];
    }

    public function isDismissible(): bool
    {
        return $this->options['dismissible'];
    }

    public function getClassName(): string
    {
        return $this->options['className'];
    }

    private function validate(): void
    {
        $this->validatePosition();
        $this->validateDuration();
        $this->validateStyle();
        $this->validateSize();
        $this->validateMode();
        $this->validateDismissible();
    }

    private function validatePosition(): void
    {
        if (!in_array($this->options['position'], self::VALID_POSITIONS, true)) {
            throw new \InvalidArgumentException(
                sprintf('Invalid position: %s. Valid positions are: %s',
                    $this->options['position'],
                    implode(', ', self::VALID_POSITIONS)
                )
            );
        }
    }

    private function validateDuration(): void
    {
        if (!is_int($this->options['duration']) || $this->options['duration'] < 0) {
            throw new \InvalidArgumentException('Duration must be a non-negative integer');
        }
    }

    private function validateStyle(): void
    {
        if (!in_array($this->options['style'], self::VALID_STYLES, true)) {
            throw new \InvalidArgumentException(
                sprintf('Invalid style: %s. Valid styles are: %s',
                    $this->options['style'],
                    implode(', ', self::VALID_STYLES)
                )
            );
        }
    }

    private function validateSize(): void
    {
        if (!in_array($this->options['size'], self::VALID_SIZES, true)) {
            throw new \InvalidArgumentException(
                sprintf('Invalid size: %s. Valid sizes are: %s',
                    $this->options['size'],
                    implode(', ', self::VALID_SIZES)
                )
            );
        }
    }

    private function validateMode(): void
    {
        if (!in_array($this->options['mode'], self::VALID_MODES, true)) {
            throw new \InvalidArgumentException(
                sprintf('Invalid mode: %s. Valid modes are: %s',
                    $this->options['mode'],
                    implode(', ', self::VALID_MODES)
                )
            );
        }
    }

    private function validateDismissible(): void
    {
        if (!is_bool($this->options['dismissible'])) {
            throw new \InvalidArgumentException('Dismissible must be a boolean');
        }
    }

    public static function getValidPositions(): array
    {
        return self::VALID_POSITIONS;
    }

    public static function getValidStyles(): array
    {
        return self::VALID_STYLES;
    }

    public static function getValidSizes(): array
    {
        return self::VALID_SIZES;
    }

    public static function getValidModes(): array
    {
        return self::VALID_MODES;
    }
} 