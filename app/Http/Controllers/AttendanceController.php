<?php

namespace App\Http\Controllers;

use App\Http\Requests\AttendanceRequest;
use App\Models\Attendance;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    public function index(Request $request)
    {
        $year = explode('-', Carbon::now())[0];
        $month = explode('-', Carbon::now())[1];
        $months = ['選んでください', '1月', '2月', '3月', '4月', '5月', '6月', '7月', '8月', '9月', '10月', '11月', '12月'];
        $search_year = $request->input('search_year');
        $search_month = $request->input('search_month');

        if (!empty($search_year)) {
            $year = $search_year;
        }
        if (!empty($search_month)) {
            $month = $search_month;
        }

        $date = new Carbon("{$year}-{$month}-01");

        $attendances = Attendance::where('user_id', auth()->user()->id)->totalSalaryAtThisMonth()->get();
        $addDay = ($date->copy()->endOfMonth()->isSunday() ? 7 : 0);

        $date->subDay($date->dayOfWeek);
        $count = 31 + $addDay + $date->dayOfWeek;
        $count = ceil($count / 7) * 7;
        $dates = [];

        for ($i = 0; $i < $count; $i++, $date->addDays()) {
            $dates[] = $date->copy();
        }

        $user_salary = Auth::user()->salaries[0]->salary;

        $total_working_hour = 0;

        if (!empty($attendances)) {
            foreach ($attendances as $attendance) {
                $total_working_hour_by_day = ($attendance->end_hour - $attendance->start_hour);
                $total_working_hour += $total_working_hour_by_day;
            }
        }

        $total_salary = $user_salary * $total_working_hour;

        return view('attendances.index', compact('dates', 'month', 'year', 'months', 'attendances', 'total_salary'));
    }

    public function store(AttendanceRequest $request)
    {
        $attendance = new Attendance();
        $attendance->user_id = $request->user_id;
        $attendance->start_time = $request->start_time;
        $attendance->start_year = substr($request->start_time, 0, 4);
        $attendance->start_month = substr($request->start_time, 5, 2);
        $attendance->start_day = substr($request->start_time, 8, 2);
        $attendance->start_hour = explode(':', explode(' ', $request->start_time)[1])[0];
        $attendance->start_minute = explode(':', explode(' ', $request->start_time)[1])[1];

        $attendance->end_time = $request->end_time;
        $attendance->end_year = substr($request->end_time, 0, 4);
        $attendance->end_month = substr($request->end_time, 5, 2);
        $attendance->end_day = substr($request->end_time, 8, 2);
        $attendance->end_hour = explode(':', explode(' ', $request->end_time)[1])[0];
        $attendance->end_minute = explode(':', explode(' ', $request->end_time)[1])[1];

        $attendance->save();

        return redirect()->back()->with('success', '勤怠を登録しました');
    }
}
