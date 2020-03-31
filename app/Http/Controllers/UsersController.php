<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Models\EmploymentStatus;
use App\Models\Pref;
use App\Models\Role;
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
        $user = User::find($id);
        $user_salary = $user->salaries()->orderBy('salary', 'desc')->take(1)->get();

        return view('users.show', compact('user', 'user_salary'));
    }

    public function edit(User $user)
    {
        $prefs = Pref::all();
        $roles = Role::all();
        $stores = Store::all();
        $employment_statuses = EmploymentStatus::all();
        return view('users.edit', compact('user', 'prefs', 'roles', 'stores', 'employment_statuses'));
    }

    public function update(User $user, Request $request)
    {
        $user->update([
            'last_name' => $request->last_name,
            'first_name' => $request->first_name,
            'age' => $request->age,
            'pref_id' => $request->pref_id,
            'role_id' => $request->role_id,
            'store_id' => $request->store_id,
            'employment_status_id' => $request->employment_status_id,
            'email' => $request->email,
        ]);

        return redirect()->route('users.index')->with('success', '更新しました');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->back()->with('success', '削除しました');
    }

    public function export()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
}
