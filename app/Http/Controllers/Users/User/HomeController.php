<?php

namespace App\Http\Controllers\Users\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\contactMail;
use Illuminate\Support\Facades\Storage;

use App\Models\User;
use App\Models\Profile;
use App\Models\Subscription;
use App\Models\SubDetail;
use App\Models\Setting;
use App\Models\Withdraw;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['contactMail']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    { 
        $user_id = auth()->user()->id;
        $subscription = Subscription::whereUserId($user_id)->whereSubStatus(1)->first();
        $countRef = SubDetail::whereUserId($user_id)->whereTask('refer')->count();
        $countRead = SubDetail::whereUserId($user_id)->whereTask('read')->count();
        $ovrPoints = SubDetail::whereUserId($user_id)->sum('point');
        $recentPoints = SubDetail::whereSubscriptionId($subscription->id)->sum('point');
        $ref = SubDetail::whereUserId($user_id)->first();
        $setting = Setting::whereId(1)->first();
        $recentPointsPercent = $recentPoints/100;
        
        
        $recentPointsMoney = $recentPoints * $setting->point_factor / $setting->dollar_rate;
        $recentPointsMoney = number_format((float)$recentPointsMoney, 2, '.', '');
        //get factor from settings
        $ovrPointsMoney = $ovrPoints * $setting->point_factor / $setting->dollar_rate;
        $ovrPointsMoney = number_format((float)$ovrPointsMoney, 2, '.', '');
        
        $history = Withdraw::whereUserId($user_id)->get();
        
        return view('user.dashboard', compact('subscription', 'countRef', 'countRead', 'ovrPoints', 'recentPoints', 'ref', 'setting', 'recentPointsPercent', 'recentPointsMoney', 'ovrPointsMoney', 'history'));
    }
    
    public function profile()
    {
      
    }

    public function saveAccount(Request $request)
    {
        $id = auth()->user()->id;
        
        $data = request()->validate([
            'usdt_address' => ['required', 'string'],
        ]); 

        $wallet = User::whereId($id)->update([
            'usdt_address' => $data['usdt_address'],
        ]);

        return redirect()->back()->with('success', 'Your data has been saved.');
    
    }

    public function accountWithdraw(Request $request)
    {
        $id = auth()->user()->id;
        
        //get total score/amount; reset sub; create new sub; insert amount in withdraw pending status

        $amount = $request->amount;
        $sub_id = $request->sub_id;
        
        Subscription::whereId($sub_id)->update([
          'sub_status' => 0,
        ]);
        
        $subscription = Subscription::create([
          'user_id' => $id,
          'sub_status' => 1,
        ]);
        
        $withdraw = Withdraw::create([
          'user_id' => $id,
          'subscription_id' => $sub_id,
          'amount' => $amount,
          'withdraw_status' => 0
        ]);
   
        return redirect()->back()->with('success', 'Your withdrawal is being processed.');
    
    }

    public function contactMail(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required'
        ]);

        $data = array(
            'name' => $request->name,
            'message' => $request->message,
            'subject' => $request->subject,
            'email' => $request->email 
        );

        Mail::to('info@moontrustbank.com')->send(new contactMail($data));

        return redirect()->back()->with('success', 'Thanks for contacting us.');
    }
 
}
