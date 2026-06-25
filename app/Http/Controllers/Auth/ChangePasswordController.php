<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function changepass(Request $request){
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:8|confirmed'
        ]);

    if (!Hash::check($request->current_password, Auth::user()->password)){
        return back()->withErrors(['current_password' => 'Incorrect current password']);
    }

    $user = User::find(Auth::id());
    $user->forceFill([
        'password' => $request->password,
    ])->save();

    return redirect('/home')->with('success', 'Password changed successfully.');
    }
}
