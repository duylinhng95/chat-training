<?php

namespace App\Services;

use Carbon\Carbon;

class HRMService
{
    public function getWorkingDays()
    {
        $weekendDays = 0;
        $now         = Carbon::now();
        $daysInMonth = $now->daysInMonth;
        $startDate   = Carbon::create($now->year, $now->month, 1);
        $endDate     = Carbon::create($now->year, $now->month, $daysInMonth);
        do {
            if (in_array($startDate->dayOfWeekIso, [6, 7])) {
                $weekendDays++;
            }
            $startDate->addDay();
        } while (!$startDate->greaterThan($endDate));

        return $daysInMonth - $weekendDays;
    }

    public function setHolidaysInMonth($param)
    {
        $startDate = Carbon::create($param['start']);
        $endDate   = Carbon::create($param['end']);
        dd($startDate, $endDate);

    }

    public function getHolidaysInMonth()
    {

    }
}
