<?php

namespace App\Http\Controllers\Users\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\{
  Year,
  Student,
  Result,
  Payment,
};

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        if(auth()->user()->is_super == false)
        {
            return redirect('admin')->with('error', 'Authorized access.');
        }
        $year = Year::latest('id')->first();
        return view('admin.setting.index', compact('year'));
    }
    
    public function year_upgrade(Request $request)
    {
        $check_result_status = Result::whereId($request->year_id)->whereResultStatus(0)->exists();
        if($check_result_status)
        {
            return redirect()->back()->with('error', 'Some results have not been compiled.');
        }
      
        Year::whereId($request->year_id)->update([
            'year_status' => 1
        ]);
        
        $year = Year::whereId($request->year_id)->first();
        
        if ($year->term > 2) {
            $year1 = substr($year->session, 0, 4);
            $year2 = substr($year->session, 5, 9);

            $newYear1 = $year1 + 1;
            $newYear2 = $year2 + 1;
            $session = $newYear1.'/'.$newYear2;
                
            $new_year = Year::create([
                        'session' => $session,
                        'term' => 1,
                        'year_slug' => md5(uniqid())
            ]);

            $students = Student::all();
            foreach($students as $student)
            {
                //check if total average is > than 45... if yes, upgrade class, if not retain class
                //give class 7 to graduates and set graudation date, check if 7, do nothing, if less carry normal practice
                $result_status = Result::whereYearId($year->id)->whereStudentId($student->id)->first();
                if ($student->classroom_id > 6) {
                                # code...
                } else {
                    switch ($result_status->session_average) 
                    {
                        case $result_status->session_average >= 45:
                            $new_classroom = $student->classroom_id + 1 ;
                
                            $update_student = Student::whereId($student->id)->update([
                                                'classroom_id' => $new_classroom
                                            ]);
                
                            $new_result = Result::create([
                                                'student_id' => $student->id,
                                                'classroom_id' => $new_classroom,
                                                'year_id' => $new_year->id,
                                                'result_slug' => time()
                                            ]);
                
                            $payment = Payment::create([
                                                'student_id' => $student->id,
                                                'classroom_id' => $new_classroom,
                                                'year_id' => $new_year->id,
                                                'payment_slug' => time()
                                            ]);
                        break;
                        default:
                            $retain_classroom = $student->classroom_id;
                
                            $update_student = Student::whereId($student->id)->update([
                                                'classroom_id' => $retain_classroom
                                            ]);
                
                            $new_result = Result::create([
                                                'student_id' => $student->id,
                                                'classroom_id' => $retain_classroom,
                                                'year_id' => $new_year->id,
                                                'result_slug' => time()
                                            ]);
                
                            $payment = Payment::create([
                                                'student_id' => $student->id,
                                                'classroom_id' => $retain_classroom,
                                                'year_id' => $new_year->id,
                                                'payment_slug' => time()
                                            ]);
                        break;
                    } 
                } 
            }
        } else {
            $session = $year->session;
            $term = $year->term + 1;
                
            $year = Year::create([
                    'session' => $year->session,
                    'term' => $term,
                    'year_slug' => md5(uniqid())
            ]);

            $students = Student::all();
                foreach($students as $student)
                {
                    if ($student->classroom_id > 6) {

                    } else
                    {
                        $classroom = $student->classroom_id;

                        $result = Result::create([
                            'student_id' => $student->id,
                            'classroom_id' => $classroom,
                            'year_id' => $year->id,
                            'result_slug' => md5(uniqid())
                        ]);

                        $payment = Payment::create([
                            'student_id' => $student->id,
                            'classroom_id' => $classroom,
                            'year_id' => $year->id,
                            'payment_slug' => md5(uniqid())
                        ]);
                    }
                }
        }
        return redirect()->back()->with('success', 'Data saved successfully.');
        
    
    }
    
    public function admission_status()
    {
    
    }
    
    public function year_settings(Request $request)
    {
      $data = request()->validate([
            'session' => ['required', 'string'],
            'term' => ['required', 'integer'],
            'days_per_session' => ['required', 'integer'],
            'admission_score' => ['required', 'integer'],
      ]);
      
      Year::whereId($request->year_id)->update([
            'session' => $request->session,
            'term' => $request->term,
            'days_per_session' => $request->days_per_session,
            'admission_score' => $request->admission_score,
        ]);
    }
    
    public function result_status()
    {
    
    }
}