<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Auth\ChangePasswordController as AuthChangePasswordController;
use App\Http\Controllers\Auth\Login;
use App\Http\Controllers\Auth\Logout;
use App\Http\Controllers\Auth\Register;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\HomeController;
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

    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/pending', [AdminDashboardController::class, 'pendingPage'])->name('admin.pendingPage');
    Route::post('approve/{id}', [AdminDashboardController::class, 'approve'])->name('admin.approved');
    Route::post('/reject/{id}', [AdminDashboardController::class, 'reject'])->name('admin.reject');
    Route::get('/approved', [AdminDashboardController::class, 'approvedPage'])->name('admin.approvedPage');
    Route::get('/rejected', [AdminDashboardController::class, 'rejectedPage'])->name('admin.rejectedPage');
    Route::put('/students/{id}', [AdminDashboardController::class, 'updateStatus'])->name('admin.statusUpdate');

    });
});

//PASSWORD CHANGE
Route::view('password/change', 'auth.change-password')
    ->name('password.change');

Route::post('password/change', [AuthChangePasswordController::class, 'changepass'])
->middleware('auth');

//ENROLLMENT
Route::group(['prefix' => 'enrollment'], function(){
    Route::get('/', [EnrollmentController::class, 'index'])->name('enrollment.index');
    Route::post('/', [EnrollmentController::class, 'store'])->name('enrollment.store');
})->middleware('auth');

Route::get('home', [HomeController::class, 'index'])
    ->middleware('auth')
    ->name('home');    

Route::fallback(function () {
    return view('fallback');
});