<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\backend\ExchangeConfigRequest;
use App\Models\ExchangeConfig;
use Illuminate\Http\Request;

class ExchangeConfigController extends Controller
{
    public function index(){
        $config = ExchangeConfig::firstOrFail();
        return view('backend.exchange-config.index' , compact('config'));
    }

    public function update(ExchangeConfigRequest $request){
        $config = ExchangeConfig::firstOrFail();
        $config->update($request->validated());
        return redirect()->route('admin.exchange_config.index')->with('updated','Updated Successfully');;;
    }
}
