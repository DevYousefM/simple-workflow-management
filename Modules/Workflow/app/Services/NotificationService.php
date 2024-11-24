<?php

namespace Modules\Workflow\Services;

use Illuminate\Support\Facades\Notification;
use Modules\User\Models\User;


class NotificationService
{
    public function sendToUser($user, $notification)
    {
        return Notification::send($user, $notification);
    }

    public function sendToDepartment($department_id, $notification)
    {
        $users = User::where("department_id", $department_id)->get();
        return Notification::send($users, $notification);
    }
}
