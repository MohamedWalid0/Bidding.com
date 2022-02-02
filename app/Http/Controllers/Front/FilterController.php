<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPSTORM_META\type;

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


    // public function filterBySubCategory()
    // {
    //     // dd(request()->subCategoriesIds);
    //     $products = Product::whereIn('sub_category_id', explode(",", request()->subCategoriesIds))
    //         ->paginate(5)->appends('subCategoriesIds' , request()->subCategoriesIds);
    //     return response()->json([$products , $products->render()->toHtml()]);

    // }





    // public function filterByCategory($categoryIds = '')
    // {

    //     $products = DB::table('products')
    //         ->join('sub_categories', 'products.sub_category_id', 'sub_categories.id')
    //         ->join('categories', 'categories.id', 'sub_categories.category_id')
    //         ->whereIn('sub_categories.category_id', explode(",", $categoryIds))
    //         ->where('deleted_at', null)
    //         ->get('products.*') ;

    //     return response()->json($products);

    // }


    // public function filterByPriceRange($minPrice = 0, $maxPrice = 0)
    // {

    //     $products = Product::whereBetween('start_price', [$minPrice, $maxPrice])->paginate(20);
    //     return response()->json($products);

    // }


    public function search(Request $request)
    {
        return $this->fetchProductsBySearch( $request->keyword , $request->subCategoriesIds , $request->minPrice , $request->maxPrice );
    }





    public function fetchProductsBySearch($keyword = null  , $subCategoriesIds = '' , $minPrice = 0 , $maxPrice = 10000){



        if ( request('subCategoriesIds') == "null") {

            $subCategoriesIds = null ;
            return Product::search($keyword )
                ->cursor()
                ->whereBetween('start_price', [$minPrice, $maxPrice])
                ->all();


        }

        // dd(explode(",", $subCategoriesIds ) ) ;

        if (request('keyword') == 'null' ) {


            return Product::whereBetween('start_price', [$minPrice, $maxPrice])
                ->whereIn('sub_category_id', explode(",", $subCategoriesIds  )  )
                ->get();
        }

        return Product::search($keyword )
                ->cursor()
                ->whereBetween('start_price', [$minPrice, $maxPrice])
                ->whereIn('sub_category_id', explode(",", $subCategoriesIds )  )
                ->all();



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
