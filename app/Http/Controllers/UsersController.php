<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Models\Store;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::searchStore()->paginate(10);
        $stores = Store::all();

        return view('users.index', compact('users', 'stores'));
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        $user_salary = $user->salaries()->orderBy('salary', 'desc')->take(1)->get();

        return view('users.show', compact('user', 'user_salary'));
    }

    public function export()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
}
