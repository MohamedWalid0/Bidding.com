<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Rate;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function __invoke()
    {
        $id = Auth::user()->id;
        $data['account'] = Account::findOrFail($id);
        $data['user'] = User::select('email')->findOrFail($id);
        $rateCount = auth()->user()->rates()->count();
        $userRate = auth()->user()->rates
            ? auth()->user()->rates()->sum('rate') / $rateCount
            : 0;
        return view('front.profile.show' , compact('userRate' , 'rateCount' ))->with($data);
    }

    public function show(User $user)
    {

        $rateCount = $user->rates()->count();
        $ratingSum = $user->rates()->sum('rate');

        $existsRate = Rate::where('user_id', $user->id)->
        where('rater_id', Auth::user()->id)->first();

        if ($rateCount > 0) {
            $userRate = $ratingSum / $rateCount;
        } else {
            $userRate = 0;
        }

        $account = $user->account;
        return view('front.profile.show', compact('user', 'account', 'userRate', 'rateCount', 'existsRate'));
    }
}
