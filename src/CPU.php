<?php

namespace gadixsystem\systeminformation;

class CPU extends SystemInformation
{
    /**
     * @return array|false|null
     */
    public function getAvg()
    {
        try {
            return sys_getloadavg();
        } catch (\Throwable $throwable) {
            return null;
        }
    }

    /**
     * Official Php contribution
     * https://www.php.net/manual/es/function.sys-getloadavg.php#118673
     * @return array|null
     */
    public function getServerLoad(): ?array
    {
        if (is_readable("/proc/stat")) {
            $stats = @file_get_contents("/proc/stat");

            if ($stats !== false) {
                // Remove double spaces to make it easier to extract values with explode()
                $stats = preg_replace("/[[:blank:]]+/", " ", $stats);

                // Separate lines
                $stats = str_replace(array("\r\n", "\n\r", "\r"), "\n", $stats);
                $stats = explode("\n", $stats);

                // Separate values and find line for main CPU load
                foreach ($stats as $statLine) {
                    $statLineData = explode(" ", trim($statLine));

                    // Found!
                    if (
                        (count($statLineData) >= 5) &&
                        ($statLineData[0] == "cpu")
                    ) {
                        return array(
                            $statLineData[1],
                            $statLineData[2],
                            $statLineData[3],
                            $statLineData[4],
                        );
                    }
                }
            }
        }

        return null;
    }
}
