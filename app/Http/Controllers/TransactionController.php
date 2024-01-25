<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index() {
        $user_id = auth()->user()->id;
        $income = Transaction::where('user_id', $user_id)->where('type', 'income')->sum('amount');
        $expense = Transaction::where('user_id', $user_id)->where('type', 'expense')->sum('amount');
        $transactions = Transaction::where('user_id', $user_id)->latest()->paginate(10);
        return view('transactions.index', compact(
            'transactions', 'income', 'expense',
        ));
    }

    public function store(Request $request) {
        $request->validate([
            "type" => "required|string",
            "amount" => "required|integer",
            "date" => "required|date",
            "category" => "required|string",
            "note" => "required|min:5|max:255",
        ]);

        $type = $request->type;

        $transaction = new Transaction();
        $transaction->type = $type;
        $transaction->amount = $request->amount;
        $transaction->date = $request->date;
        $transaction->category = $request->category;
        $transaction->note = $request->note;
        $transaction->user_id = auth()->user()->id;
        $transaction->save();

        $currentUser = User::where('id', auth()->user()->id)->first();
        $userSaldo = $currentUser->saldo;
        $currentSaldo = $userSaldo;

        if ($type == 'expense') {
            $currentSaldo = $userSaldo - (int) $request->amount;
            $currentUser->saldo = $currentSaldo;
        } else if ($type == 'income') {
            $currentSaldo = $userSaldo + (int) $request->amount;
            $currentUser->saldo = $currentSaldo;
        }

        $currentUser->save();

        return redirect('/transactions')->withInfo("Berhasil menambahkan transaksi!");
    }

    public function update($id, Request $request) {
        $request->validate([
            "type" => "required|string",
            "amount" => "required|integer",
            "date" => "required|date",
            "category" => "required|string",
            "note" => "required|min:5|max:255",
        ]);

        $transaction = Transaction::findOrFail($id);
        $transaction->type = $request->type;
        // $transaction->amount = $request->amount;
        $transaction->date = $request->date;
        $transaction->category = $request->category;
        $transaction->note = $request->note;
        $transaction->user_id = auth()->user()->id;
        $transaction->save();

        return redirect('/transactions')->withInfo("Berhasil mengubah transaksi!");
    }

    public function delete($id) {
        $transaction = Transaction::findOrFail($id);
        $transaction->delete();

        // $type = $transaction->type;
        // $amount = $transaction->amount;

        // $currentUser = User::where('id', auth()->user()->id)->first();
        // $userSaldo = $currentUser->saldo;
        // $currentSaldo = $userSaldo;

        // if ($type == 'expense') {
        //     $currentSaldo = $userSaldo + (int) $amount;
        //     $currentUser->saldo = $currentSaldo;
        // } else if ($type == 'income') {
        //     $currentSaldo = $userSaldo - (int) $amount;
        //     $currentUser->saldo = $currentSaldo;
        // }

        // $currentUser->save();

        return redirect('/transactions')->withInfo("Berhasil menghapus transaksi!");
    }
}
