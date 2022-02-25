<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class PageController extends Controller
{
    public function showDashboard()
    {
        if (Gate::allows('access-admin')) {
            return view('admin_dashboard', ['data' => User::all()]);
        }else{
            return view('dashboard');
        }
    }

    public function userEdit($id)
    {
        return view('edit_user', ['data' => User::find($id)]);
    }

    public function showUsersInfoByFilter(Request $request)
    {
        return view('show_users_info_by_filter', ['data' => User::orderBy($request->column, $request->rule)
            ->where('name', 'like', "%{$request->filter}%")
            ->orWhere('email', 'like', "%{$request->filter}%")
            ->orWhere('phone_number', 'like', "%{$request->filter}%")
            ->orWhere('role', 'like', "%{$request->filter}%")
            ->get(), 'request' => $request->filter]);
    }

    public function showUsersInfoByAbc(Request $request)
    {
        return view('show_users_info_by_abc', ['data' => User::orderBy($request->column, $request->filter)
            ->get()]);
    }
}
