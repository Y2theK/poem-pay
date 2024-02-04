<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\frontend\TransferConfirmRequest;
use App\Services\TransactionService;

class TransferController extends Controller
{
    public function transfer(Request $request)
    {
        $user = Auth()->user();
        $to_account = null;
        if($request->has('to_phone')) {
            $to_account = User::where('phone', $request->to_phone)->first();
            if(!$to_account || $to_account == $user) {
                return back()->withErrors(['fail' => 'Invalid QR Code']);
            }
        }

        return view('frontend.transfer', compact('user', 'to_account'));
    }

    public function transferConfirm(TransferConfirmRequest $request)
    {

        $to_phone = $request->to_phone;
        $amount = $request->amount;
        $description = $request->description;

        $str = $to_phone . $amount . $description;
        
        $hash_value = get_hashed_hmac_value($str);

        if($hash_value !== $request->hash_value) {
            return redirect()->back()->withErrors(['fail' => 'The given data is invalid.'])->withInput();
        }

        $from_account_user = Auth()->user();
        $to_account_user = User::where('phone', $request->to_phone)->first();

        if(!$to_account_user) {
            return redirect()->back()->withErrors(['to_phone' => 'Invalid Account.'])->withInput();
        }
        if($from_account_user->phone == $to_phone) {
            return redirect()->back()->withErrors(['to_phone' => 'Invalid Phone Number.'])->withInput();
        }
        if($from_account_user->wallet->amount < $request->amount) {
            return redirect()->back()->withErrors(['amount' => 'Insuffient Balance.'])->withInput();
        }
        if(!$from_account_user->wallet || !$to_account_user->wallet) {
            return redirect()->back()->withErrors(['to_phone' => 'Invalid Account.'])->withInput();
        }

        return view('frontend.transfer_confirm', compact('from_account_user', 'to_account_user', 'amount', 'description', 'hash_value'));
    }

    public function transferComplete(TransferConfirmRequest $request,TransactionService $transactionService)
    {
        
        $to_phone = $request->to_phone;
        $amount = $request->amount;
        $description = $request->description;
        
        $str = $to_phone . $amount . $description;
        $hash_value = get_hashed_hmac_value($str);
        
        if($hash_value !== $request->hash_value) {
            return redirect()->back()->withErrors(['fail' => 'The given data is invalid.'])->withInput();
        }

        $from_account_user = Auth()->user();
        $to_account_user = User::where('phone', $request->to_phone)->first();

        if(!$to_account_user) {
            return redirect()->back()->withErrors(['fail' => 'The given data is invalid.']);
        }
        if($from_account_user->phone == $to_phone) {
            return redirect()->back()->withErrors(['fail' => 'The given data is invalid.']);
        }
        if($from_account_user->wallet->amount < $request->amount) {
            return redirect()->back()->withErrors(['fail' => 'The given data is invalid.']);
        }
        if(!$from_account_user->wallet || !$to_account_user->wallet) {
            return redirect()->back()->withErrors(['fail' => 'The given data is invalid.']);
        }
        
        try {
            $from_account_transaction = $transactionService->make($from_account_user,$to_account_user,$amount,$description);
            return redirect()->route('transactions.detail', $from_account_transaction->trx_id)->with('transfer_success', 'Successfully Transferred');
        } catch (\Throwable $th) {
            // dd($th);
            return redirect()->back()->withErrors(['fail' => 'The given data is invalid.']);
        }

    }

    

    public function hashTransfer(Request $request)
    {
        $str = $request->to_phone . $request->amount . $request->description;
        $hash_value = get_hashed_hmac_value($str);
        return response()->json([
            'status' => 'success',
            'data' => $hash_value
        ]);
    }

    public function toAccountVerify(Request $request)
    {
        $user = User::where('phone', $request->phone)->first();

        if($user && auth()->user()->phone != $request->phone) {
                return response()->json([
                    'status' => 'success',
                    'data' => $user
                ]);
        }
        return response()->json([
            'status' => 'fail',
            'message' => 'Invalid Phone Number'
        ]);

    }
}
