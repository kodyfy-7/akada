<?php

namespace App\Http\Controllers\Users\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;

use App\Models\{
    ClassroomSubject, 
    Classroom,
    Student,
    Year, 
    StudentAttendance,
    Wallet,
    Payment,
    ClassroomFee,
};

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:student');
    }

    public function index()
    {
        $studentID = auth()->user()->student_id;
        $studentInfo = Student::whereId($studentID)->first();
        $wallet = Wallet::whereStudentId($studentID)->first();

        $year = Year::latest('id')->first();
        $payment_status = Payment::whereYearId($year->id)->wherePaymentStatus(0)->whereStudentId($studentID)->first();
        $classroom_fee = ClassroomFee::whereClassroomId($studentInfo->classroom_id)->first();

        $total_class_subjects = ClassroomSubject::whereClassroomId($studentInfo->classroom_id)->count();
        
        return view('student.dashboard', compact('studentInfo', 'total_class_subjects', 'wallet', 'year', 'payment_status', 'classroom_fee'));
    }
}