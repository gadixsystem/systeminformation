<?php

namespace gadixsystem\systeminformation\tests;

use gadixsystem\systeminformation\CPU;
use PHPUnit\Framework\TestCase;

class CPUTest extends TestCase
{
    public function testAvg()
    {
        $cpu = new CPU();
        $this->assertIsArray($cpu->getAvg());
    }
}
