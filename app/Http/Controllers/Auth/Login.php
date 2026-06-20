<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Login extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        //validate input
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        //attempt to log in
        if (Auth::attempt($credentials, $request->boolean('remember'))) {

        $request->session()->regenerate();

        return redirect('/home')->with('success', 'Successfully logged in.');
        }

        //if login fails
        return back()
        ->withErrors(['email' => "Invalid email"])
        ->onlyInput('email');
    }
}
