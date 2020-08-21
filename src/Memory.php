<?php

namespace gadixsystem\systeminformation;

class Memory extends SystemInformation
{
    /**
     * Construct the format of returns
     * @param $memoryType string
     */
    public function __construct($memoryType = 'Mem')
    {
        parent::__construct();
        $this->memoryType = $memoryType;
    }

    /**
     * @return string
     */
    public function getFree()
    {
        return exec("free " . $this->format . " | grep " . $this->memoryType . "| awk '{print $4}'");
    }

    /**
     * @return string
     */
    public function getUsed()
    {
        return exec("free " . $this->format . " | grep " . $this->memoryType . "| awk '{print $3}'");
    }

    /**
     * @return string
     */
    public function getTotal()
    {
        return exec("free " . $this->format . " | grep " . $this->memoryType . "| awk '{print $2}'");
    }

    /**
     * @return string
     */
    public function getFreePercentage()
    {
        $result = exec("free | grep " . $this->memoryType . "| awk '{print $4/$2 * 100.0}'");
        if ($this->round && is_numeric($result)) {
            return round($result, 2);
        }
        return $result;
    }

    /**
     * @return string
     */
    public function getUsedPercentage()
    {
        $result = exec("free | grep " . $this->memoryType . "| awk '{print $3/$2 * 100.0}'");
        if ($this->round && is_numeric($result)) {
            return round($result, 2);
        }
        return $result;
    }
}
