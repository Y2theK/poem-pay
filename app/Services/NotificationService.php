<?php

namespace App\Services;

use App\Models\User;
use App\Notifications\GeneralNotification;
use Illuminate\Support\Facades\Notification;

class NotificationService{
    public function sendGeneralNotification(array $data,User $user){
        Notification::send($user,new GeneralNotification(
            $data['title'],$data['message'],$data['sourceable_id'],$data['sourceable_type'],$data['web_link'])
        );

    }
}