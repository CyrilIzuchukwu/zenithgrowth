<?php

namespace App\Http\Controllers;

use App\Models\Investment;
use Carbon\Carbon;
use Illuminate\Http\Request;

class InvestmentController extends Controller
{
    //
    public function myInvestments()
    {
        // $investments = Investment::where('user_id', auth()->id())->get();
        $user = auth()->user();
        $investments = $user->investments()->with('plan')->get();
        // dd($investments);
        return view('dashboard.investments.index', compact('investments'));
    }

    // Withdraw function
    public function withdraw($id)
    {
        $investment = Investment::where('id', $id)->where('user_id', auth()->id())->first();

        if (!$investment) {
            return back()->with('error', 'Investment not found.');
        }

        // Check if the investment is due for withdrawal
        if ($investment->due || Carbon::now()->greaterThanOrEqualTo($investment->end_date)) {
            // Process withdrawal logic (e.g., transfer to wallet, mark as withdrawn)
            $investment->update(['withdrawn' => 'withdrawn']);

            return back()->with('success', 'Withdrawal successful.');
        }

        return back()->with('error', 'Investment is not yet due for withdrawal.');
    }
}
