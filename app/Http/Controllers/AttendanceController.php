<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index(Request $request)
    {
        $year = 2020;
        $month = 03;
        $months = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];
        $search_year = $request->input('search_year');
        $search_month = $request->input('search_month');

        if (!empty($search_year)) {
            $year = $search_year;
        }
        if (!empty($search_month)) {
            $month = $search_month;
        }

        $date = new Carbon("{$year}-{$month}-01");

        $addDay = ($date->copy()->endOfMonth()->isSunday() ? 7 : 0);

        $date->subDay($date->dayOfWeek);
        $count = 31 + $addDay + $date->dayOfWeek;
        $count = ceil($count / 7) * 7;
        $dates = [];

        for ($i = 0; $i < $count; $i++, $date->addDays()) {
            $dates[] = $date->copy();
        }
        return view('attendances.index', compact('dates', 'month', 'year', 'months'));
    }

    public function store(Request $request)
    {
        dd($request);
    }
}
