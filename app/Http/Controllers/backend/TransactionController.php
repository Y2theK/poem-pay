<?php

namespace App\Http\Controllers\backend;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;

class TransactionController extends Controller
{
    public function index(){
       
        return view('backend.transaction.index');
    }
    public function getTransactions()
    {
        $data = Transaction::with(['user','source']);
        return DataTables::of($data)
            ->editColumn('created_at', function ($row) {
                return  $row->created_at->format('Y, M d H:i:s'); 
            })
            ->editColumn('user_id',function($row){
                return $row->user? $row->user->name : config('mail.from.address');
            })
            ->editColumn('source_id',function($row){
                return $row->source ? $row->source->name : config('mail.from.address');
            })
            ->editColumn('amount',function($row){
                return price_format($row->amount);
            })
            ->editColumn('trx_id',function($row){
                return transaction_format($row->trx_id);
            })
            ->editColumn('ref_no',function($row){
                return transaction_format($row->ref_no);
            })
            // implode(' ', str_split($user->wallet->account_number, 4))
            ->editColumn('type',function($row){

                $html = '<span class="px-2 py-1 rounded-md  text-xs font-bold text-white bg-' . config('transaction_types.typeColors')[$row->type] . ' "> ' . config('transaction_types.typeTexts')[$row->type]
                . '</span>';

                return $html;
            })
            ->rawColumns(['type'])
            ->make(true);
    }
}
