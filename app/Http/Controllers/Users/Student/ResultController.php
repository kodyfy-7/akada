<?php

namespace App\Http\Controllers\Users\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;

use App\Models\{
    Student,
    Year, 
    StudentAttendance,
    Result,
    ResultDetail,
    Classroom
};

class ResultController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:student');
    }

    public function index()
    {
        $years = Year::whereYearStatus(0)->get;
        $classrooms = Classroom::all();
        
        return view('student.result.index', compact('classrooms', 'years'));
    }

    public function get_my_result_per_class(Request $request)
    {
        $years = Year::whereYearStatus(0)->get;
        $classrooms = Classroom::all();

        $year = Year::whereId($request->year_id)->first();
        $classroom = Classroom::whereId($request->classroom_id)->first();
        
        $student = Student::whereId(auth()->user()->student_id)->first();
        $result = Result::whereStudentId($student->id)->whereYearId($year->id)->whereClassroomId($classroom->id)->first();        
        
        $results = ResultDetail::whereResultId($result->id)->get();
      
        $result_total_score = ResultDetail::whereResultId($result->id)->sum('total_score');
      
        $number_of_subject = ResultDetail::whereResultId($result->id)->count();
        /*if($number_of_subject == 0)
        {
            return redirect()->back()->with('error', 'Some scores are missing.');
        }*/
      
        $result_average_score = $result_total_score/$number_of_subject;

        $countAttendance = StudentAttendance::whereStudentId($result->student_id)->whereYearId($year->id)->whereAttendanceStatus(1)->count();
        $attendance_per_cent = 0;/*$countAttendance/$year->days_per_session * 100;*/
                
        switch ($result_average_score) {
            case $result_average_score >= 70:
            $grade = 'A';
            break;
            case $result_average_score >= 60 and $result_average_score <= 69:
            $grade = 'B';
            break;
            case $result_average_score >= 45 and $result_average_score <= 59:
            $grade = 'C';
            break;
            case $result_average_score >= 35 and $result_average_score <= 44:
            $grade = 'D';
            break;
            default:
            $grade = 'F';
            break;
        }   
      
        $x = 0;
        $result_average_score_total = 0;
        $session_average = 0;
        if ($year->term == 3) {
            $x = Result::whereStudentId($student->id)->whereClassroomId($student->classroom_id)->sum('average_score');
            
            $result_average_score_total = $result_average_score_total + $x +$result_average_score;
            $session_average = $result_average_score_total/3;
        }

        return view('student.result.index', compact('classrooms', 'years', 'results', 'student', 'year', 'attendance_per_cent', 'result_average_score', 'result_total_score', 'grade', 'classroom', 'x','result_average_score_total', 'session_average', 'result'));
    
    }
}