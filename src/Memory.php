<?php

namespace gadixsystem\systeminformation;

class Memory extends SystemInformation
{
    private string $memoryType;

    /**
     * @param string $memoryType
     * @param string $format
     */
    public function __construct(
        string $memoryType = 'Mem',
        string $format = 'h'
    ) {
        parent::__construct(true, $format);
        $this->memoryType = $memoryType;
    }

    /**
     * @return string|null
     */
    public function getFree(): ?string
    {
        try {
            return exec("free " . $this->format . " | grep " . $this->memoryType . "| awk '{print $4}'");
        } catch (\Throwable $throwable) {
            return null;
        }
    }

    /**
     * @return string|null
     */
    public function getUsed(): ?string
    {
        try {
            return exec("free " . $this->format . " | grep " . $this->memoryType . "| awk '{print $3}'");
        } catch (\Throwable $throwable) {
            return null;
        }
    }

    /**
     * @return string|null
     */
    public function getTotal(): ?string
    {
        try {
            return exec("free " . $this->format . " | grep " . $this->memoryType . "| awk '{print $2}'");
        } catch (\Throwable $throwable) {
            return null;
        }
    }

    /**
     * @return string|bool|float|null
     */
    public function getFreePercentage()
    {
        try {
            $result = exec("free | grep " . $this->memoryType . "| awk '{print $4/$2 * 100.0}'");
            if ($this->round && is_numeric($result)) {
                return round($result, 2);
            }

            return $result;
        } catch (\Throwable $throwable) {
            return null;
        }
    }

    /**
     * @return string|bool|float|null
     */
    public function getUsedPercentage()
    {
        try {
            $result = exec("free | grep " . $this->memoryType . "| awk '{print $3/$2 * 100.0}'");
            if ($this->round && is_numeric($result)) {
                return round($result, 2);
            }
            return $result;
        } catch (\Throwable $throwable) {
            return null;
        }
    }
}
