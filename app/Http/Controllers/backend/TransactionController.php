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
    
}
