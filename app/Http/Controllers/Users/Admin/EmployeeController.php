<?php

namespace App\Http\Controllers\Users\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\{
    TeacherLogin,
    AdminLogin,
    Employee,
    Role,
};

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(Request $request)
    {
        $filter = $request->filter;
        if(!empty($filter)) 
        {
            $employees = Employee::where('id', '<>', 1)->where('full_name', 'like', '%'.$filter.'%')->paginate(10);
        }
        else{
            $employees = Employee::where('id', '<>', 1)->orderBy('created_at', 'asc')->paginate(10);
        }

        return view('admin.employee.index', compact('employees', 'filter'));
    }

    public function create()
    {
        $employee = new Employee();
        $roles = Role::all();
        return view('admin.employee.create', compact('employee', 'roles'));
    }

    public function store(Request $request)
    {
        $data = request()->validate([
            'full_name' => ['required', 'string'],
            'email' => ['required', 'unique:employees'],
            'role_id' => ['required', 'integer'],
            'classroom_id' => ['nullable', 'unique:employees'],
            'subject_id' => ['nullable', 'unique:employees'],
        ]); 

        $rand = mt_rand(0,100);
        $strpusername = str_replace(' ', '', $request->input('full_name')); 
        $strlowusername = strtolower($strpusername);
        $username = $strlowusername . $rand;
        $alpha = "abcdefghijklmnopqrstuvwxyz";
        $alpha_upper = strtoupper($alpha);
        $numeric = "0123456789";
        $special = "!@$#*%";
        $chars = $alpha . $alpha_upper . $numeric . $special;
        $length = 10;
        $chars = str_shuffle($chars);
        $len = strlen($chars);
        $password = "";
        for($i=0;$i<$length;$i++) {
            $password .= substr($chars, rand(0, $len-1),1);
        }
        $password = str_shuffle($password);
        $passwordHash = bcrypt($password);

        $employee = Employee::create([
            'full_name' => $request->input('full_name'),
            'email' => $request->input('email'),
            'role_id' => $request->input('role_id'),
            'classroom_id' => $request->input('classroom_id'),
            'subject_id' => $request->input('subject_id'),
            'employee_slug' => $username,
        ]);
        
        $employeeRole = $request->input('role_id');

        if ($employeeRole > 1) {
            TeacherLogin::create([
                'username' => $username,
                'password' => $passwordHash,
                'employee_id' => $employee->id,
            ]);
        } else {
            AdminLogin::create([
                'username' => $username,
                'password' => $passwordHash,
                'employee_id' => $employee->id,
            ]);
        }

        return redirect()->back()->with('success', 'Data has been created. '.$username.' '.$password.'');//send password to mail
    }

    public function show(employee $employee)
    {
        return view('admin.employee.show', compact('employee'));
    }

    public function edit(employee $employee)
    {
        return view('admin.employee.edit', compact('employee'));
    }

    public function update(Request $request, $id)
    {
        $data = request()->validate([
            'full_name' => ['required', 'string'],
            
            'role_id' => ['required', 'integer'],
            'classroom_id' => ['nullable', 'unique:employees'],
            'subject_id' => ['nullable', 'unique:employees'],
        ]); 

        //Handle file upload
        /*if($request->hasFile('employee_image')){
            // Get filename with the extension
            $filenameWithExt = $request->file('employee_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('employee_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('employee_image')->storeAs('public/employee_images', $fileNameToStore);
        }*/


        $employee = Employee::whereId($id)->update([
            'full_name' => $request->input('full_name'),
            //'email' => $request->input('email'),
            'role_id' => $request->input('role_id'),
            'classroom_id' => $request->input('classroom_id'),
            'subject_id' => $request->input('subject_id'),
        ]);
        
        //if role id changes
       /* switch ($request->input('old_role')) {
            case $request->input('old_role') >= 45:
                
                break;
            default:
                
                break;
        } */

        return redirect()->back()->with('success', 'Data saved successfully.');  
    }

    public function destroy($id)
    {
        $employee = Employee::find($id);
        //find across tables delete
        $employee->delete();
        return redirect()->back()->with('success', 'Data deleted successfully.');
    }

}