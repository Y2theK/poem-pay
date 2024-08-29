<?php

namespace App\Http\Controllers\backend;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\backend\SettingRequest;

class SettingController extends Controller
{
    public function index(){
        $setting = Setting::firstOrFail();
        return view('backend.setting.index' , compact('setting'));
    }

    public function update(SettingRequest $request){
        $setting = Setting::firstOrFail();
        $setting->update($request->validated());
        return redirect()->route('admin.setting.index')->with('updated','Updated Successfully');
    }
}
