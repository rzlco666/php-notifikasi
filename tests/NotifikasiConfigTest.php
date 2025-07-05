<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Rzlco\PhpNotifikasi\Config\NotifikasiConfig;

class NotifikasiConfigTest extends TestCase
{
    public function testDefaultModeIsLight()
    {
        $config = new NotifikasiConfig();
        $this->assertEquals('light', $config->getDefaultMode());
    }

    public function testCanSetDarkMode()
    {
        $config = new NotifikasiConfig(['default_mode' => 'dark']);
        $this->assertEquals('dark', $config->getDefaultMode());
    }

    public function testCanSetAutoMode()
    {
        $config = new NotifikasiConfig(['default_mode' => 'auto']);
        $this->assertEquals('auto', $config->getDefaultMode());
    }

    public function testInvalidModeThrowsException()
    {
        $this->expectException(\InvalidArgumentException::class);
        new NotifikasiConfig(['default_mode' => 'invalid']);
    }
} 