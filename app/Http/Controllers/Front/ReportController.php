<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Factories\ReportFactory;
use App\Http\Controllers\Controller;
use App\Models\ReportProduct;
use App\Models\ReportUser;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{

    public function reportUser( Request $request ){

        try {

            $existsReport = ReportUser::where('user_id' , $request->user_id)
                        -> where('reporter_id' , Auth::user()->id)->exists()  ;

            if ( $existsReport  ) {
                toastr()->error('you reported this user before');
                return back();
            }

            if (Auth::user()->id === $request->user_id ) {
                toastr()->error('you can not reported yourself');
                return back();
            }

            $reportFactory = new ReportFactory() ;

            $reportUser = $reportFactory->getType("user");
            $reportUser->sendReport($request->user_id) ;

            toastr()->success('report sending successfully');
            return back();

        } catch (\Throwable $th) {

            toastr()->error('try again later');
            return back();


        }


    }


    public function reportProduct( Request $request ){


        try {

            $existsReport = ReportProduct::where('product_id' , $request->product_id)
                        -> where('user_id' , Auth::user()->id)->first()  ;


            if ( $existsReport  ) {
                toastr()->error('you reported this product before');
                return back();
            }

            $reportFactory = new ReportFactory() ;

            $reportProduct = $reportFactory->getType("product");
            $reportProduct->sendReport($request->product_id) ;

            toastr()->success('report sending successfully');
            return back();

        }
        catch (\Throwable $th) {

            toastr()->error('try again later');
            return back();


        }


    }




}
