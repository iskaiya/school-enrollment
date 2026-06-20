<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\EnrolledStudent;
use App\Models\User as ModelsUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Register extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|confirmed|min:8'
        ]);

        //check student list
        $enrolled = EnrolledStudent::where('email', $validated['email'])
        ->where('claimed', false)
        ->first();

        if(!$enrolled) {
            return back()
            ->withErrors(['email' => 'Email address not recognized'])
            ->onlyInput('email');
        }

        //Create user
        $user = ModelsUser::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password'])
        ]);

        $enrolled->update(['claimed' => true]);

        Auth::login($user);

        return redirect('/home')->with('success', 'Successfully signed in.');
    }
}
