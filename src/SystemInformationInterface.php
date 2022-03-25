<?php

namespace gadixsystem\systeminformation;

interface SystemInformationInterface
{
    /**
     * Return free
     * @return mixed
     */
    public function getFree();

    /**
     * Return used
     * @return mixed
     */
    public function getUsed();

    /**
     * Return total used
     * @return mixed
     */
    public function getTotal();

    /**
     * Return Percentage of free
     * @return mixed
     */
    public function getFreePercentage();

    /**
     * Return Percentage of used
     * @return mixed
     */
    public function getUsedPercentage();

    /**
     * Return the report of proccess
     * @return mixed
     */
    public function getReport();

    /**
     * @return SystemReport
     */
    public function getSystemReport(): SystemReport;
}
