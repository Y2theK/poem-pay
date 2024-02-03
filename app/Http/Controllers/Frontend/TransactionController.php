<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TransactionController extends Controller
{
    public function transaction()
    {
        $user = Auth()->user();
        $transactions =  Transaction::with('source')
                                    ->where('user_id', $user->id)
                                    ->latest()->paginate(5);
       
        return view('frontend.transaction', compact('user', 'transactions'));
    }

    public function transactionDetail($trx_id)
    {
        $user = Auth()->user();
        $transaction = Transaction::where('user_id', $user->id)->where('trx_id', $trx_id)->firstOrFail();
        return view('frontend.transaction_detail', compact('user', 'transaction'));
    }

}
