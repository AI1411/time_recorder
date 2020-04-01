<?php

namespace App\Http\Controllers;

use App\Cost;
use App\Http\Requests\ExpenseRequest;
use App\Models\Attendance;
use App\Models\Expense;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpenseController extends Controller
{
    public function index(Request $request)
    {
        //カレンダー作成
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

        $addDay = ($date->copy()->endOfMonth()->isSunday() ? 7 : 0);

        $date->subDay($date->dayOfWeek);
        $count = 31 + $addDay + $date->dayOfWeek;
        $count = ceil($count / 7) * 7;
        $dates = [];

        for ($i = 0; $i < $count; $i++, $date->addDays()) {
            $dates[] = $date->copy();
        }

        //経費の計算処理
        $total_expense_result = 0;
        $total_expense = Expense::where('user_id', Auth::user()->id)->targetMonth()->get();
        $costs = Cost::all();
        $expense_array = [];
        foreach ($total_expense as $expense) {
            $total_expense_result += $expense->fee;
        }
        return view('expenses.index', compact(
            'dates',
            'month',
            'year',
            'months',
            'total_expense',
            'total_expense_result',
            'costs',
            'expense_array'
        ));
    }

    public function store(ExpenseRequest $request)
    {
        $expense = new Expense();
        $expense->user_id = $request->user_id;
        $expense->date = $request->date;
        $expense->month = substr($request->date, 5, 2);
        $expense->day = substr($request->date, 8, 2);
        $expense->cost_id = $request->cost_id;
        $expense->fee = $request->fee;

        $expense->save();

        return redirect()->back()->with('success', '経費を申請しました');
    }
}
