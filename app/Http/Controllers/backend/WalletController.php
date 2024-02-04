<?php

namespace App\Http\Controllers\backend;

use App\Models\Wallet;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Helpers\UUIDGenerater;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\backend\WalletUpdateRequest;
use App\Services\NotificationService;
use App\Notifications\GeneralNotification;
use App\Services\TransactionService;
use Illuminate\Support\Facades\Notification;

class WalletController extends Controller
{
    public function index()
    {
        return view('backend.wallet.index');
    }

    public function amountUpdate(WalletUpdateRequest $request,TransactionService $transactionService){

        $wallet = Wallet::where('account_number',$request->id)->first();

        if($wallet){
            try {
                
                $transactionService->walletUpdate($wallet,$request->amount);

                return response()->json([
                    'message' => 'Amount Successfully Update.',
                    'status' => 'success'
                ]);

            } catch (\Exception $e) {
                return response()->json([
                    'message' => 'Amount Update failed.',
                    'status' => 'fail'
                ]);
            }
          
        }
    }
}
