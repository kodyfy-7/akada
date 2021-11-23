<?php

namespace App\Http\Controllers\Users\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\{
    Employee, 
    Classroom,
    Subject,
    ClassroomSubject, 
    Result, 
    ResultDetail,
    ResultLog,
    FirstAssessmentScore,
    SecondAssessmentScore,
    ExamScore,
    Student,
    Year, 
};

use DB;

class ResultController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:teacher');
    }

    public function result()
    {
        $employee = Employee::whereId(auth()->user()->employee_id)->first();
        if(($employee->classroom_id) === null)
        {
            return redirect()->back()->with('error', 'Unauthorized access.');
        }
        $year = Year::latest('id')->first();
        $results = Result::whereClassroomId($employee->subject_id)->whereYearId($year->id)->get();
        return view('teacher.classroom.result', compact('results'));
    }



    public function get_result_per_class(Request $request)
    {
        $employee = Employee::whereId(auth()->user()->employee_id)->first();
        $subject = Subject::whereId($employee->subject_id)->first();
        $classrooms = ClassroomSubject::whereSubjectId($employee->subject_id)->get();

        // Get the classroom from the request
        $classroom_id = $request->classroom_id;
        $classroom = Classroom::whereId($classroom_id)->get();
        $year = Year::latest('id')->first();
        $results = Result::whereClassroomId($classroom_id)->whereYearId($year->id)->get();
    
        // Return the view with the results compacted
        return view('teacher.subject.result', compact('classrooms', 'results', 'classroom', 'subject'));
    }
    
    public function store(Request $request)
    {
        $employee = Employee::whereId(auth()->user()->employee_id)->first();
        $subject_id = $employee->subject_id;
        
        for($i = 0; $i < count($request->result_id); $i++)
        {
            if($request->type == 1)
            {
                FirstAssessmentScore::updateOrCreate([
                    'result_id' => $request->result_id[$i],
                    'subject_id' => $subject_id,
                    'fa_score' => $request->score[$i],
                ]);
            } elseif($request->type == 2)
            {
                SecondAssessmentScore::updateOrCreate([
                    'result_id' => $request->result_id[$i],
                    'subject_id' => $subject_id,
                    'sa_score' => $request->score[$i],
                ]);
            } else {
                ExamScore::updateOrCreate([
                    'result_id' => $request->result_id[$i],
                    'subject_id' => $subject_id,
                    'ex_score' => $request->score[$i],
                ]);
            }
        }
        return redirect('/teacher/subject-result')->with('success', 'Data saved successfully.');
    }

    public function get_total_result_per_class()
    {
        $employee = Employee::whereId(auth()->user()->employee_id)->first();
        if(($employee->subject_id) === null)
        {
            return redirect()->back()->with('error', 'Unauthorized access.');
        }

        $classrooms = ClassroomSubject::whereSubjectId($employee->subject_id)->get();
        return view('teacher.subject.total', compact('classrooms'));
    }

    public function get_total_result_per_class_all(Request $request)
    {
        $year = Year::latest('id')->first();
        $employee = Employee::whereId(auth()->user()->employee_id)->first();
        $subject = Subject::whereId($employee->subject_id)->first();
        $classroom_id = $request->classroom_id;
        $log = ResultLog::whereSubjectId($subject->id)->whereClassroomId($classroom_id)->whereYearId($subject->id)->first();
        if($log)
        {
            return redirect()->back()->with('error', 'Data has been filled.');
        } else {
            $classroom = Classroom::whereId($classroom_id)->get();
            $classrooms = ClassroomSubject::whereSubjectId($employee->subject_id)->get();
            
            $total_scores = DB::table('results')
                                ->select('results.id', 'results.student_id','exam_scores.ex_score', 'first_assessment_scores.fa_score', 'second_assessment_scores.sa_score', 'students.full_name')
                                ->join('students', 'students.id', '=', 'results.student_id')
                                ->join('first_assessment_scores', 'first_assessment_scores.result_id', '=', 'results.id')
                                ->join('second_assessment_scores', 'second_assessment_scores.result_id', '=', 'results.id')
                                ->join('exam_scores', 'exam_scores.result_id', '=', 'results.id')
                                ->where('first_assessment_scores.subject_id', '=', $employee->subject_id)
                                ->where('results.classroom_id', '=', $classroom_id)
                                ->where('results.year_id', '=', $year->id)
                                ->get();
            return view('teacher.subject.total', compact('classrooms', 'classroom', 'subject', 'total_scores'));
        }
        
    }
    public function sum_subject_total_per_class(Request $request)
    {
        for($i = 0; $i < count($request->result_id); $i++)
        {
            $total_score = $request->fa_score[$i] + $request->sa_score[$i] + $request->ex_score[$i];
            $rd = ResultDetail::updateOrCreate([
                'result_id' => $request->result_id[$i],
                'subject_id' => $request->subject_id,
                'ca_1' => $request->fa_score[$i],
                'ca_2' => $request->sa_score[$i],
                'exam_score' => $request->ex_score[$i],
                'total_score' => $total_score
            ]);
        }
        $year = Year::latest('id')->first();
        ResultLog::create([
            'year_id' => $year->id,
            'subject_id' => $request->subject_id,
            'classroom_id' => $request->classroom_id,
            'employee_id' => auth()->user()->employee_id,
            'log_status' => 1
        ]);
        return redirect('/teacher')->with('success', 'Data saved successfully');
    }
    
    public function show(Result $result_slug)
    {
      $employee = Employee::whereId(auth()->user()->employee_id)->first();
      if(($employee->classroom_id) === null)
      {
        return redirect()->back()->with('error', 'Unauthorized access.');
      }
        
      $classroom = Classroom::whereId($employee->classroom_id)->first();

      $student = Student::whereId($result_slug->student_id)->first();
      
      $year = Year::latest('id')->first();
        
      $results = ResultDetail::whereResultId($result_slug->id)->get();
      
      $result_total_score = ResultDetail::whereResultId($result_slug->id)->sum('total_score');
      
      $number_of_subject = ResultDetail::whereResultId($result_slug->id)->count('subject_id');
      if($number_of_subject == 0)
      {
         return redirect()->back()->with('error', 'Some scores are missing.');
      }
      
      $result_average_score = $result_total_score/$number_of_subject;

      $countAttendance = Attendance::whereStudentId($result_slug->student_id)->whereYearId($year->id)->whereAttendanceStatus(1)->count();
      $attendance_per_cent = $countAttendance/$year->days_per_session * 100;
                
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
      $sessionAverage = 0;
      if ($year->term == 3) {
        $x = Result::whereStudentId($student->id)->whereClassroomId($student->classroom_id)->whereYearId($year->id)->sum('average_score');
           
        $result_average_score_total = $result_average_score_total + $x;
        $session_average = $result_average_score_total/3;
        }

        return view('teacher.classroom.result-show', compact('result', 'results', 'student', 'year', 'attendance_per_cent', 'result_average_score', 'result_total_score', 'grade', 'classroom', 'x','$result_average_score_total', 'session_average'));
    
    }

}
