<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Validation\Rules;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PageController extends Controller
{
    public function home(){
        return view('frontend.home');
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

}
