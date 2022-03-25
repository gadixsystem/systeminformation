<?php

namespace gadixsystem\systeminformation;

class SystemInformation implements SystemInformationInterface
{
    protected bool $round;
    protected string $format;

    public function __construct(
        bool $round = true,
        string $format = 'h'
    ) {
        $this->round = $round;
        $this->format = '--' . $format;
        if (function_exists('config')) {
            $this->format = '--' . config('systeminformation.unit');
        }
    }

    public function getFree()
    {
        return null;
    }

    public function getUsed()
    {
        return null;
    }

    public function getTotal()
    {
        return null;
    }

    public function getFreePercentage()
    {
        return null;
    }

    public function getUsedPercentage()
    {
        return null;
    }

    /**
     * You should use getSystemReport instead of this method.
     * @deprecated
     */
    public function getReport(): array
    {
        $freePercentage = $this->getFreePercentage();
        $usedPercentage = $this->getUsedPercentage();
        $buffer = '0';
        if (is_numeric($freePercentage) && is_numeric($usedPercentage)) {
            if ($freePercentage + $usedPercentage != 100) {
                $buffer = 100 - $freePercentage - $usedPercentage;
            }
        }
        return [
            'free' => $this->getFree(),
            'used' => $this->getUsed(),
            'total' => $this->getTotal(),
            'freePercentage' => $freePercentage,
            'usedPercentage' => $usedPercentage,
            'bufferPercentage' => $buffer
        ];
    }

    public function getSystemReport(): SystemReport
    {
        $freePercentage = $this->getFreePercentage();
        $usedPercentage = $this->getUsedPercentage();
        $buffer = '0';
        if (is_numeric($freePercentage) && is_numeric($usedPercentage)) {
            if ($freePercentage + $usedPercentage != 100) {
                $buffer = 100 - $freePercentage - $usedPercentage;
            }
        }

        return new SystemReport(
            (string) $this->getFree(),
            (string) $this->getUsed(),
            (string) $this->getTotal(),
            (string) $freePercentage,
            (string) $usedPercentage,
            (string) $buffer
        );
    }
}
