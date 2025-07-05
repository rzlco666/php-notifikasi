<?php

namespace Rzlco\PhpNotifikasi\Renderer\Styles;

class StyleClasses
{
    private string $backgroundClass;
    private string $titleClass;
    private string $messageClass;
    private string $timeClass;
    private string $closeClass;
    private string $iconBadgeClass;
    private string $progressClass;

    public function __construct(
        string $backgroundClass,
        string $titleClass,
        string $messageClass,
        string $timeClass,
        string $closeClass,
        string $iconBadgeClass,
        string $progressClass
    ) {
        $this->backgroundClass = $backgroundClass;
        $this->titleClass = $titleClass;
        $this->messageClass = $messageClass;
        $this->timeClass = $timeClass;
        $this->closeClass = $closeClass;
        $this->iconBadgeClass = $iconBadgeClass;
        $this->progressClass = $progressClass;
    }

    public function getBackgroundClass(): string
    {
        return $this->backgroundClass;
    }

    public function getTitleClass(): string
    {
        return $this->titleClass;
    }

    public function getMessageClass(): string
    {
        return $this->messageClass;
    }

    public function getTimeClass(): string
    {
        return $this->timeClass;
    }

    public function getCloseClass(): string
    {
        return $this->closeClass;
    }

    public function getIconBadgeClass(): string
    {
        return $this->iconBadgeClass;
    }

    public function getProgressClass(): string
    {
        return $this->progressClass;
    }
} 