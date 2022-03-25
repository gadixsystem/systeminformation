<?php

namespace gadixsystem\systeminformation\tests;

use gadixsystem\systeminformation\CPU;
use gadixsystem\systeminformation\Disk;
use gadixsystem\systeminformation\Memory;
use PHPUnit\Framework\TestCase;

class LegacyTest extends TestCase
{
    protected const LEGACY_REPORT_KEYS = [
        'free',
        'used',
        'total',
        'freePercentage',
        'usedPercentage',
        'bufferPercentage',
    ];

    public function testLegacyDiskGetReport()
    {
        $disk = new Disk();
        $diskReport = $disk->getReport();

        $this->assertIsArray($diskReport);

        foreach (self::LEGACY_REPORT_KEYS as $key) {
            $this->assertArrayHasKey($key, $diskReport);
        }
    }

    public function testLegacyCPUGetReport()
    {
        $cpu = new CPU();
        $cpuReport = $cpu->getReport();

        $this->assertIsArray($cpuReport);

        foreach (self::LEGACY_REPORT_KEYS as $key) {
            $this->assertArrayHasKey($key, $cpuReport);
        }
    }

    public function testLegacyMemoryGetReport()
    {
        $memory = new Memory();
        $memoryReport = $memory->getReport();

        $this->assertIsArray($memoryReport);

        foreach (self::LEGACY_REPORT_KEYS as $key) {
            $this->assertArrayHasKey($key, $memoryReport, "$key not found");
        }
    }
}
