<?php

namespace Rzlco\PhpNotifikasi\Config;

use Rzlco\PhpNotifikasi\ValueObjects\NotificationOptions;

class NotifikasiConfig
{
    private const DEFAULT_CONFIG = [
        'default_position' => 'top-right',
        'default_duration' => 5000,
        'default_style' => 'clean',
        'default_size' => 'md',
        'default_mode' => 'light',
        'include_css' => true,
        'include_js' => true,
        'theme' => 'ios'
    ];

    private array $config;

    public function __construct(array $config = [])
    {
        $this->config = array_merge(self::DEFAULT_CONFIG, $config);
        $this->validate();
    }

    public function get(string $key, $default = null)
    {
        return $this->config[$key] ?? $default;
    }

    public function set(string $key, $value): void
    {
        $this->config[$key] = $value;
        $this->validate();
    }

    public function toArray(): array
    {
        return $this->config;
    }

    public function getDefaultPosition(): string
    {
        return $this->config['default_position'];
    }

    public function getDefaultDuration(): int
    {
        return $this->config['default_duration'];
    }

    public function getDefaultStyle(): string
    {
        return $this->config['default_style'];
    }

    public function getDefaultSize(): string
    {
        return $this->config['default_size'];
    }

    public function getDefaultMode(): string
    {
        return $this->config['default_mode'];
    }

    public function shouldIncludeCss(): bool
    {
        return $this->config['include_css'];
    }

    public function shouldIncludeJs(): bool
    {
        return $this->config['include_js'];
    }

    public function getTheme(): string
    {
        return $this->config['theme'];
    }

    private function validate(): void
    {
        $this->validatePosition();
        $this->validateDuration();
        $this->validateStyle();
        $this->validateSize();
        $this->validateMode();
        $this->validateBooleans();
    }

    private function validatePosition(): void
    {
        if (!in_array($this->config['default_position'], NotificationOptions::getValidPositions(), true)) {
            throw new \InvalidArgumentException(
                sprintf('Invalid default position: %s', $this->config['default_position'])
            );
        }
    }

    private function validateDuration(): void
    {
        if (!is_int($this->config['default_duration']) || $this->config['default_duration'] < 0) {
            throw new \InvalidArgumentException('Default duration must be a non-negative integer');
        }
    }

    private function validateStyle(): void
    {
        if (!in_array($this->config['default_style'], NotificationOptions::getValidStyles(), true)) {
            throw new \InvalidArgumentException(
                sprintf('Invalid default style: %s', $this->config['default_style'])
            );
        }
    }

    private function validateSize(): void
    {
        if (!in_array($this->config['default_size'], NotificationOptions::getValidSizes(), true)) {
            throw new \InvalidArgumentException(
                sprintf('Invalid default size: %s', $this->config['default_size'])
            );
        }
    }

    private function validateMode(): void
    {
        if (!in_array($this->config['default_mode'], ['light', 'dark', 'auto'], true)) {
            throw new \InvalidArgumentException(
                sprintf('Invalid default mode: %s. Must be light, dark, or auto', $this->config['default_mode'])
            );
        }
    }

    private function validateBooleans(): void
    {
        if (!is_bool($this->config['include_css'])) {
            throw new \InvalidArgumentException('include_css must be a boolean');
        }
        if (!is_bool($this->config['include_js'])) {
            throw new \InvalidArgumentException('include_js must be a boolean');
        }
    }
} 