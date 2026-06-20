<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class LogInController extends Controller
{
    public function loginStudent($id){
       $user = DB::table('students')
       ->where('idstudents', $id)
       ->get();

       Session::put('user', $user);
    }
}
