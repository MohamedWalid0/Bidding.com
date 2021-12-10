<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\City;
use App\Models\Product;
use App\Models\ProductProperty;
use App\Models\PropertiesSubCategory;
use App\Models\Property;
use App\Models\PropertyValue;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    protected $categories;
    protected $subCategories;
    protected $cities;
    protected $subCategoriesPropertiesIds;
    protected $subCategoriesProperties ;
    protected $propertyValues ;

    public function __construct(){

        $this->categories = Category::orderBy('name')->get() ;
        $this->subCategories = SubCategory::orderBy('name')->get() ;
        $this->cities = City::orderBy('name')->get() ;

        // dd($cities) ;

    }




    public function create () {

        $data = [
            'categories' => $this->categories,
            'subCategories' =>  $this->subCategories,
            'cities' =>  $this->cities
        ];

        return view('front.product.create' , with( $data ));

    }

    public function getSubCategories( $categoryId ){

        $this->subCategories = SubCategory::where( 'category_id' , $categoryId )->orderBy('name')->get() ;
        return response()->json($this->subCategories);

    }



    public function getSubCategoryPropertiesIds( $subCategoryId ){

        $this->subCategoriesPropertiesIds = PropertiesSubCategory::where( 'sub_category_id' , $subCategoryId )->pluck('property_id')->toArray() ;
        $propertiesNames = $this->getPropertiesNames($this->subCategoriesPropertiesIds) ;

        $arr = [] ;

        foreach($propertiesNames as $propertyName => $propertyId) {

            $arr[$propertyId] = $this-> getPropertyValues($propertyId) ;

        }
        // return response()->json( $propertiesNames  );

        return response()->json( ['propertiesNames'=>$propertiesNames  ,'propertyValues'=> $arr]);

    }

    public function getPropertiesNames($propertiesIds){

        return $this->subCategoriesProperties = Property::whereIn('id' , $propertiesIds)->pluck('id' , 'name')->toArray() ;

    }

    public function getPropertyValues($propertyId){

        return $this->propertyValues = PropertyValue::where('property_id' , $propertyId)->pluck('id' , 'value')->toArray() ;

    }




    public function store(ProductRequest $request){

        try {

            DB::beginTransaction();

            $product = Product::create([
                'user_id' => Auth::user()->id,
                'name' => $request->productName,
                'sub_category_id' => $request->subCategoryId,
                'location' => $request->cityId,
                'description' => $request->description,
                'start_price' => $request->startPrice,
                'deadline' => $request->deadline,
                'status' => "active" ,
            ]);

            foreach ($request->propertyValueId as $propertyValueId) {

                ProductProperty::create([
                    'product_id' => $product->id ,
                    'property_value_id' => $propertyValueId ,

                ]);
            }

            DB::commit();

            return view('front.product.viewProduct');

        } catch (\Throwable $th) {
            DB::rollBack() ;
            throw $th;
        }


    }








}




