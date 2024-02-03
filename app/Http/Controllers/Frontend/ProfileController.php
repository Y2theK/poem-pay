<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Notifications\GeneralNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Validation\Rules;

class ProfileController extends Controller
{
    public function profile()
    {
        $user = Auth::user();
        return view('frontend.profile', compact('user'));
    }
    public function uploadProfileImage(Request $request){

       $request->validate([
        'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
       ]);

       $imageName = time().'.'.$request->avatar->extension();

       $path = 'avatars/';

        $request->avatar->storeAs($path,$imageName,'public');
      
        $user = Auth::user();
        if($user->avatar){
            Storage::disk('public')->delete($user->avatar);
        }
        $user->avatar = $path . $imageName;
        $user->save();

        return redirect()->route('profile')->with(['saved' => 'Profile Successfully Updated.']);


    }
    public function passwordCheck(Request $request)
    {
        if(Hash::check($request->password, auth()->user()->password)) {
            return response()->json([
                'status' => 'success'
            ]);
        }
        return response()->json([
            'status' => 'fail',
        ]);
    }

    public function updatePasswordCreate()
    {
        return view('frontend.update_password');

    }

    public function updatePasswordStore(Request $request)
    {

        $request->validate([
            'old_password' => 'required',
            'new_password' => ['required',Rules\Password::defaults()]
        ]);

        $user = Auth()->user();

        if(Hash::check($request->old_password, $user->password)) {
            $user->password = Hash::make($request->new_password);
            $user->update();

            $title = 'Changed password successfully!';
            $message = 'You have changed password successfully.';
            $sourceable_id = $user->id;
            $sourceable_type = User::class;
            $web_link = route('profile');

            Notification::send($user,new GeneralNotification($title,$message,$sourceable_id,$sourceable_type,$web_link));

            return redirect()->route('profile')->with(['updated' => 'Password Updated.']);
        }
        return redirect()->back()->withErrors(['old_password' => 'Old Password is not correct']);


    }
}
