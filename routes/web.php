<?php

use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Auth\Login;
use App\Http\Controllers\Auth\Logout;
use App\Http\Controllers\Auth\Register;
use App\Http\Controllers\FormController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing');
});

//REGISTER
Route::view('register','auth.register')
->middleware('guest')
->name('register');

Route::post('register', Register::class)
->middleware('guest');

//STUDENT LOGIN
Route::view('login','auth.login')
->middleware('guest')
->name('login');
Route::post('login', Login::class)
->middleware('guest');

//STUDENT LOGOUT
Route::post('/logout', Logout::class)
->middleware('auth');

//ADMIN LOGIN
Route::group(['prefix' => 'admin'], function(){
    Route::view('login', 'auth.admin-login')
    ->name('admin.login');
    Route::post('login', AdminLoginController::class)
    ->name('admin.login.submit');

    Route::middleware('auth:admin')->group(function(){
        Route::view('dashboard', 'admin-dash')
        ->name('admin.dash');

        Route::post('logout', function(Request $request){
            Auth::guard('admin')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/admin/login');
        })->name('admin.logout');
    });
});

Route::view('home', 'home');