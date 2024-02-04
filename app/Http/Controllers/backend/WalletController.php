<?php

namespace App\Http\Controllers\backend;

use App\Models\Wallet;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Helpers\UUIDGenerater;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Notifications\GeneralNotification;
use Illuminate\Support\Facades\Notification;

class WalletController extends Controller
{
    public function index()
    {
        return view('backend.wallet.index');
    }

    public function amountUpdate(Request $request){
        $wallet = Wallet::where('account_number',$request->id)->first();

        if($wallet){
            DB::beginTransaction();
            try {
                $wallet->amount = $request->amount;
                $wallet->update();
    
                $to_account_transaction = new Transaction();
                $to_account_transaction->ref_no = UUIDGenerater::refNo();
                $to_account_transaction->trx_id = UUIDGenerater::trxID();
                $to_account_transaction->user_id = $wallet->user->id;
                $to_account_transaction->source_id = 0;
                $to_account_transaction->type = 3;  //wallet reset
                $to_account_transaction->amount = $request->amount;
                $to_account_transaction->description = 'Matual Pay';
                $to_account_transaction->save();

                DB::commit();

                $title = 'Wallet Amount Updated!';
                $message = 'Your wallet amount is now ' . number_format($request->amount) . ' MMK. It is updated by by Admin. For more info, please contact admin team.';
                $sourceable_id = $to_account_transaction->id; 
                $sourceable_type = Transaction::class;
                $web_link = route('transactions.detail',$to_account_transaction->trx_id);
    
                Notification::send($wallet->user,new GeneralNotification($title,$message,$sourceable_id,$sourceable_type,$web_link));

                return response()->json([
                    'message' => 'Amount Successfully Update.',
                    'status' => 'success'
                ]);

            } catch (\Exception $e) {
                DB::rollBack();
                dd($e->getMessage());
                return response()->json([
                    'message' => 'Amount Update failed.',
                    'status' => 'fail'
                ]);
            }
          
        }
    }
}
