<?php

use App\Http\Controllers\Auth\Login;
use App\Http\Controllers\Auth\Logout;
use App\Http\Controllers\Auth\Register;
use App\Http\Controllers\FormController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing');
});

Route::get('form', [FormController::class, 'index']);

//REGISTER
Route::view('register','auth.register')
->middleware('guest')
->name('register');

Route::post('register', Register::class)
->middleware('guest');

//LOGIN
Route::view('login','auth.login')
->middleware('guest')
->name('login');
Route::post('login', Login::class)
->middleware('guest');

//LOGOUT
Route::post('/logout', Logout::class)
->middleware('auth');

Route::view('home', 'home');