<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Notifications\TestNotification;
use App\Events\MyEvent;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class NotificationController extends Controller
{
    public function info()
    {
        $count = auth()->user()->unreadNotifications->count();
        $list = auth()->user()->unreadNotifications()->limit(5)->get();

        $notifications = array(
            'count' => $count,
            'list' => $list
        );

        return response()->json(json_encode($notifications));
    }

    public function test()
    {
        if (auth()->user()) {
            auth()->user()->notify(new TestNotification(auth()->user()->id));
        }

        event(new MyEvent('test'));
        return back();
    }

    public function markAllAsRead(){
        if (auth()->user()){
            auth()->user()->unreadNotifications->markAsRead();
        }

        event(new MyEvent('mark all as read'));
        return back();
    }
}
