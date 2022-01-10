<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\SubCategory;

class SubCategoryController extends Controller
{


    public function viewSubCategory(SubCategory $subCategory){

        return view( 'front.subCategories.viewSubCategory' , compact('subCategory') ) ;

    }




}
