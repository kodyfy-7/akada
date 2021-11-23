<?php

namespace App\Http\Controllers\Users\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\{
    Classroom,
    WeekDay,
    Subject,
    TimeTable,
    Period
};

use DB;

class TimetableController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(Request $request)
    {
        $classrooms = Classroom::all();
        
        return view('admin.timetable.index', compact('classrooms'));
    }
    
    public function get_time_data_per_class(Request $request)
    {
        // Get the classroom from the request
        $classroom_id = $request->classroom_id;
        dd($request->classroom_id);
        $classroom = Classroom::whereId($classroom_id)->get();
        $classrooms = Classroom::all();
        $monday = DB::table('time_tables')
                    ->select('time_tables.id', 'classrooms.classroom_title','subjects.subject_title', 'periods.period')
                    ->join('periods', 'periods.id', '=', 'time_tables.period_id')
                    ->join('subjects', 'subjects.id', '=', 'time_tables.subject_id')
                    ->join('classrooms', 'classrooms.id', '=', 'time_tables.classroom_id')
                    ->join('week_days', 'week_days.id', '=', 'time_tables.weekday_id')
                    ->where('classrooms.id', '=', $classroom_id)
                    ->where('week_days.day', '=', 'Monday')
                    ->orderBy('time_tables.period_id', 'asc')
                    ->get();
                                            
        $tuesday = DB::table('time_tables')
                    ->select('time_tables.id', 'classrooms.classroom_title','subjects.subject_title', 'periods.period')
                    ->join('periods', 'periods.id', '=', 'time_tables.period_id')
                    ->join('subjects', 'subjects.id', '=', 'time_tables.subject_id')
                    ->join('classrooms', 'classrooms.id', '=', 'time_tables.classroom_id')
                    ->join('week_days', 'week_days.id', '=', 'time_tables.weekday_id')
                    ->where('classrooms.id', '=', $classroom_id)
                    ->where('week_days.day', '=', 'Tuesday')
                    ->orderBy('time_tables.period_id', 'asc')
                    ->get();
                                            
        $wednesday = DB::table('time_tables')
                        ->select('time_tables.id', 'classrooms.classroom_title','subjects.subject_title', 'periods.period')
                        ->join('periods', 'periods.id', '=', 'time_tables.period_id')
                        ->join('subjects', 'subjects.id', '=', 'time_tables.subject_id')
                        ->join('classrooms', 'classrooms.id', '=', 'time_tables.classroom_id')
                        ->join('week_days', 'week_days.id', '=', 'time_tables.weekday_id')
                        ->where('classrooms.id', '=', $classroom_id)
                        ->where('week_days.day', '=', 'Wednesday')
                        ->orderBy('time_tables.period_id', 'asc')
                        ->get();
                                            
        $thursday = DB::table('time_tables')
                        ->select('time_tables.id', 'classrooms.classroom_title','subjects.subject_title', 'periods.period')
                        ->join('periods', 'periods.id', '=', 'time_tables.period_id')
                        ->join('subjects', 'subjects.id', '=', 'time_tables.subject_id')
                        ->join('classrooms', 'classrooms.id', '=', 'time_tables.classroom_id')
                        ->join('week_days', 'week_days.id', '=', 'time_tables.weekday_id')
                        ->where('classrooms.id', '=', $classroom_id)
                        ->where('week_days.day', '=', 'Thursday')
                        ->orderBy('time_tables.period_id', 'asc')
                        ->get();
                                            
        $friday = DB::table('time_tables')
                        ->select('time_tables.id', 'classrooms.classroom_title','subjects.subject_title', 'periods.period')
                        ->join('periods', 'periods.id', '=', 'time_tables.period_id')
                        ->join('subjects', 'subjects.id', '=', 'time_tables.subject_id')
                        ->join('classrooms', 'classrooms.id', '=', 'time_tables.classroom_id')
                        ->join('week_days', 'week_days.id', '=', 'time_tables.weekday_id')
                        ->where('classrooms.id', '=', $classroom_id)
                        ->where('week_days.day', '=', 'Friday')
                        ->orderBy('time_tables.period_id', 'asc')
                        ->get();
        return view('admin.timetable.index', compact('monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'classroom', 'classrooms'));
        
    }

    public function create()
    {
        $classrooms = Classroom::all();
        $subjects = Subject::all();
        $weekdays = WeekDay::all();
        $periods = Period::all();
        return view('admin.timetable.create', compact('classrooms', 'weekdays', 'subjects', 'periods'));
    }

    public function store(Request $request)
    {
        $data = request()->validate([
            'classroom_id' => ['required', 'string'],
        ]);

        for($i = 0; $i < count($request->subject); $i++)
        {
            TimeTable::create([
                'classroom_id' => $request->classroom_id,
                'subject_id' => $request->subject[$i],
                'weekday_id' => $request->weekday_id,
                'period_id' => $request->period[$i]
            ]);
        }

        return redirect()->back()->with('success', 'Data saved successfully');
    }

    public function save_subject(Request $request)
    {
        

        /*for($i = 0; $i < count($request->subject); $i++)
        {
            ClassroomSubject::create([
                'classroom_id' => $request->classroom,
                'subject_id' => $request->subject[$i]
            ]);
        }*/

        return redirect()->back()->with('success', 'Data saved successfully');
    }

    public function edit(Classroom $classroom)
    {
        return view('admin.classroom.edit', compact('classroom'));
    }

    public function show(Classroom $classroom)
    {
        /*$students = Student::whereClassroomId($classroom_id)->get();
        $classroom_subjects = ClassroomSubject::whereClassroomId($classroom->id)->get();
        $subjects = Subject::all();
        return view('admin.classroom.show', compact('classroom', 'students', 'classroom_subjects', 'subjects'));*/
    }

    public function update(Request $request, $id)
    {
       $data = request()->validate([
            'classroom_name' => ['required', 'string'],
        ]);
        Classroom::whereId($id)->update([
            'classroom_name' => $request->classroom_name,
            'classroom_attribute' => $request->classroom_attribute,
            'classroom_status' => $request->classroom_status,
        ]);
        return redirect()->back()->with('success', 'Data saved successfully');  
    }

    public function destroy_subject($id)
    {
       /* $classroom_subject = ClassroomSubject::find($id);
        $classroom_subject->delete();
        return redirect()->back()->with('error1', 'Data Deleted');*/
    }
}
