<?php

namespace App\Datatables;

use App\Models\Wallet;
use Yajra\DataTables\DataTables;
use Illuminate\Database\Eloquent\Builder;
use App\Datatables\Contract\DatatableInterface;

class WalletDatatable implements DatatableInterface{

    public function getWallets()
    {
        $data = Wallet::with('user');
        return $this->datatable($data);
    }

    public function datatable(Builder $query){
        return DataTables::of($query)
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
}