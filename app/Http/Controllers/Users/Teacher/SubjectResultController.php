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

class SubjectResultController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:teacher');
    }

    public function result()
    {
        $employee = Employee::whereId(auth()->user()->employee_id)->first();
        if(($employee->subject_id) === null)
        {
            return redirect()->back()->with('error', 'Unauthorized access.');
        }

        $classrooms = ClassroomSubject::whereSubjectId($employee->subject_id)->get();
        return view('teacher.subject.result', compact('classrooms'));
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
         /* if($request->type == 1)
          {
            
          }
          elseif($request->type == 2)
          {
            
          }
          else
          {
            
            
          }*/
          
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
        $log = ResultLog::whereSubjectId($subject->id)->whereClassroomId($classroom_id)->whereYearId($year->id)->first();
        if($log)
        {
            return redirect()->back()->with('error', 'Data has been filled.');
        } else {
            $classroom = Classroom::whereId($classroom_id)->get();
            $classrooms = ClassroomSubject::whereSubjectId($employee->subject_id)->get();
            
           /* $total_scores = DB::table('results')
                                ->select('results.id', 'results.student_id','exam_scores.ex_score', 'first_assessment_scores.fa_score', 'second_assessment_scores.sa_score', 'students.full_name')
                                ->join('students', 'students.id', '=', 'results.student_id')
                                ->join('first_assessment_scores', 'first_assessment_scores.result_id', '=', 'results.id')
                                ->join('second_assessment_scores', 'second_assessment_scores.result_id', '=', 'results.id')
                                ->join('exam_scores', 'exam_scores.result_id', '=', 'results.id')
                                ->where('first_assessment_scores.subject_id', '=', $employee->subject_id)
                                ->where('results.classroom_id', '=', $classroom_id)
                                ->where('results.year_id', '=', $year->id)
                                ->get();*/
 /* $total_scores = DB::table('results')
  ->select('students.id as studentID', 'results.id', 'exam_scores.ex_score', 'first_assessment_scores.fa_score', 'second_assessment_scores.sa_score', 'students.full_name')
  ->join('students', 'results.student_id', '=', 'students.id')
  ->join('first_assessment_scores', function ($join) {
        $join->on('first_assessment_scores.result_id', '=', 'results.id')
             ->orOn('first_assessment_scores.subject_id', '=', 1);
    })
    ->join('second_assessment_scores', function ($join) {
        $join->on('second_assessment_scores.result_id', '=', 'results.id')
             ->orOn('second_assessment_scores.subject_id', '=', 1);
    })
    ->join('exam_scores', function ($join) {
        $join->on('exam_scores.result_id', '=', 'results.id')
             ->orOn('exam_scores.subject_id', '=', 1);
    })

  ->where('results.classroom_id', '=', 1)
  ->where('results.year_id', '=', 1)
                                ->get();*/
  /*$total_scores = DB::table('result_details')
  ->select('result_details.scores', 'result_details.result_id', 'result_details.type', 'students.full_name')
  ->join('results', 'results.id', '=', 'result_details.result_id')
  ->join('students', 'students.id', '=', 'results.student_id')         
  ->where('results.classroom_id', '=', 1)
  ->where('results.year_id', '=', 1)
                                ->get();*/
  $total_scores = DB::table('results')
  ->select('first_assessment_scores.fa_score', 'results.id', 'students.full_name', 'second_assessment_scores.sa_score', 'exam_scores.ex_score')
  ->join('exam_scores', 'exam_scores.result_id', '=', 'results.id')
  ->join('students', 'students.id', '=', 'results.student_id')      
  ->join('second_assessment_scores', 'second_assessment_scores.result_id', '=', 'results.id')
  ->join('first_assessment_scores', 'first_assessment_scores.result_id', '=', 'results.id')
  ->where('results.classroom_id', '=', $classroom_id)
  ->where('results.year_id', '=', $year->id)
  ->where('exam_scores.subject_id', '=', $employee->subject_id)
  ->where('first_assessment_scores.subject_id', '=', $employee->subject_id)
  ->where('second_assessment_scores.subject_id', '=', $employee->subject_id)
                                ->get();          
                                //dd($total_scores);                   
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

}
