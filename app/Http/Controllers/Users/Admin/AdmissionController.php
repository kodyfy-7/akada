<?php

namespace App\Http\Controllers\Users\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\{
    Classroom,Applicant,Result,Year,Payment,Student,
    StudentLogin,Wallet
};

class AdmissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $admissions = Applicant::whereApplicantStatus(0)->orderBy('full_name', 'asc')->get();
        return view('admin.admission.index', compact('admissions'));
    }

    public function edit(admission $admission)
    {
        return view('admin.admission.edit', compact('admission'));
    }

    public function update(Request $request, $id)
    {
        $data = request()->validate([
            'admission_score' => ['required', 'integer'],
        ]);
        Admission::whereId($id)->update($data);
        return redirect()->back()->with('success', 'Data saved successfully.');
    }

    public function process_admission(Request $request)
    {
        for($i = 0; $i < count($request->applicant_id); $i++)
        {
            $admission = Applicant::whereId($request->applicant_id[$i])->first();
            if (!empty($admission->applicant_score)) {
                switch ($admission->applicant_score) {
                    case $admission->applicant_score >= 45:

                        $year = Year::latest('id')->first();
                        $prefix = "AKA";
                        $session = $year->session;
                        $reg_id = $prefix.'/'.$session.$admission->registration_number;
   
                       /* $slug = str_replace(' ', '-', $admission->full_name); */
       

                        $student = Student::create([
                            'full_name' => $admission->full_name,
                            'date_of_birth' => $admission->date_of_birth,
                            'gender' => $admission->gender,
                            'classroom_id' => $admission->classroom_id,
                            'registration_number' => $reg_id,
                            'student_slug' => md5(uniqid())
                        ]);
    
                        $rand = mt_rand(0,100);
                        $strpusername = str_replace(' ', '', $admission->full_name);
                        $strlowusername = strtolower($strpusername);
                        $username = $strlowusername . $rand;
                        $passwordHash = bcrypt('password');
    
                        StudentLogin::create([
                            'username' => $username,
                            'password' => $passwordHash,
                            'email' => $admission->email,
                            'student_id' => $student->id,
                        ]);

                        Wallet::create([
                            'student_id' => $student->id,
                            'account_balance' => $reg_id,
                        ]);
    
                        Payment::create([
                            'student_id' => $student->id,
                            'classroom_id' => $admission->classroom_id,
                            'year_id' => $year->id,
                            'payment_status' => 0,
                            'payment_slug' => md5(uniqid()),
                        ]);
    
                        Result::create([
                            'student_id' => $student->id,
                            'classroom_id' => $admission->classroom_id,
                            'year_id' => $year->id,
                            'result_slug' => md5(uniqid()),
                        ]);
    
                        Applicant::whereId($admission->id)->update([
                            'applicant_status' => 1
                        ]);
                        break;
                    default:
                        Applicant::whereId($admission->id)->update([
                            'applicant_status' => 2
                        ]);
                        break;
                }   
            } else {
                # code...
            }
        }
        return redirect()->back()->with('success', 'Data saved successfully.');
    }
}
