<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNotificationReques;
use App\Models\User;
use App\Notifications\AdminToUsersNotification;
use Illuminate\Support\Facades\Notification;


class NotificationController extends Controller
{
    public function index()
    {
        return view('dashboard.notification.index', [
            'users' => User::with('account')->select('id')->where('id' , '!=' , auth()->id())->get()
        ]);
    }

    public function store(StoreNotificationReques $request)
    {
        $users = User::find($request->validated()['ids']);
        $message = '%s ' . $request->validated()['message'];
        Notification::send($users, new AdminToUsersNotification($message));
        toastr()->success('message send successfully');
        return back();
    }
}
