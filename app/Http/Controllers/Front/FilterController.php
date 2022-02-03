<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class FilterController extends Controller
{

    protected $categories;
    protected $subCategories;


    public function __construct()
    {
        $this->categories = Category::orderBy('name')->get();
        $this->subCategories = SubCategory::orderBy('name')->get();

    }

    public function index()
    {

        $products = Product::get();
        $categories = $this->categories;
        $subCategories = $this->subCategories;

        return view('front.product.index', compact('categories', 'subCategories', 'products'));

    }


    public function search(Request $request){

        return $this->fetchProductsBySearch( $request->keyword , $request->subCategoriesIds , $request->minPrice , $request->maxPrice );

    }


    public function fetchProductsBySearch($keyword = null  , $subCategoriesIds = '' , $minPrice = 0 , $maxPrice = 10000){


        if ( request('subCategoriesIds') == 'null' && request('keyword') != 'null' ) {

            return Product::search($keyword )
                ->cursor()
                ->whereBetween('start_price', [$minPrice, $maxPrice])
                ->all();

        }
        else if ( request('subCategoriesIds') != 'null' && request('keyword') == 'null' ) {

            return Product::whereBetween('start_price', [$minPrice, $maxPrice])
                ->whereIn('sub_category_id', explode(",", $subCategoriesIds  )  )
                ->get();

        }
        else if (request('subCategoriesIds') == 'null' && request('keyword') == 'null'){

            return Product::whereBetween('start_price', [$minPrice, $maxPrice])
                ->get();

        }
        else {

            return Product::search($keyword )
                ->cursor()
                ->whereBetween('start_price', [$minPrice, $maxPrice])
                ->whereIn('sub_category_id', explode(",", $subCategoriesIds )  )
                ->values()
                ->chunk(25)->get('*');

        }


    }





    public function searchByKeyword(Request $request){

        if ($request->has('q')) {
            return Product::search( $request->q )->get() ;
        }
        else{
            return response()->json('not found') ;
        }

    }







}
