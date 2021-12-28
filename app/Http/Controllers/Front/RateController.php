<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Rate;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function redirect;
use function toastr;

class RateController extends Controller
{


    public function addRate(Request $request)
    {
        $request->validate(['review' => 'nullable|string|min:10|max:255']);
        // must check the rater user is not blocked

        try {

            $existsRate = Rate::where('user_id', $request->user_id)
                ->where('rater_id', Auth::user()->id)->first();



            if ($existsRate) {

                $existsRate->rate = $request->user_rating ;
                $existsRate->update() ;

                if ($request->has('review')) {
                   // review create or update
                    $this->review($request, $existsRate->id);
                }

                toastr()->success('Thank you for update your rate');
                return redirect()->back()->with(['success' => 'Thank you for update your rate']);

            } else {

                $rate = Rate::create([
                    'user_id' => $request->user_id,
                    'rater_id' => Auth::user()->id,
                    'rate' => $request->user_rating
                ]);

                if ($request->has('review')) {
                    // review create or update
                    $this->review($request, $rate->id);
                }

                toastr()->success('Thank you for rate');
                return redirect()->back()->with(['success' => 'Thank you fo rate']);
            }


        } catch (\Throwable $th) {

            return redirect()->back()->with(['error' => 'try again']);

        }


    }

    public function review (Request $request, $id) {
        Review::updateOrCreate(
            ['rate_id' => $id]
            ,
            [
                'user_id' => $request->user_id,
                'review' => $request->review
            ]
        );
    }


}
