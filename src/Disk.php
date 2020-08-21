<?php

namespace gadixsystem\systeminformation;

class Disk extends SystemInformation
{
    /**
     * Construct the format of returns
     * @param $diskName string
     */
    public function __construct($folder = '/')
    {
        parent::__construct();
        $this->format = '--' . config('systeminformation.unit');
        $this->folder = $folder;
    }

    /**
     * @return string
     */
    public function getFree()
    {
        return disk_free_space($this->folder);
    }

    /**
     * @return string
     */
    public function getUsed()
    {
        return disk_total_space($this->folder) - disk_free_space($this->folder);
    }

    /**
     * @return string
     */
    public function getTotal()
    {
        return disk_total_space($this->folder);
    }

    /**
     * @return string
     */
    public function getFreePercentage()
    {
        $result = (disk_free_space($this->folder) * 100) / disk_total_space($this->folder);
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
        $result = ((disk_total_space($this->folder) - disk_free_space($this->folder)) * 100)
            / disk_total_space($this->folder);
        if ($this->round && is_numeric($result)) {
            return round($result, 2);
        }
        return $result;
    }
}
