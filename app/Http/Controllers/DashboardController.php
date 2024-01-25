<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard_view() {
        $currentSaldo = auth()->user()->saldo;
        $transactions = Transaction::latest()->first();

        $lastTransaction = (object) [
            "type" => $transactions->type,
            "amount" => $transactions->amount,
        ];

        return view('dashboard', compact(
            'currentSaldo', 'lastTransaction'
        ));
    }
}
