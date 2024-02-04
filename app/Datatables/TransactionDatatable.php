<?php

namespace App\Datatables;

use App\Models\Transaction;
use Yajra\DataTables\DataTables;
use Illuminate\Database\Eloquent\Builder;

class TransactionDatatable {

    public function getTransactions()
    {
        $data = Transaction::with(['user','source']);
        return $this->datatable($data);

    }

    public function datatable(Builder $query){
        return DataTables::of($query)
                    ->editColumn('created_at', function ($row) {
                        return  $row->created_at->format('Y, M d H:i:s'); 
                    })
                    ->addColumn('user',function($row){
                        return $row->user? $row->user->name : config('mail.from.address');
                    })
                    ->addColumn('source',function($row){
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
                    ->filterColumn('user',function($query,$keyword){
                        $query->whereHas('user',function($q) use ($keyword){
                            $q->where('name','like',"%" . $keyword. "%");
                        });
                    })
                    ->filterColumn('source',function($query,$keyword){
                        $query->whereHas('source',function($q) use ($keyword){
                            $q->where('name','like',"%" . $keyword. "%");
                        });
                    })
                    ->editColumn('type',function($row){

                        $html = '<span class="px-2 py-1 rounded-md  text-xs font-bold text-white bg-' . config('transaction_types.typeColors')[$row->type] . ' "> ' . config('transaction_types.typeTexts')[$row->type]
                        . '</span>';

                        return $html;
                    })
                    ->rawColumns(['type'])
                    ->make(true);
    }
}