<?php

namespace App\Http\Controllers\Users\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\{
  Admin,
};

class VendorController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $admins = Admin::orderBy('name', 'asc')->get();
        
        return view('user.vendor.index', compact('admins'));
    }
}
