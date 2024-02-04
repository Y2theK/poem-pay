<?php

namespace App\Services;

use App\Models\User;
use App\Models\Transaction;
use App\Helpers\UUIDGenerater;
use Illuminate\Support\Facades\DB;
use App\Services\NotificationService;

class TransactionService{

    public function make(User $from_account_user,User $to_account_user,float $amount,string $description){
        
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
            
            $notificationService = new NotificationService();
            
            $from_account_noti_data = array();
            $from_account_noti_data['title'] = 'E-money Transferred!';
            $from_account_noti_data['message'] = 'You have transferred ' . number_format($amount) . ' MMK to ' . $to_account_user->name . '.';
            $from_account_noti_data['sourceable_id'] = $from_account_transaction->id;
            $from_account_noti_data['sourceable_type'] = Transaction::class;
            $from_account_noti_data['web_link'] = route('transactions.detail',$from_account_transaction->trx_id);
            
            $notificationService->sendGeneralNotification($from_account_noti_data,$from_account_user);
            
            $to_account_noti_data = array();
            $to_account_noti_data['title'] = 'E-money Received!';
            $to_account_noti_data['message'] = 'You have received ' . number_format($amount) . ' MMK from ' . $from_account_user->name . '.';
            $to_account_noti_data['sourceable_id'] = $to_account_transaction->id; 
            $to_account_noti_data['sourceable_type'] = Transaction::class;
            $to_account_noti_data['web_link'] = route('transactions.detail',$to_account_transaction->trx_id);
            
            $notificationService->sendGeneralNotification($to_account_noti_data,$to_account_user);

            return $from_account_transaction;
            
        } catch (\Throwable $e) {
            DB::rollBack();
            throw $e;
        }
    }
}