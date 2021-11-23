<?php

namespace App\Http\Controllers\Users\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;

use App\Models\{
    Student,
    Wallet,
    Transaction,
    Payment,
};

class TransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:student');
    }

    public function index()
    {
        $wallet = Wallet::whereStudentId(auth()->user()->student_id)->first();
        
        
        return view('student.transaction.index', compact('wallet'));
    }

    public function deposit(Request $request)
    {
        $data = request()->validate([
            'amount' => ['required', 'integer'],
        ]);

        $deposit = Transaction::create([
            'amount' => $request->amount,
            'transaction_type' => 1,
            'wallet_id' => $request->wallet_id
        ]);

        $new_balance = $request->amount + $request->old_balance;

        $wallet = Wallet::whereId($request->wallet_id)->update([
            'account_balance' => $new_balance,
        ]);

        return redirect()->back()->with('success', 'Transaction started successfully');
    }

    public function withdraw(Request $request)
    {
        $data = request()->validate([
            'amount' => ['required', 'integer'],
            'bank_name' => ['required', 'string'],
            'account_number' => ['required', 'integer'],
            'account_name' => ['required', 'string'],
        ]);

        $withdraw = Transaction::create([
            'amount' => $request->amount,
            'bank_name' => $request->bank_name,
            'account_name' => $request->account_name,
            'account_number' => $request->account_number,
            'transaction_type' => 2,
            'wallet_id' => $request->wallet_id
        ]);

        /*$new_balance = $request->old_balance + $request->amount ;

        $wallet = Wallet::whereId($request->wallet_id)->update([
            'account_balance' => $new_balance,
        ]);*/

        return redirect()->back()->with('success', 'Transaction started successfully');
    }

    public function fee_payment(Request $request)
    {
        $new_balance = $request->old_balance - $request->amount_due;
        $wallet = Wallet::whereId($request->wallet_id)->update([
            'account_balance' => $new_balance,
        ]);

        $payment = Payment::whereId($request->payment_id)->update([
            'payment_status' => 1,
        ]);

        $payment = Transaction::create([
            'amount' => $request->amount_due,
            'transaction_type' => 3,
            'wallet_id' => $request->wallet_id
        ]);
        
        return redirect()->back()->with('success', 'Transaction started successfully');
    }
}