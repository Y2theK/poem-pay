<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\ImageUploadService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Services\NotificationService;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\frontend\UpdatePasswordRequest;
use App\Http\Requests\frontend\ProfileImageUploadRequest;

class ProfileController extends Controller
{
    public function profile()
    {
        return view('frontend.profile.profile', ['user' => auth()->user()]);
    }
    public function uploadProfileImage(ProfileImageUploadRequest $request,ImageUploadService $imageService){

        $user = Auth::user();
        if($user->avatar){
            $imageService->delete($user->avatar,'public');
        }

        $path = 'avatars/';
      
        $imageName = $imageService->upload($request->avatar,$path,'public');

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
        return view('frontend.profile.update-password');

    }

    public function updatePasswordStore(UpdatePasswordRequest $request,NotificationService $notificationService)
    {

        $user = Auth()->user();

        if(Hash::check($request->old_password, $user->password)) {
            
            $user->password = Hash::make($request->new_password);
            $user->update();

            $data = array();
            $data['title'] = 'Changed password successfully!';
            $data['message'] = 'You have changed password successfully.';
            $data['sourceable_id'] = $user->id;
            $data['sourceable_type'] = User::class;
            $data['web_link'] = route('profile');

            $notificationService->sendGeneralNotification($data,$user);

            return redirect()->route('profile')->with(['updated' => 'Password Updated.']);
        }
        return redirect()->back()->withErrors(['old_password' => 'Old Password is not correct']);


    }
}
