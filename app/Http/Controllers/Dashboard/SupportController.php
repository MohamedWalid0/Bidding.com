<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\SupportMessageRequest;
use App\Models\Support;
use App\Notifications\AdminToUsersNotification;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;


class SupportController extends Controller
{
    public function index()
    {
        return view('dashboard.support.index' , [
            'supports' => Support::with('user.account')->get()
        ]);
    }

    public function reply(SupportMessageRequest $request,Support $support): RedirectResponse
    {
        $support->user->notify(new AdminToUsersNotification($request->message , 'broadcast' , auth()->user()));
        toastr()->success('reply message sent successfully');
        return back();
    }

    public function delete(Support $support): RedirectResponse
    {
        $support->delete();
        toastr()->error('reply message deleted successfully');
        return back();
    }
}
