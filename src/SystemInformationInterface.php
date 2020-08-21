<?php

namespace gadixsystem\systeminformation;

interface SystemInformationInterface
{
    /**
     * Return free
     * @return string
     */
    public function getFree();

    /**
     * Return used
     * @return string
     */
    public function getUsed();

    /**
     * Return total used
     * @return string
     */
    public function getTotal();

    /**
     * Return Percentage of free
     * @return string
     */
    public function getFreePercentage();

    /**
     * Return Percentage of used
     * @return string
     */
    public function getUsedPercentage();

    /**
     * Return the report of proccess
     * @return arr
     */
    public function getReport();
}
