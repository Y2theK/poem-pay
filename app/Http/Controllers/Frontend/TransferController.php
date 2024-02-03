<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use App\Models\Wallet;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Helpers\UUIDGenerater;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Notifications\GeneralNotification;
use Illuminate\Support\Facades\Notification;
use App\Http\Requests\frontend\TransferConfirmRequest;

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
        // dd($request->all());

        $to_phone = $request->to_phone;
        $amount = $request->amount;
        $description = $request->description;

        $str = $to_phone . $amount . $description;
        $hash_value = hash_hmac('sha256', $str, 'magic_pay');

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

        $to_phone = $request->to_phone;
        $amount = $request->amount;
        $description = $request->description;

        return view('frontend.transfer_confirm', compact('from_account_user', 'to_account_user', 'amount', 'description', 'hash_value'));
    }

    public function transferComplete(TransferConfirmRequest $request)
    {

        $to_phone = $request->to_phone;
        $amount = $request->amount;
        $description = $request->description;

        $str = $to_phone . $amount . $description;
        $hash_value = hash_hmac('sha256', $str, 'magic_pay');

        if($hash_value !== $request->hash_value) {
            return redirect()->back()->withErrors(['fail' => 'The given data is invalid.'])->withInput();
        }

        $from_account_user = Auth()->user();
        $to_account_user = User::where('phone', $request->to_phone)->first();

        if(!$to_account_user) {
            return redirect()->back()->withErrors(['fail' => 'The given data is invalid.'])->withInput();
        }
        if($from_account_user->phone == $to_phone) {
            return redirect()->back()->withErrors(['fail' => 'The given data is invalid.'])->withInput();
        }
        if($from_account_user->wallet->amount < $request->amount) {
            return redirect()->back()->withErrors(['fail' => 'The given data is invalid.'])->withInput();
        }
        if(!$from_account_user->wallet || !$to_account_user->wallet) {
            return redirect()->back()->withErrors(['fail' => 'The given data is invalid.'])->withInput();
        }

        DB::beginTransaction();

        try {

            $from_account_wallet = $from_account_user->wallet;
            $from_account_wallet->decrement('amount', $amount);
            $from_account_wallet->save();

            $to_account_wallet = $to_account_user->wallet;
            $to_account_wallet->increment('amount', $amount);
            $to_account_wallet->save();

            $ref_no = UUIDGenerater::refNo();
            $from_account_transaction = new Transaction();
            $from_account_transaction->ref_no = $ref_no;
            $from_account_transaction->trx_id = UUIDGenerater::trxID();
            $from_account_transaction->user_id = $from_account_user->id;
            $from_account_transaction->source_id = $to_account_user->id;
            $from_account_transaction->type = 2;  //expense
            $from_account_transaction->amount = $amount;
            $from_account_transaction->description = $description;
            $from_account_transaction->save();

            $to_account_transaction = new Transaction();
            $to_account_transaction->ref_no = $ref_no;
            $to_account_transaction->trx_id = UUIDGenerater::trxID();
            $to_account_transaction->user_id = $to_account_user->id;
            $to_account_transaction->source_id = $from_account_user->id;
            $to_account_transaction->type = 1;  //income
            $to_account_transaction->amount = $amount;
            $to_account_transaction->description = $description;
            $to_account_transaction->save();

            DB::commit();

            $title = 'E-money Transferred!';
            $message = 'You have transferred ' . number_format($amount) . ' MMK to ' . $to_account_user->name . '.';
            $sourceable_id = $from_account_transaction->id;
            $sourceable_type = Transaction::class;
            $web_link = route('transactions.detail',$from_account_transaction->trx_id);

            Notification::send($from_account_user,new GeneralNotification($title,$message,$sourceable_id,$sourceable_type,$web_link));

            $title = 'E-money Received!';
            $message = 'You have received ' . number_format($amount) . ' MMK from ' . $from_account_user->name . '.';
            $sourceable_id = $to_account_transaction->id; 
            $sourceable_type = Transaction::class;
            $web_link = route('transactions.detail',$to_account_transaction->trx_id);

            Notification::send($to_account_user,new GeneralNotification($title,$message,$sourceable_id,$sourceable_type,$web_link));

            return redirect()->route('transactions.detail', $from_account_transaction->trx_id)->with('transfer_success', 'Successfully Transferred');

        } catch (\Throwable $e) {
            DB::rollBack();
            return redirect()->back()->withErrors('failed', 'Something wrong.')->withInput();
        }



        // return view('frontend.transfer_complete',compact('from_account_user','to_account_user','amount','description'));
    }

    

    public function hashTransfer(Request $request)
    {
        $str = $request->to_phone . $request->amount . $request->description;
        $hash_value = hash_hmac('sha256', $str, 'magic_pay');
        return response()->json([
            'status' => 'success',
            'data' => $hash_value
        ]);
    }

    public function toAccountVerify(Request $request)
    {
        $user = User::where('phone', $request->phone)->first();


        if(auth()->user()->phone != $request->phone) {
            if($user) {
                return response()->json([
                    'status' => 'success',
                    'data' => $user
                ]);
            }
            $wallet = Wallet::where('account_number',$request->phone)->first();
            if(auth()->id() != $wallet->user_id) {
                if($wallet) {
                    return response()->json([
                        'status' => 'success',
                        'data' => $wallet->user
                    ]);
                }
            }
        }
        return response()->json([
            'status' => 'fail',
            'message' => 'Invalid Phone Number'
        ]);

    }
}
