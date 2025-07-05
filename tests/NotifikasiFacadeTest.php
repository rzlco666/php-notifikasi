<?php

namespace Rzlco\PhpNotifikasi\Tests;

use PHPUnit\Framework\TestCase;
use Rzlco\PhpNotifikasi\NotifikasiFacade;
use Rzlco\PhpNotifikasi\Notification;
use Rzlco\PhpNotifikasi\Notifikasi;
use Rzlco\PhpNotifikasi\Storage\ArrayStorage;

class NotifikasiFacadeTest extends TestCase
{
    protected function setUp(): void
    {
        // Reset facade and set ArrayStorage for testing
        NotifikasiFacade::reset();
        NotifikasiFacade::setInstance(new Notifikasi(new ArrayStorage()));
    }

    public function testSingleton()
    {
        $instance1 = NotifikasiFacade::getInstance();
        $instance2 = NotifikasiFacade::getInstance();

        $this->assertSame($instance1, $instance2);
    }

    public function testCanAddSuccessNotification()
    {
        NotifikasiFacade::success('Success!', 'Everything works fine');

        $notifications = NotifikasiFacade::all();
        $this->assertCount(1, $notifications);
        $this->assertEquals(Notification::TYPE_SUCCESS, $notifications[0]->getType());
        $this->assertEquals('Success!', $notifications[0]->getTitle());
        $this->assertEquals('Everything works fine', $notifications[0]->getMessage());
    }

    public function testCanAddErrorNotification()
    {
        NotifikasiFacade::error('Error!', 'Something went wrong');

        $notifications = NotifikasiFacade::all();
        $this->assertCount(1, $notifications);
        $this->assertEquals(Notification::TYPE_ERROR, $notifications[0]->getType());
    }

    public function testCanAddWarningNotification()
    {
        NotifikasiFacade::warning('Warning!', 'Be careful');

        $notifications = NotifikasiFacade::all();
        $this->assertCount(1, $notifications);
        $this->assertEquals(Notification::TYPE_WARNING, $notifications[0]->getType());
    }

    public function testCanAddInfoNotification()
    {
        NotifikasiFacade::info('Info', 'Just so you know');

        $notifications = NotifikasiFacade::all();
        $this->assertCount(1, $notifications);
        $this->assertEquals(Notification::TYPE_INFO, $notifications[0]->getType());
    }

    public function testCanAddCustomNotification()
    {
        NotifikasiFacade::add('custom', 'Custom', 'Custom message');

        $notifications = NotifikasiFacade::all();
        $this->assertCount(1, $notifications);
        $this->assertEquals('custom', $notifications[0]->getType());
    }

    public function testCanAddMultipleNotifications()
    {
        NotifikasiFacade::success('Success');
        NotifikasiFacade::error('Error');
        NotifikasiFacade::warning('Warning');

        $notifications = NotifikasiFacade::all();
        $this->assertCount(3, $notifications);
    }

    public function testCanClearNotifications()
    {
        NotifikasiFacade::success('Success');
        NotifikasiFacade::error('Error');

        $this->assertCount(2, NotifikasiFacade::all());

        NotifikasiFacade::clear();

        $this->assertCount(0, NotifikasiFacade::all());
    }

    public function testHasNotifications()
    {
        $this->assertFalse(NotifikasiFacade::hasNotifications());

        NotifikasiFacade::info('Test');

        $this->assertTrue(NotifikasiFacade::hasNotifications());
    }

    public function testRenderClearsNotifications()
    {
        NotifikasiFacade::success('Test');
        $this->assertCount(1, NotifikasiFacade::all());

        $html = NotifikasiFacade::render();
        $this->assertNotEmpty($html);
        $this->assertCount(0, NotifikasiFacade::all());
    }

    public function testJsonClearsNotifications()
    {
        NotifikasiFacade::success('Test');
        $this->assertCount(1, NotifikasiFacade::all());

        $json = NotifikasiFacade::json();
        $this->assertJson($json);
        $this->assertCount(0, NotifikasiFacade::all());
    }

    public function testCanSetCustomOptions()
    {
        NotifikasiFacade::success('Test', '', ['position' => 'bottom-left']);

        $notifications = NotifikasiFacade::all();
        $this->assertEquals('bottom-left', $notifications[0]->getOption('position'));
    }
}