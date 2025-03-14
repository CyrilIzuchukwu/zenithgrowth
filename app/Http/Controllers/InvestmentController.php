<?php

namespace App\Http\Controllers;

use App\Models\Investment;
use Illuminate\Http\Request;

class InvestmentController extends Controller
{
    //
    public function myInvestments()
    {
        $investments = Investment::where('user_id', auth()->id())->get();
        return view('dashboard.investments.index', compact('investments'));
    }
}
