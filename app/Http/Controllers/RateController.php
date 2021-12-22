<?php

namespace App\Http\Controllers;

use App\Models\Rate;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class RateController extends Controller
{
    

    public function addRate( Request $request ){
        
        // must check the rater user is not blocked 

        try {
            
            $existsRate = Rate::where('user_id' , $request->user_id) ->
            where('rater_id' , Auth::user()->id)->first() ; 

            if ($existsRate) {

                $existsRate->rate = $request->user_rating ;
                $existsRate->update() ;
                toastr()->success('Thank you for update your rate');
                return redirect()->back()->with(['success' => 'Thank you for update your rate']);

            }

            else{

                Rate::create([
                    'user_id' => $request->user_id ,
                    'rater_id' => Auth::user()->id ,
                    'rate' => $request->user_rating
                ]);
                toastr()->success('Thank you for rate');
                return redirect()->back()->with(['success' => 'Thank you fo rate']);            
            }


        } catch (\Throwable $th) {

            return redirect()->back()->with(['error' => 'try again']);

        }



    }







}
