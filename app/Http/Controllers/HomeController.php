<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
   public function index()
    {
        $firstEnrollment = DB::table('enrollments')
            ->where('user_id', auth()->id())
            ->first();

        $enrollmentStatus = $firstEnrollment ? $firstEnrollment->status : null;

        $subjects = collect();

        if ($enrollmentStatus === 'approved') {
            $subjects = DB::table('enrollments')
                ->join('subjects', 'enrollments.subject_id', '=', 'subjects.id')
                ->join('sections', 'enrollments.section_id', '=', 'sections.id')
                ->select(
                    'subjects.course_code',
                    'subjects.course_name',
                    'subjects.units',
                    'sections.section_code',
                    'sections.day_schedule',
                    'sections.start_time',
                    'sections.end_time',
                    'sections.professor'
                )
                ->where('enrollments.user_id', auth()->id())
                ->get();
        }

        return view('home', compact('enrollmentStatus', 'subjects'));
    }
}

