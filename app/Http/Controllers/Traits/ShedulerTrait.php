<?php

namespace App\Http\Controllers\Traits;

trait ShedulerTrait
{
    /**
     * lunes=1..dom=7
     * format
     * string $sScheduler: "1 11:30-16:00|1 18:00-22:30|2 11:30-16:00|2 18:00-22:30"
     * translate:
     * lunes 11:30 hasta 16:30hrs
     * lunes 18:00 hasta 22:30hrs
     * martes 11:30 hasta 16:30hrs
     * martes 18:00 hasta 22:30hrs
     **/

    public function scheduler_active($sScheduler, $iTime = '')
    {
//        $iTime = strtotime('2017-06-28 23:00');
        $aScheduler = explode('|', $sScheduler);
        // print_r($aScheduler);
        $bResult = false;
        foreach ($aScheduler as $sScheduler) {
            list($iWeekDay, $sRangeHoursMinutes) = explode(' ', $sScheduler);

            $bHours = $this->match_in_range_HM($sRangeHoursMinutes, $iTime);
            // var_dump($sHours);var_dump($bHours);echo "\n";

            if (empty($iTime)) $bWeekDay = ($iWeekDay == date('N'));
            else $bWeekDay = ($iWeekDay == date('N', $iTime));

            $bResult = ($bWeekDay && $bHours);
            if ($bResult) return $bResult;
            // var_dump($bResult);
        }
        //return $bResult;
        return true;
    }

    protected function match_in_range_HM($sRangeHoursMinutes, $iTime = '')
    {
        list($sHM1, $sHM2) = explode('-', $sRangeHoursMinutes);
        $isHM1 = strtotime($sHM1);
        $isHM2 = strtotime($sHM2);
        if (empty($iTime)) $iNow = strtotime('now');
        else $iNow = strtotime($iTime);

        return (($isHM1 <= $iNow) && ($iNow <= $isHM2));
    }
}
