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
    public function getWallets()
    {
        $wallets = Wallet::with('user');

        return DataTables::of($wallets)
        ->filterColumn('account_person',function($query,$keyword){
            $query->whereHas('user',function($q) use ($keyword){
                $q->where('name','like',"%$keyword%")
                ->orWhere('email','like',"%$keyword%")
                ->orWhere('phone','like',"%$keyword%");
            });
        })
        ->addColumn('account_person', function ($row) {
            $user = $row->user;
            if($user) {
                $htmlTable = '<table class="">
            <tr ><th>Name</th><td class="text-yellow-500">' . $user->name . '</td></tr>
            <tr><th>Email</th><td class="text-green-500">' . $user->email . '</td></tr>
            <tr><th>Phone</th><td class="text-red-500">' . $user->phone . '</td></tr>
            </table>';

                return $htmlTable;
            }
            return '-';

        })
        ->editColumn('amount', function ($row) {
            // route('admin.users.edit', $row->id) 
            $edit_icon = '<a href="#" data-id="' . $row->account_number . '" data-amount="' . $row->amount . '" data-name="' . $row->user->name . '" class="amount-edit-btn text-yellow-500  text-right text-xl "> <i class="las la-edit"></i></a>';
            $amount = "<span>". number_format($row->amount,2) . "  <small>MMK</small></span>";
            return '<div class="amount-group flex items-center justify-between">'. $amount . $edit_icon. '</div>';
        })
        ->editColumn('account_number',function($row){
           return '<strong>' . implode(' ', str_split($row->account_number, 4)) . '</strong>';
        })
        ->editColumn('created_at', function ($row) {
            return 'Since ' . $row->created_at->format('Y, M d'); // Customize the date format as needed
        })
        ->editColumn('updated_at', function ($row) {
            return $row->updated_at->format('Y, M d h:m:s a'); // Customize the date format as needed
        })
        ->rawColumns(['account_person','amount','account_number'])
        ->make(true);
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
                $to_account_transaction->type = 3;  //income
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
