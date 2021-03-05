<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


/**
 * Class UserNotificationsController
 * @package App\Http\Controllers
 */
class UserNotificationsController extends Controller
{

    public function show()
    {
        $notifications = auth()->user()->unreadNotifications;

        $notifications->markAsRead();

        return view('notifications.show', [
            'notifications' => $notifications
        ]);
    }
}
