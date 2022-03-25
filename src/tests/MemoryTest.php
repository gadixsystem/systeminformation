<?php

namespace gadixsystem\systeminformation\tests;

use gadixsystem\systeminformation\Memory;
use gadixsystem\systeminformation\SystemReport;
use PHPUnit\Framework\TestCase;

class MemoryTest extends TestCase
{
    public function testGetSystemInformation()
    {
        $memory = new Memory();
        $this->assertInstanceOf(
            SystemReport::class,
            $memory->getSystemReport()
        );
    }
}
