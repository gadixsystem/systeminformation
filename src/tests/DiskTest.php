<?php

namespace gadixsystem\systeminformation\tests;

use gadixsystem\systeminformation\Disk;
use gadixsystem\systeminformation\SystemReport;
use PHPUnit\Framework\TestCase;

class DiskTest extends TestCase
{
    public function testFreeTest()
    {
        $disk = new Disk();
        $this->assertIsFloat($disk->getFree());
    }

    public function testGetSystemInformation()
    {
        $disk = new Disk();
        $this->assertInstanceOf(
            SystemReport::class,
            $disk->getSystemReport()
        );
    }
}
