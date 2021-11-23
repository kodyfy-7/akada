<?php

namespace App\Http\Controllers\Users\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;

use App\Models\{
    Employee, 
    Classroom,
    Student,
    Year, 
    StudentAttendance,
};

class TimetableController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:student');
    }

    public function index()
    {
        $studentID = auth()->user()->student_id;
        $studentInfo = Student::whereId($studentID)->first();
        $classroom = Classroom::whereId($studentInfo->classroom_id)->first();
        $monday = DB::table('time_tables')
                    ->select('time_tables.id', 'classrooms.classroom_title','subjects.subject_title', 'periods.period')
                    ->join('periods', 'periods.id', '=', 'time_tables.period_id')
                    ->join('subjects', 'subjects.id', '=', 'time_tables.subject_id')
                    ->join('classrooms', 'classrooms.id', '=', 'time_tables.classroom_id')
                    ->join('week_days', 'week_days.id', '=', 'time_tables.weekday_id')
                    ->where('classrooms.id', '=', $studentInfo->classroom_id)
                    ->where('week_days.day', '=', 'Monday')
                    ->orderBy('time_tables.period_id', 'asc')
                    ->get();
                                            
        $tuesday = DB::table('time_tables')
                    ->select('time_tables.id', 'classrooms.classroom_title','subjects.subject_title', 'periods.period')
                    ->join('periods', 'periods.id', '=', 'time_tables.period_id')
                    ->join('subjects', 'subjects.id', '=', 'time_tables.subject_id')
                    ->join('classrooms', 'classrooms.id', '=', 'time_tables.classroom_id')
                    ->join('week_days', 'week_days.id', '=', 'time_tables.weekday_id')
                    ->where('classrooms.id', '=', $studentInfo->classroom_id)
                    ->where('week_days.day', '=', 'Tuesday')
                    ->orderBy('time_tables.period_id', 'asc')
                    ->get();
                                            
        $wednesday = DB::table('time_tables')
                        ->select('time_tables.id', 'classrooms.classroom_title','subjects.subject_title', 'periods.period')
                        ->join('periods', 'periods.id', '=', 'time_tables.period_id')
                        ->join('subjects', 'subjects.id', '=', 'time_tables.subject_id')
                        ->join('classrooms', 'classrooms.id', '=', 'time_tables.classroom_id')
                        ->join('week_days', 'week_days.id', '=', 'time_tables.weekday_id')
                        ->where('classrooms.id', '=', $studentInfo->classroom_id)
                        ->where('week_days.day', '=', 'Wednesday')
                        ->orderBy('time_tables.period_id', 'asc')
                        ->get();
                                            
        $thursday = DB::table('time_tables')
                        ->select('time_tables.id', 'classrooms.classroom_title','subjects.subject_title', 'periods.period')
                        ->join('periods', 'periods.id', '=', 'time_tables.period_id')
                        ->join('subjects', 'subjects.id', '=', 'time_tables.subject_id')
                        ->join('classrooms', 'classrooms.id', '=', 'time_tables.classroom_id')
                        ->join('week_days', 'week_days.id', '=', 'time_tables.weekday_id')
                        ->where('classrooms.id', '=', $studentInfo->classroom_id)
                        ->where('week_days.day', '=', 'Thursday')
                        ->orderBy('time_tables.period_id', 'asc')
                        ->get();
                                            
        $friday = DB::table('time_tables')
                        ->select('time_tables.id', 'classrooms.classroom_title','subjects.subject_title', 'periods.period')
                        ->join('periods', 'periods.id', '=', 'time_tables.period_id')
                        ->join('subjects', 'subjects.id', '=', 'time_tables.subject_id')
                        ->join('classrooms', 'classrooms.id', '=', 'time_tables.classroom_id')
                        ->join('week_days', 'week_days.id', '=', 'time_tables.weekday_id')
                        ->where('classrooms.id', '=', $studentInfo->classroom_id)
                        ->where('week_days.day', '=', 'Friday')
                        ->orderBy('time_tables.period_id', 'asc')
                        ->get();
        return view('student.timetable.index', compact('monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'classroom'));
    }
}