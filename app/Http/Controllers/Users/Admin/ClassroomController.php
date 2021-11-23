<?php

namespace App\Http\Controllers\Users\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\{
    Classroom,
    Student,
    Subject,
    ClassroomSubject,
    Attendance
};

use DB;

class ClassroomController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(Request $request)
    {
        $classrooms = Classroom::all();
        
        return view('admin.classroom.index', compact('classrooms'));
    }
    
    public function get_data_per_class(Request $request)
    {
        // Get the classroom from the request
        $classroom_id = $request->classroom_id;
        $students = Student::whereClassroomId($classroom_id)->orderBy('full_name')->get();
        
        $classroom = Classroom::whereId($classroom_id)->first();
        $classrooms = Classroom::all();
        $subjects = Subject::all();
        
        $subjects_offered = DB::table('classroom_subjects')
                                ->select('classroom_subjects.id', 'subjects.sub_title','subjects.subject_title')
                                ->join('subjects', 'subjects.id', '=', 'classroom_subjects.subject_id')
                                ->where('classroom_subjects.classroom_id', '=', $classroom_id)
                        ->get();
        return view('admin.classroom.index', compact('classrooms', 'students', 'classroom', 'classroom_id', 'subjects', 'subjects_offered'));
    }

    public function create()
    {
        $classroom = new Classroom();
        $subjects = Subject::all();
        return view('admin.classroom.create', compact('classroom', 'subjects'));
    }

    public function store(Request $request)
    {
        $data = request()->validate([
            'classroom_title' => ['required', 'string'],
        ]);

        $strlowclassroomtitle = strtolower($data['classroom_title']);
        $slug = str_replace(' ', '-', $strlowclassroomtitle); 
        
        if (Classroom::whereClassroomSlug($slug)->exists())
        {
            $slug = $slug.'-'.time();
        }

        $classroom = Classroom::create([
            'classroom_title' => $request->classroom_title,
            'sub_title' => $request->sub_title,
            'classroom_slug' => $slug
        ]);

        for($i = 0; $i < count($request->subject); $i++)
        {
            ClassroomSubject::create([
                'classroom_id' => $classroom->id,
                'subject_id' => $request->subject[$i]
            ]);
        }

        return redirect()->back()->with('success', 'Data saved successfully');
    }

    public function save_subject(Request $request)
    {
        for($i = 0; $i < count($request->subject); $i++)
        {
            ClassroomSubject::create([
                'classroom_id' => $request->classroom_id,
                'subject_id' => $request->subject[$i]
            ]);
        }

        return redirect()->back()->with('success', 'Data saved successfully');
    }

    public function edit(Classroom $classroom)
    {
        return view('admin.classroom.edit', compact('classroom'));
    }

    public function show(Classroom $classroom)
    {
        /*$students = Student::whereClassroomId($classroom->id)->get();
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
