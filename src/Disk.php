<?php

namespace gadixsystem\systeminformation;

class Disk extends SystemInformation
{
    private string $folder;

    /**
     * @param string $folder
     * @param bool $round
     */
    public function __construct(
        string $folder = '/',
        bool $round = true
    ) {
        $this->folder = $folder;
        parent::__construct($round);
    }

    /**
     * @return false|float|null
     */
    public function getFree()
    {
        try {
            return disk_free_space($this->folder);
        } catch (\Throwable $throwable) {
            return null;
        }
    }

    /**
     * @return false|float|null
     */
    public function getUsed()
    {
        try {
            return disk_total_space($this->folder) - disk_free_space($this->folder);
        } catch (\Throwable $throwable) {
            return null;
        }
    }

    /**
     * @return false|float|null
     */
    public function getTotal()
    {
        try {
            return disk_total_space($this->folder);
        } catch (\Throwable $throwable) {
            return null;
        }
    }

    /**
     * @return float|int|null
     */
    public function getFreePercentage()
    {
        try {
            $result = (disk_free_space($this->folder) * 100) / disk_total_space($this->folder);
            if ($this->round && is_numeric($result)) {
                return round($result, 2);
            }
            return $result;
        } catch (\Throwable $throwable) {
            return null;
        }
    }

    /**
     * @return float|int
     */
    public function getUsedPercentage()
    {
        try {
            $result = ((disk_total_space($this->folder) - disk_free_space($this->folder)) * 100)
                / disk_total_space($this->folder);
            if ($this->round && is_numeric($result)) {
                return round($result, 2);
            }

            return $result;
        } catch (\Throwable $throwable) {
            return null;
        }
    }
}
