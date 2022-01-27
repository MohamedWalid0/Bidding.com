<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Rate;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function __invoke()
    {
        $data['user'] = auth()->user();
        $data['account'] = auth()->user()->account;
        $rateCount = auth()->user()->rates()->count();
        $userRate = auth()->user()->rates
            ? auth()->user()->rates()->sum('rate') / ($rateCount || 1)
            : 0;

        $userProductsWins = Product::withoutGlobalScopes()
            ->where('status', 'inactive')
            ->has('winner_bid')
            ->get();
        $itemWonCount = $userProductsWins->count();

        $activeBids = auth()->user()->products;
        $activeBidsCount = $activeBids->count();
        $reviewsCount = auth()->user()->loadCount('reviews')->reviews_count;
        return view('front.profile.show',
            compact('userRate', 'rateCount',
                'userProductsWins', 'itemWonCount',
                'activeBids', 'activeBidsCount' , 'reviewsCount'))
            ->with($data);
    }

    public function show(User $user)
    {
        $rateCount = $user->rates()->count();
        $ratingSum = $user->rates()->sum('rate');

        $existsRate = Rate::where('user_id', $user->id)
            ->where('rater_id', Auth::user()->id)
            ->first();
        // dd($user->reviews->first());
        if ($rateCount > 0) {
            $userRate = $ratingSum / $rateCount;
        } else {
            $userRate = 0;
        }

        $account = $user->account;

        $userProductsWins = Product::withoutGlobalScopes()
            ->where('status', 'inactive')
            ->has('winner_bid')
            ->get();
        $itemWonCount = $userProductsWins->count();

        $activeBids = $user->products;
        $activeBidsCount = $activeBids->count();
        $reviewsCount = $user->loadCount('reviews')->reviews_count;
        return view('front.profile.show',
            compact('user', 'account',
                'userRate', 'rateCount',
                'existsRate', 'userProductsWins', 'itemWonCount',
                'activeBids', 'activeBidsCount', 'reviewsCount'));
    }
}
