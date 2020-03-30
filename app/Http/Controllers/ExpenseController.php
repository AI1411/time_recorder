<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExpenseRequest;
use App\Models\Attendance;
use App\Models\Expense;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ExpenseController extends Controller
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

        $addDay = ($date->copy()->endOfMonth()->isSunday() ? 7 : 0);

        $date->subDay($date->dayOfWeek);
        $count = 31 + $addDay + $date->dayOfWeek;
        $count = ceil($count / 7) * 7;
        $dates = [];

        for ($i = 0; $i < $count; $i++, $date->addDays()) {
            $dates[] = $date->copy();
        }

        $total_expense_result = 0;
        $total_expense = Expense::select('transportation_expense')->where('user_id', auth()->user()->id)->get();
        foreach ($total_expense as $expense) {
//            dd($expense->transportation_expense);
//            dd($expense);
            $total_expense_result += $expense->transportation_expense;
        }
        return view('expenses.index', compact('dates', 'month', 'year', 'months', 'total_expense_result'));
    }

    public function store(ExpenseRequest $request)
    {
        $expense = new Expense();
        $expense->user_id = $request->user_id;
        $expense->date = $request->date;
        $expense->transportation_expense = $request->transportation_expense;

        $expense->save();

        return redirect()->back()->with('success', '経費を申請しました');
    }
}
