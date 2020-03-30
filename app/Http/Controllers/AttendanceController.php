<?php

namespace App\Http\Controllers;

use App\Http\Requests\AttendaceRequest;
use App\Models\Attendance;
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

        $attendances = Attendance::all();
        $addDay = ($date->copy()->endOfMonth()->isSunday() ? 7 : 0);

        $date->subDay($date->dayOfWeek);
        $count = 31 + $addDay + $date->dayOfWeek;
        $count = ceil($count / 7) * 7;
        $dates = [];

        for ($i = 0; $i < $count; $i++, $date->addDays()) {
            $dates[] = $date->copy();
        }
        return view('attendances.index', compact('dates', 'month', 'year', 'months', 'attendances'));
    }

    public function store(AttendaceRequest $request)
    {
        $attendance = new Attendance();
        $attendance->user_id = $request->user_id;
        $attendance->start_time = $request->start_time;
        $attendance->start_year = substr($request->start_time, 0, 4);
        $attendance->start_month = substr($request->start_time, 4, 2);
        $attendance->start_day = substr($request->start_time, 6, 2);

        $attendance->end_time = $request->end_time;
        $attendance->end_year = substr($request->end_time, 0, 4);
        $attendance->end_month = substr($request->end_time, 4, 2);
        $attendance->end_day = substr($request->end_time, 6, 2);
        $attendance->save();

        return redirect()->back()->with('success', '勤怠を登録しました');
    }
}
