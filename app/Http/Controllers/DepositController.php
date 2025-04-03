<?php

namespace App\Http\Controllers;

use App\Models\Deposit;
use App\Models\Plan;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class DepositController extends Controller
{
    //

    public function userDesposit()
    {
        $plans = Plan::where('status', 'active')->get();
        $wallets = Wallet::get();
        return view('dashboard.deposit.create-deposit', compact('plans', 'wallets'));
    }


    public function userMakeDeposit(Request $request)
    {
        try {
            // Validate the request
            $request->validate([
                'plan_id' => 'required|exists:plans,id',
                'wallet_id' => 'required|exists:wallets,id',
                'amount' => 'required|numeric|min:1',
            ]);

            // dd($request);

            // Get the selected plan
            $plan = Plan::findOrFail($request->plan_id);

            // dd($plan);

            // Check if the amount is within the plan's range
            if ($request->amount < $plan->minimum_amount || $request->amount > $plan->maximum_amount) {
                return back()->with('error', "Deposit amount must be between {$plan->minimum_amount} and {$plan->maximum_amount}.");
            }

            Session::put('deposit_details', [
                'user_id' => Auth::id(),
                'plan_id' => $request->plan_id,
                'wallet_id' => $request->wallet_id,
                'amount_deposited' => $request->amount,
            ]);

            // Redirect to confirm deposit page
            return redirect()->route('deposit.confirm');
        } catch (\Exception $e) {
            return back()->with('error',  $e->getMessage());
        }
    }


    public function confirmDeposit()
    {
        $wallets = Wallet::get();
        return view('dashboard.deposit.confirm-deposit', compact('wallets'));
    }


    public function submitDeposit(Request $request)
    {
        try {
            // Ensure session deposit details exist
            if (!Session::has('deposit_details')) {
                return redirect()->route('user.make-deposit')->withErrors(['error' => 'No deposit session found.']);
            }

            // Validate the uploaded proof
            $request->validate([
                'proof' => 'required|image|mimes:jpeg,png,jpg|max:2048', // Allow only image formats
            ]);


            // Retrieve deposit details from session
            $depositDetails = Session::get('deposit_details');
            // Handle file upload manually
            if ($request->hasFile('proof')) {
                $file = $request->file('proof');
                $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads'), $fileName); // Move file to `public/uploads`
                $proofPath =  $fileName; // Store relative path
            } else {
                return back()->withErrors(['error' => 'File upload failed.']);
            }
            // Save the deposit in the database
            $deposit = new Deposit();
            $deposit->user_id = $depositDetails['user_id'];
            $deposit->plan_id = $depositDetails['plan_id'];
            $deposit->wallet_id = $depositDetails['wallet_id'];
            $deposit->amount_deposited = $depositDetails['amount_deposited'];
            $deposit->status = 0; // Pending
            $deposit->proof = $proofPath; // Store proof file path
            $deposit->save();

            // Clear the session to prevent duplicate deposits
            Session::forget('deposit_details');

            // Redirect with success message
            return redirect()->route('user.deposit-history')->with('success', 'Deposit submitted successfully. Awaiting approval.');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }


    public function depositHistory()
    {
        $deposits = Deposit::where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();

        
        return view('dashboard.deposit.deposit-history', compact('deposits'));
    }
}
