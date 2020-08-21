<?php

namespace gadixsystem\systeminformation;

class SystemInformation implements SystemInformationInterface
{
    public function __construct($round = true, $format = 'h')
    {
        $this->round = $round;
        $this->format = '--' . $format;
        if (function_exists('config')) {
            $this->format = '--' . config('systeminformation.unit');
        }
    }

    public function getFree()
    {
        //
    }

    public function getUsed()
    {
        //
    }

    public function getTotal()
    {
        //
    }

    public function getFreePercentage()
    {
        //
    }

    public function getUsedPercentage()
    {
        //
    }

    /**
     * @return array
     */
    public function getReport()
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
}
