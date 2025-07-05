<?php

namespace Rzlco\PhpNotifikasi\Renderer;

use Rzlco\PhpNotifikasi\Notification;

interface RendererInterface
{
    /**
     * Render notifications
     * 
     * @param Notification[] $notifications
     */
    public function render(array $notifications, array $config = []): string;
} 