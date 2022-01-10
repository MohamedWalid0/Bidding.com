<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{


    public function viewCategory(Category $category){

        return view( 'front.categories.viewCategory' , compact('category') ) ;

    }




}
