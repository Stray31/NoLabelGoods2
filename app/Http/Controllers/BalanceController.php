<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class BalanceController extends Controller
{
    public function deposit(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1',
        ]);
        $user = Auth::user() ?? User::first();
        $user->balance += $request->input('amount');
        $user->save();
        return redirect()->route('profile')->with('success', 'Deposit successful!');
    }
}
