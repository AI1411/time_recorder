<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function getCalenderDate($year = 2020, $month = 4)
    {
//        $dateStr = sprintf('%04d-%02d-01', $year, $month);
        $date = new Carbon("{$year}-{$month}-01");

        $addDay = ($date->copy()->endOfMonth()->isSunday() ? 7 : 0);

        $date->subDay($date->dayOfWeek);
        $count = 31 + $addDay + $date->dayOfWeek;
        $count = ceil($count / 7) * 7;
        $dates = [];

        for ($i = 0; $i < $count; $i++, $date->addDays()) {
            $dates[] = $date->copy();
        }
        return view('attendances.index', compact('dates'));
    }
}
