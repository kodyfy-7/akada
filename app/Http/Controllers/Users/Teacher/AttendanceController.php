<?php

namespace App\Http\Controllers\Users\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\{
    Employee, 
    Classroom,
    Student,
    Year, 
    StudentAttendance,
};

class AttendanceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:teacher');
    }

    public function index()
    {
        $employee = Employee::whereId(auth()->user()->employee_id)->first();
        if(($employee->classroom_id) === null)
        {
            return redirect()->back()->with('error', 'Unauthorized access.');
        }

        $classroom_id = $employee->classroom_id;
        $year = Year::latest('id')->first();
        $students = Student::whereClassroomId($classroom_id)->get();

        return view('teacher.attendance.index', compact('students', 'employee'));
    }

    public function store(Request $request)
    {   
        $employee = Employee::whereId(auth()->user()->employee_id)->first();
        $classroom = $employee->classroom_id;
        $year = Year::latest('id')->first();
        $attendance_status = $request->attendance;
        $attendance_date = date('d/m/Y');

        $check_date_status = StudentAttendance::whereAttendanceDate($attendance_date)->first();

        if($check_date_status)
        {
            return redirect()->back()->with('error', 'Attendance taken already.');
        } 

        foreach ($attendance_status as $key => $value) 
        {
            if($value == "Present") 
            {
                $form_data = array(
                    'classroom_id' => $classroom, 
                    'attendance_status' => '1', 
                    'student_id' => $key, 
                    'year_id' => $year->id, 
                    'attendance_date' => $attendance_date
                );
                $save_attendance = StudentAttendance::create($form_data);
                  
            } else 
            {
                $form_data = array(
                    'classroom_id' => $classroom, 
                    'attendance_status' => '0', 
                    'student_id' => $key, 
                    'year_id' => $year->id, 
                    'attendance_date' => $attendance_date
                );
                $save_attendance = StudentAttendance::create($form_data);
            }
        }
        return redirect()->back()->with('success', 'Attendance taken successfully.');
    }
}

        