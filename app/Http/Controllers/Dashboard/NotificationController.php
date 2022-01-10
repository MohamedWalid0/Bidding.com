<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNotificationRequest;
use App\Models\User;
use App\Notifications\AdminToUsersNotification;
use Illuminate\Bus\Batch;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\Notification;


class NotificationController extends Controller
{
    public function index()
    {
        return view('dashboard.notification.index', [
            'users' => User::with('account')->select('id')->where('id', '!=', auth()->id())->get()
        ]);
    }

    public function store(StoreNotificationRequest $request)
    {
        $users = User::getUsersFromRequest($request);
        $message =  $request->validated()['message'];
        Notification::send($users, new AdminToUsersNotification($message, $request->validated()['type']));
        toastr()->success('message send successfully');
        return back();
    }
}
