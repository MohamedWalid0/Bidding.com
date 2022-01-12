<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{


    public function viewSubCategory(SubCategory $subCategory){

        return view( 'front.subCategories.viewSubCategory' , compact('subCategory') ) ;

    }



    public function searchInSubCategory(Request $request){

        if ($request->has('keyword')) {
            return Product::search( $request->keyword )->where('sub_category_id' , $request->subCategory)->get() ;
        }
        else{
            return response()->json('not found') ;
        }

    }





}
