<?php

namespace App\Http\Controllers\Users\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\{
    Classroom,
    Student,
    Transaction,
    Year,
    Employee,
    Payment
};

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        //studentStatus Finished
        $year = Year::latest('id')->first();
        $number_of_students = Student::count();
        $number_of_classrooms = Classroom::count();
        $number_of_employees = Employee::count();
        /*$revenue = Payment::sum('amount') place amount in payment;*/
        $revenue = Transaction::whereTransactionType(2)->sum('amount');
        return view('admin.dashboard', compact('year', 'number_of_students', 'number_of_classrooms', 'number_of_employees', 'revenue'));
        /*$data =  [$number_of_classrooms, $number_of_employees, $number_of_students, $revenue, $year];
        return view('admin.dashboard')->with('success', 'Welcome')->with($data);*/
    }
}