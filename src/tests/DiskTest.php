<?php

namespace gadixsystem\systeminformation\tests;

use Tests\TestCase;

use gadixsystem\systeminformation\Disk;

class DiskTest extends TestCase
{

    private $disk;

    public function __construct()
    {
        $this->disk = new Disk();
    }

    public function testgetFreeTest()
    {
        $this->assertIsString($this->disk->getFree('h'));
    }
}
