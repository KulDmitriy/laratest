<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function userEditSubmit($id, Request $request)
    {
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone_number = $request->input('phone_number');
        if (Hash::needsRehash($request->password))
        {
            $newPassword = Hash::make($request->password);
            $user->password = $newPassword;
        }
        $user->role = $request->input('role');
        $user->save();

        return redirect()->intended(RouteServiceProvider::HOME);
    }
}
