<?php

namespace App\Http\Controllers;

use App\Models\Deposit;
use App\Models\Investment;
use App\Models\Plan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //

    public function admin_dashboard()
    {
        return view('admin.index');
    }


    public function userIndex()
    {
        $users = User::with('profile')->where('role_as', 0)->paginate(10);
        return view('admin.users.index', compact('users'));
    }





    public function pendingDeposits()
    {
        $deposits = Deposit::with('user', 'plan', 'wallet')->where('status', 0)->orderBy('created_at', 'desc')->get();
        return view('admin.deposits.pending', compact('deposits'));
    }

    public function approvedDeposits()
    {
        $deposits = Deposit::with('user', 'plan')->where('status', 1)->orderBy('created_at', 'desc')->get();
        return view('admin.deposits.approved', compact('deposits'));
    }

    public function approveDeposit($id)
    {


        $deposit = Deposit::findOrFail($id);

        // dd($deposit);

        // Fetch plan details
        $plan = Plan::find($deposit->plan_id);
        if (!$plan) {
            return back()->with('error', 'Investment plan not found');
        }

        // dd($plan);


        $roi = $plan->interest_rate;

        // BEDMAS
        // dd($roi);
        $totalProfit = ($deposit->amount_deposited * $roi / 100) * $plan->duration;

        Investment::create([
            'user_id' => $deposit->user_id,
            'plan_id' => $deposit->plan_id,
            'amount_invested' => $deposit->amount_deposited,
            'roi' => $roi,
            'total_profit' => $totalProfit,
            'start_date' => Carbon::now(),
            'end_date' => Carbon::now()->addDays($plan->duration),
            'withdrawn' => 0
        ]);

        $deposit->status = 1;
        $deposit->save();

        return redirect()->back()->with('success', 'Deposit approved and investment started');
    }
}
