<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class AtdConfirmController extends Controller
{
    public function index($year = 2020, $month = 3)
    {
        $date = new Carbon("{$year}-{$month}-01");

        $addDay = ($date->copy()->endOfMonth()->isSunday() ? 7 : 0);
        $months = [1,2,3,4,5,6,7,8,9,10,11, 12];

        $date->subDay($date->dayOfWeek);
        $count = 31 + $addDay + $date->dayOfWeek;
        $count = ceil($count / 7) * 7;
        $dates = [];

        for ($i = 0; $i < $count; $i++, $date->addDays()) {
            $dates[] = $date->copy();
        }
        return view('atd_confirm.index', compact('dates', 'months'));
    }
}
