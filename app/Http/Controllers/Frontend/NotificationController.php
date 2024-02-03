<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function notification()
    {
        $user = Auth()->user();
        $notifications =  $user->notifications()->paginate(5);


        return view('frontend.notifications', compact('user', 'notifications'));
    }

    public function notificationDetail($id)
    {
        $user = Auth()->user();
        $notification = $user->notifications()->where('id', $id)->firstOrFail();
        $notification->markAsRead();
        return view('frontend.notification_detail', compact('user', 'notification'));
    }

}
