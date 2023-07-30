<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\TransferConfirmRequest;
use App\Http\Requests\frontend\TransferConfirmRequest as FrontendTransferConfirmRequest;

class PageController extends Controller
{
    public function home(){
        $user = Auth()->user();
        return view('frontend.home',compact('user'));
    }
    public function profile(){
        $user = Auth::user();
        return view('frontend.profile',compact('user'));
    }
    public function updatePasswordCreate(){
        return view('frontend.update_password');

    }
    public function updatePasswordStore(Request $request){

        $request->validate([
            'old_password' => 'required',
            'new_password' => ['required',Rules\Password::defaults()]
        ]);
        $user = Auth()->user();

        if(Hash::check($request->old_password,$user->password)){
            $user->password = Hash::make($request->new_password);
            $user->update();

            return redirect()->route('profile')->with(['updated' => 'Password Updated.']);
        }
        return redirect()->back()->withErrors(['old_password' => 'Old Password is not correct']);


    }
    public function wallet(){
        $user = Auth()->user();
        return view('frontend.wallet',compact('user'));
    }
    public function transfer(){
        $user = Auth()->user();
        return view('frontend.transfer',compact('user'));
    }
    public function transferConfirm(FrontendTransferConfirmRequest $request){

        $from_account_user = Auth()->user();
        $to_account_user = User::where('phone',$request->to_phone)->first();

        $to_phone = $request->to_phone;
        $amount = $request->amount;
        $description = $request->description;

        return view('frontend.transfer_confirm',compact('from_account_user','to_account_user','amount','description'));
    }
    public function toAccountVerify(Request $request){
        $user = User::where('phone',$request->phone)->first();
        if(auth()->user()->phone != $request->phone){
            if($user){
                return response()->json([
                    'status' => 'success',
                    'data' => $user
                ]);
            }
        }
            return response()->json([
                'status' => 'fail',
                'message' => 'Invalid Phone Number.'
        ]);
        
    }
}
