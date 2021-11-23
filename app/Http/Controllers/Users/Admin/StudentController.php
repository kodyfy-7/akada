<?php

namespace App\Http\Controllers\Users\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\{
    Classroom,Applicant,Result,Year,Payment,Student,
    StudentLogin,Wallet
};

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function profile()
    {
        dd('678');
    }

    
}
