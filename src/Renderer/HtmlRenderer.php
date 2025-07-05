<?php

namespace Rzlco\PhpNotifikasi\Renderer;

use Rzlco\PhpNotifikasi\Notification;
use Rzlco\PhpNotifikasi\Renderer\Styles\NotificationStyleFactory;
use Rzlco\PhpNotifikasi\Renderer\Services\IconService;
use Rzlco\PhpNotifikasi\Renderer\Assets\CssAssetManager;
use Rzlco\PhpNotifikasi\Renderer\Assets\JavaScriptAssetManager;

class HtmlRenderer implements RendererInterface
{
    private NotificationStyleFactory $styleFactory;
    private IconService $iconService;
    private CssAssetManager $cssManager;
    private JavaScriptAssetManager $jsManager;

    public function __construct()
    {
        $this->styleFactory = new NotificationStyleFactory();
        $this->iconService = new IconService();
        $this->cssManager = new CssAssetManager();
        $this->jsManager = new JavaScriptAssetManager();
    }

    public function render(array $notifications, array $config = []): string
    {
        if (empty($notifications)) {
            return '';
        }

        $html = $this->cssManager->render();
        $html .= $this->renderNotifications($notifications);
        $html .= $this->jsManager->render();

        return $html;
    }

    private function renderNotifications(array $notifications): string
    {
        $positions = $this->groupNotificationsByPosition($notifications);
        $html = '';

        foreach ($positions as $position => $notifs) {
            $html .= $this->renderContainer($position, $notifs);
        }

        return $html;
    }

    private function groupNotificationsByPosition(array $notifications): array
    {
        $positions = [];
        foreach ($notifications as $notification) {
            $position = $notification->getOption('position', 'top-right');
            $positions[$position][] = $notification;
        }
        return $positions;
    }

    private function renderContainer(string $position, array $notifications): string
    {
        $positionClasses = $this->getPositionClasses($position);
        $html = '<div class="php-notifikasi-container ' . $positionClasses . ' p-4 space-y-2" data-position="' . $position . '">' . "\n";
        
        foreach ($notifications as $notification) {
            $animationClass = $this->getAnimationClass($position);
            $html .= $this->renderNotification($notification, $animationClass);
        }
        
        $html .= '</div>' . "\n";
        return $html;
    }

    private function getPositionClasses(string $position): string
    {
        switch($position) {
            case 'top-left':
                return 'top-0 left-0';
            case 'top-right':
                return 'top-0 right-0';
            case 'top-center':
                return 'top-0 left-1/2 transform -translate-x-1/2';
            case 'bottom-left':
                return 'bottom-0 left-0';
            case 'bottom-right':
                return 'bottom-0 right-0';
            case 'bottom-center':
                return 'bottom-0 left-1/2 transform -translate-x-1/2';
            default:
                return 'top-0 right-0';
        }
    }

    private function getMaxWidthClass(string $containerSize): string
    {
        switch($containerSize) {
            case 'sm':
                return 'max-w-sm';
            case 'md':
                return 'max-w-md';
            case 'lg':
                return 'max-w-lg';
            default:
                return 'max-w-md';
        }
    }

    private function getAnimationClass(string $position): string
    {
        if (strpos($position, 'right') !== false) return 'slide-in-right';
        if (strpos($position, 'left') !== false) return 'slide-in-left';
        if (strpos($position, 'top') !== false) return 'slide-in-top';
        if (strpos($position, 'bottom') !== false) return 'slide-in-bottom';
        return 'slide-in-right';
    }

    private function renderNotification(Notification $notification, string $animationClass): string
    {
        $styleClasses = $this->styleFactory->createStyleClasses($notification);
        $icon = $this->iconService->getIconForNotification($notification);
        
        $duration = $notification->getOption('duration', 5000);
        $dismissible = $notification->getOption('dismissible', true);
        $size = $notification->getOption('size', 'md');
        
        $sizeClass = 'notif-' . $size;
        $timestamp = date('g:i A');
        
        return $this->buildNotificationHtml(
            $notification,
            $styleClasses,
            $icon,
            $duration,
            $dismissible,
            $sizeClass,
            $timestamp,
            $animationClass
        );
    }

    private function buildNotificationHtml(
        Notification $notification,
        $styleClasses,
        string $icon,
        int $duration,
        bool $dismissible,
        string $sizeClass,
        string $timestamp,
        string $animationClass
    ): string {
        $mode = $notification->getOption('mode', 'light');
        
        $html = '<div class="mb-2 pointer-events-auto ' . $animationClass . ' transform transition-all duration-200 hover:scale-105">' . "\n";
        $html .= '  <div class="' . $styleClasses->getBackgroundClass() . ' rounded-xl notif-shadow overflow-hidden ios-font ' . $sizeClass . '"' . "\n";
        $html .= '       id="' . $notification->getId() . '"' . "\n";
        $html .= '       data-duration="' . $duration . '"' . "\n";
        $html .= '       data-dismissible="' . ($dismissible ? 'true' : 'false') . '"' . "\n";
        $html .= '       data-mode="' . $mode . '">' . "\n";
        
        // Progress bar
        if ($duration > 0) {
            $html .= '    <div class="' . $styleClasses->getProgressClass() . ' w-full" id="progress-' . $notification->getId() . '"></div>' . "\n";
        }
        
        $html .= '    <div class="flex items-start px-4 py-3 relative">' . "\n";
        
        // Icon
        $html .= '      <div class="flex-shrink-0 mr-3 mt-0.5">' . "\n";
        $html .= '        <div class="w-6 h-6 rounded-full flex items-center justify-center ' . $styleClasses->getIconBadgeClass() . '">' . "\n";
        $html .= '          ' . $icon . "\n";
        $html .= '        </div>' . "\n";
        $html .= '      </div>' . "\n";
        
        // Content
        $html .= $this->renderContent($notification, $styleClasses, $timestamp);
        
        // Close button
        if ($dismissible) {
            $html .= $this->renderCloseButton($notification, $styleClasses);
        }
        
        $html .= '    </div>' . "\n";
        $html .= '  </div>' . "\n";
        $html .= '</div>' . "\n";
        
        return $html;
    }

    private function renderContent(Notification $notification, $styleClasses, string $timestamp): string
    {
        $html = '      <div class="flex-1 min-w-0">' . "\n";
        $html .= '        <div class="flex items-center justify-between mb-0.5">' . "\n";
        $html .= '          <h4 class="' . $styleClasses->getTitleClass() . ' text-sm leading-tight">' . htmlspecialchars($notification->getTitle()) . '</h4>' . "\n";
        $html .= '          <span class="' . $styleClasses->getTimeClass() . ' text-xs ml-2 flex-shrink-0">' . $timestamp . '</span>' . "\n";
        $html .= '        </div>' . "\n";
        
        if (!empty($notification->getMessage())) {
            $html .= '        <p class="' . $styleClasses->getMessageClass() . ' text-xs leading-relaxed">' . htmlspecialchars($notification->getMessage()) . '</p>' . "\n";
        }
        
        $html .= '      </div>' . "\n";
        
        return $html;
    }

    private function renderCloseButton(Notification $notification, $styleClasses): string
    {
        $html = '      <button class="flex-shrink-0 ml-2 ' . $styleClasses->getCloseClass() . '"' . "\n";
        $html .= '              onclick="phpNotifikasi.dismiss(\'' . $notification->getId() . '\')">' . "\n";
        $html .= '        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">' . "\n";
        $html .= '          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"></path>' . "\n";
        $html .= '        </svg>' . "\n";
        $html .= '      </button>' . "\n";
        
        return $html;
    }
} 