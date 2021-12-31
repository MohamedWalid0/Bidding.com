<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\SupportMessageRequest;
use App\Models\Support;
use App\Notifications\AdminToUsersNotification;
use Illuminate\Http\Request;


class SupportController extends Controller
{
    public function index()
    {
        return view('dashboard.support.index' , [
            'supports' => Support::with('user.account')->get()
        ]);
    }

    public function reply(SupportMessageRequest $request,Support $support)
    {
        $support->user->notify(new AdminToUsersNotification($request->message , 'broadcast'));
        toastr()->success('reply message sent successfully');
        return back();
    }

    public function delete(Support $support)
    {
        $support->delete();
        toastr()->error('reply message deleted successfully');
        return back();
    }
}
