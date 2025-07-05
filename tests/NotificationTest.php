<?php

namespace Rzlco\PhpNotifikasi\Tests;

use PHPUnit\Framework\TestCase;
use Rzlco\PhpNotifikasi\Notification;

class NotificationTest extends TestCase
{
    public function testCanCreateNotification()
    {
        $notification = new Notification('success', 'Test Title', 'Test Message');
        
        $this->assertEquals('success', $notification->getType());
        $this->assertEquals('Test Title', $notification->getTitle());
        $this->assertEquals('Test Message', $notification->getMessage());
        $this->assertNotEmpty($notification->getId());
    }

    public function testCanCreateNotificationWithOptions()
    {
        $options = [
            'position' => 'top-left',
            'duration' => 3000,
            'style' => 'colored',
            'size' => 'lg'
        ];
        
        $notification = new Notification('error', 'Error Title', 'Error Message', $options);
        
        $this->assertEquals('error', $notification->getType());
        $this->assertEquals('Error Title', $notification->getTitle());
        $this->assertEquals('Error Message', $notification->getMessage());
        $this->assertEquals('top-left', $notification->getOption('position'));
        $this->assertEquals(3000, $notification->getOption('duration'));
        $this->assertEquals('colored', $notification->getOption('style'));
        $this->assertEquals('lg', $notification->getOption('size'));
    }

    public function testGetOptionReturnsDefaultWhenKeyNotFound()
    {
        $notification = new Notification('info', 'Info Title', 'Info Message');
        
        $this->assertEquals('default_value', $notification->getOption('nonexistent', 'default_value'));
    }

    public function testToArray()
    {
        $notification = new Notification('warning', 'Warning Title', 'Warning Message');
        $array = $notification->toArray();
        
        $this->assertArrayHasKey('id', $array);
        $this->assertArrayHasKey('type', $array);
        $this->assertArrayHasKey('title', $array);
        $this->assertArrayHasKey('message', $array);
        $this->assertArrayHasKey('options', $array);
        
        $this->assertEquals('warning', $array['type']);
        $this->assertEquals('Warning Title', $array['title']);
        $this->assertEquals('Warning Message', $array['message']);
    }

    public function testGetValidTypes()
    {
        $validTypes = Notification::getValidTypes();
        
        $this->assertContains('success', $validTypes);
        $this->assertContains('error', $validTypes);
        $this->assertContains('warning', $validTypes);
        $this->assertContains('info', $validTypes);
        $this->assertContains('custom', $validTypes);
    }

    public function testSanitizesInput()
    {
        $notification = new Notification('success', '  Trimmed Title  ', '  Trimmed Message  ');
        
        $this->assertEquals('Trimmed Title', $notification->getTitle());
        $this->assertEquals('Trimmed Message', $notification->getMessage());
    }

    public function testNotificationWithDarkMode()
    {
        $notification = new Notification('success', 'Test Title', 'Test Message', [
            'mode' => 'dark'
        ]);
        
        $this->assertEquals('dark', $notification->getOption('mode'));
        $this->assertEquals('dark', $notification->getOptions()['mode']);
    }

    public function testNotificationWithAutoMode()
    {
        $notification = new Notification('error', 'Test Title', 'Test Message', [
            'mode' => 'auto'
        ]);
        
        $this->assertEquals('auto', $notification->getOption('mode'));
        $this->assertEquals('auto', $notification->getOptions()['mode']);
    }

    public function testNotificationWithInvalidMode()
    {
        $this->expectException(\InvalidArgumentException::class);
        
        new Notification('success', 'Test Title', 'Test Message', [
            'mode' => 'invalid'
        ]);
    }
} 