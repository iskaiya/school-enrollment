<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminDashboardController extends Controller
{
       public function index(Request $request){
        $students = DB::table('enrollments')
            ->join('users', 'enrollments.user_id', '=', 'users.id')
            ->join('enrolled_students', 'users.email', '=', 'enrolled_students.email')
            ->where('users.name', 'like', "%{$request->param}%")
            ->orWhere('enrolled_students.student_id', 'like', "%{$request->param}%")
            ->select('enrollments.user_id',
            'enrollments.status',
            'users.name',
            'enrolled_students.student_id',
            'enrolled_students.year'
        )
        ->distinct()
        ->get();

            $pending = DB::table('enrollments')->where('status', 'pending')->distinct()->count('user_id');
            $approved = DB::table('enrollments')->where('status', 'approved')->distinct()->count('user_id');
            $rejected = DB::table('enrollments')->where('status', 'rejected')->distinct()->count('user_id');
            
            return view('admin.adminDashboard', compact('students', 'pending', 'approved','rejected' ));
    }


    public function pendingPage(Request $request){
        $students =DB::table('enrollments')
            ->join('users', 'enrollments.user_id', '=', 'users.id')
            ->join('enrolled_students', 'users.email', '=', 'enrolled_students.email')
            ->where('enrollments.status', 'pending')
            ->where(function($query) use ($request){
            $query ->where('users.name', 'like', "%{$request->param}%")
            ->orWhere('enrolled_students.student_id', 'like', "%{$request->param}%");
             })
            ->select(
                'enrollments.user_id',
                'enrollments.status',
                'users.name',
                'enrolled_students.student_id',
                'enrolled_students.program',
                'enrolled_students.year',
                DB::raw('SUM(subjects.units) as units')
            )
            ->join('subjects', 'enrollments.subject_id', '=', 'subjects.id')  // add this join
            ->groupBy(
                'enrollments.user_id',
                'enrollments.status',
                'users.name',
                'enrolled_students.student_id',
                'enrolled_students.program',
                'enrolled_students.year'
            )
            ->get();
        
        return view('admin.adminPending', compact('students'));
    }

    public function approve($id){
        DB::table('enrollments')->where('user_id', $id)->update(['status'=>'approved']);
        return redirect()->route('admin.pendingPage');
    }

    public function reject($id){
        DB::table('enrollments')->where('user_id', $id)->update(['status' => 'rejected']);
        return redirect()->route('admin.pendingPage');
    }

    public function approvedPage(Request $request){
        $students = DB::table('enrollments')
            ->join('users', 'enrollments.user_id', '=', 'users.id')
            ->join('subjects', 'enrollments.subject_id', '=', 'subjects.id') // make sure this is here
            ->join('enrolled_students', 'users.email', '=', 'enrolled_students.email')
            ->where('enrollments.status', 'approved')
            ->where(function($query) use ($request){
                $query->where('users.name', 'like', "%{$request->param}%")
                ->orWhere('enrolled_students.student_id', 'like', "%{$request->param}%");
            })
            ->select(
            'enrollments.user_id',
            'enrollments.status',
            'users.name',
            'enrolled_students.student_id',
            'enrolled_students.program',
            'enrolled_students.year',
            DB::raw('SUM(subjects.units) as units')
            )
            ->groupBy(
                'enrollments.user_id',
                'enrollments.status',
                'users.name',
                'enrolled_students.student_id',
                'enrolled_students.program',
                'enrolled_students.year'
            )
            ->get();
        
        return view('admin.adminApproved', compact('students'));
    }
    
        public function rejectedPage(Request $request){
        $students = DB::table('enrollments')
            ->join('users', 'enrollments.user_id', '=', 'users.id')
            ->join('enrolled_students', 'users.email', '=', 'enrolled_students.email')
            ->join('subjects', 'enrollments.subject_id', '=', 'subjects.id')
            ->where('enrollments.status', 'rejected')
            ->where(function($query) use ($request){
                $query->where('users.name', 'like', "%{$request->param}%")
                ->orWhere('enrolled_students.student_id', 'like', "%{$request->param}%");
            })
            ->select(
                'enrollments.user_id',
                'enrollments.status',
                'users.name',
                'enrolled_students.student_id',
                'enrolled_students.program',
                'enrolled_students.year',
                DB::raw('SUM(subjects.units) as units')
            )
            ->groupBy(
                'enrollments.user_id',
                'enrollments.status',
                'users.name',
                'enrolled_students.student_id',
                'enrolled_students.program',
                'enrolled_students.year'
            )
            ->get();
            
        return view('admin.adminRejected', compact('students'));
    }

    public function updateStatus(Request $request, $id){
        $request->validate([
            'status' => ['required', 'in:pending,approved,rejected'],
        ]);

        DB::table('enrollments')->where('user_id', $id)->update(['status' => $request->status]);
        return back();
    }


}