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

    public function index(){

        $products = Product::paginate(20) ;
        $categories = $this->categories ;
        $subCategories = $this->subCategories ;

        return view('front.product.index' , compact( 'categories', 'subCategories' , 'products')) ;

    }


    public function getSubCategoryProducts($subCategoryIds = ''){

        $products = Product::whereIn('sub_category_id' , explode( "," , $subCategoryIds ) )->get() ;
        return response()->json($products);

    }





}
