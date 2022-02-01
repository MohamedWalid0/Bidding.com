<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
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

        $products = Product::paginate(5);
        $categories = $this->categories;
        $subCategories = $this->subCategories;

        return view('front.product.index', compact('categories', 'subCategories', 'products'));

    }


    public function filterBySubCategory()
    {
        // dd(request()->subCategoriesIds);
        $products = Product::whereIn('sub_category_id', explode(",", request()->subCategoriesIds))
            ->paginate(5)->appends('subCategoriesIds' , request()->subCategoriesIds);
        return response()->json([$products , $products->render()->toHtml()]);

    }





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


    public function filterByPriceRange($minPrice = 0, $maxPrice = 0)
    {

        $products = Product::whereBetween('start_price', [$minPrice, $maxPrice])->paginate(20);
        return response()->json($products);

    }


    public function search(Request $request)
    {

        // dd($request->minPrice) ;

        if ($request->has('keyword')){

            if ($request->subCategoriesIds != "null"){ // if subCategories selected

                if ($request->minPrice != "0" || $request->maxPrice != "0"){ // if price range
                    // dd( $request->minPrice, $request->maxPrice ) ;
                    // dd(gettype(intval($request->minPrice))) ;
                    $min = intval($request->minPrice) ;
                    $max = intval($request->maxPrice) ;

                    return
                        Product::search($request->keyword)
                            // ->whereBetween('start_price', [$min, $max])
                            // ->where('start_price', '>=', $min )
                            // ->where('start_price', '<', $max)
                            ->whereIn('sub_category_id', explode(",", $request->subCategoriesIds))


                            ->paginate(20);

                }

                return
                    Product::search($request->keyword)
                    ->whereIn('sub_category_id', explode(",", $request->subCategoriesIds))
                    ->get();

            }

            return Product::search($request->keyword)->get();

        }

        return response()->json('not found');




        //      Product::when($request->filled('subCategoriesIds') , function ($query) use ($request){
        //          $query->whereIn('sub_category_id' , $request->filled('subCategoriesIds'));
        //      })
        //     ->when($request->filled('keyword') , function ($query) use ($request){
        //         $query->search($request->filled('keyword'));
        //     })
        //     ->when($request->filled('minPrice') , function ($query) use ($request){
        //         $query->where('start_price' , '=' , $request->filled('minPrice'));
        //     })
        //     ->when($request->filled('maxPrice') , function ($query) use ($request){
        //         $query->where('start_price' , '=' , $request->filled('maxPrice'));
        //     })->get();

    }


}
