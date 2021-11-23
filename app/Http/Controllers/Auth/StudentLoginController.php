<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:student')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.student-login');
    }

    public function login(Request $request)
    {
        // Validate form data
        $this->validate($request, [
            'username' => 'required|string',
            'password' => 'required|min:8'
        ]);

        // Attempt to log the user in
        if(Auth::guard('student')->attempt(['username' => $request->username, 'password' => $request->password], $request->remember))
        {
            return redirect()->intended(route('student.dashboard'));
        }

        // if unsuccessful
        return redirect()->back()->withInput($request->only('username','remember'));
    }
}